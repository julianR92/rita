<?php

namespace App\Http\Controllers;
use App\Models\Barrio;
use App\Models\Parametro;
use App\Models\Rita;
use App\Models\AnexosRita;
use App\Models\Auditoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Mail\Notificaciones;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
// use App\Mail\NotificacionParqueaderos;
// use Carbon\Carbon;
// use Illuminate\Support\Facades\Crypt;


use Illuminate\Http\Request;

class RitaController extends Controller
{
    public function index(){
      
            
        return view('rita.index');

    }

    public function registro(){

        $Parametros1 = Parametro::where('ParNomGru', 'LETRA')->get();
        $Parametros2 = Parametro::where('ParNomGru','ABREDIR')->get();
        $Barrios = Barrio::all();
        $paises = DB::table('pais')->get();
        $departamentos = DB::table('departamento')->get();
        $municipios = DB::table('municipio')->get();
      
         return view('rita.registro', compact('Parametros1', 'Parametros2', 'Barrios','paises', 'departamentos','municipios'));
 
     }

     public function municipios(Request $request){
        $municipios = DB::table('municipio')->where('codigo_depto', $request->departamento)->get();
        $resp = ["success" => true ,"data" => $municipios];
        return response()->json($resp);
    }

    public function confirmacion()
    {
        return view('rita.confirmacion');
    }

    public function end()
    {
        Session::flush();
        return redirect("/");
    }

    public function consulta(Request $request){

        $QuerySolicitud = Rita::where($request->tipo_parametro, $request->parametro)->join('departamento', 'departamento.codigo_depto', '=', 'rita.departamento')->get();
        $trazabilidad = Auditoria::where('radicado',$request->parametro)->where('tramite','LIKE', 'RITA')->get();
        $anexos = AnexosRita::where('radicado',$request->parametro)->get();
        $respuestas = AnexosRita::where('radicado',$request->parametro)->where('titulo', 'Respuestas')->get();

        if ($QuerySolicitud->count() > 0) {         
            // return $QuerySolicitud;
            return view('rita.resultado', compact('QuerySolicitud', 'trazabilidad', 'anexos', 'respuestas'));
        } else {
            Alert::error('Ha Ocurrido un error', 'El Radicado: .' . $request->parametro . ' no tiene registros asociados');
            return redirect()->route('rita.index');
        }
    }


    public function store(Request $request){
         
        $validator = Validator::make($request->all(),[
            'asunto'=>'required',
            'telefono_movil'=>'required',
            'direccion'=>'required',
            'barrio'=>'required',
            'email_responsable'=>'required',
            'pais'=>'required',
            'departamento'=>'required',
            'municipio'=>'required',
            'lugar_denuncia'=>'required',
            'cuando_denuncia'=>'required',
            'involucrados_denuncia'=>'required',
            'descripcion_hechos'=>'required',
            'riesgo_denuncia'=>'required',
            'proceso_seleccion'=>'required',
            'tiene_evidencias'=>'required',
            'ha_denunciado'=>'required',
            'disuadirlo'=>'required',
            'tratamiento_datos'=>'required',
            'confirmo_mayorEdad'=>'required',
            'acepto_terminos'=>'required',
            'compartir_informacion'=>'required', 
            'tipo_persona'=>'required_without:tipo_solicitud|nullable',
            'tipo_doc'=>'required_without:tipo_solicitud|nullable',
            'identificacion'=>'required_without:tipo_solicitud|nullable',
            'nombres'=>'required_if:tipo_persona,==,NATURAL',
            'apellidos'=>'required_if:tipo_persona,==,NATURAL',
            'razon_social'=>'required_if:tipo_persona,==,JURIDICO',
            'tipo_contrato'=>'required_if:proceso_seleccion,==,SI',
            'informacion_contrato'=>'required_if:proceso_seleccion,==,SI',
            'fecha_aprox_proceso'=>'required_if:proceso_seleccion,==,SI',
            'lugar_contrato'=>'required_if:proceso_seleccion,==,SI',
            'entidad_contrato'=>'required_if:proceso_seleccion,==,SI',
            'entidad_denuncia'=>'required_if:ha_denunciado,==,SI',
            'quien_disuade'=>'required_if:disuadirlo,==,SI',
            

         ]);

         if($validator->fails()){
           
            //devuelve errores a la vista
            return response()->json(['sucess'=>false,'error'=>$validator->errors()->all()]);

         }else{
            // dd($request->file('arc_descripcion'));
             $ultimo_id = Rita::latest('id')->first();
             // return $ultimo_id;
             if (!$ultimo_id) {
                 $idRadicado = 1;
                } else {
                    $idRadicado = $ultimo_id->id + 1;
                }
                $radicado = date("Ymd") . $idRadicado; // numero radicado
                $adj_descripcion = null;
                if($request->hasfile('arc_descripcion')){                    
                    $ext = '.'.$request->file('arc_descripcion')->getClientOriginalExtension();
                    $adjunto1 = $request->file('arc_descripcion')->storeAs('documentos_RITA/' . $radicado, 'descripcion-hechos-'.$radicado.$ext);
                    $adj_descripcion = 'storage/documentos_RITA/' . $radicado. '/descripcion-hechos-'.$radicado.$ext;
                 }     

                 $adj_informacion = null;  
                if($request->hasfile('arc_informacion')){
                $ext = '.'.$request->file('arc_informacion')->getClientOriginalExtension();
                $adjunto1 = $request->file('arc_informacion')->storeAs('documentos_RITA/' . $radicado, 'informacion-adicional-contrato-' . $radicado . $ext);
                $adj_informacion = 'storage/documentos_RITA/' . $radicado. '/informacion-adicional-contrato-'.$radicado.$ext;
                }
                 
                //sumar 15 dias para la fecha limite
                $date = date('Y-m-d');
                $fecha_limite = date("Y-m-d", strtotime($date . "+15 Weekday"));
                
                $solicitud = $request->all();
        
                $rita = New Rita();                
                $rita->radicado = $radicado;
                $rita->tipo_solicitud= ($request->tipo_solicitud) ? $request->tipo_solicitud :'Identificada';
                $rita->tipo_persona= $request->tipo_persona;
                $rita->tipo_doc= $request->tipo_doc;
                $rita->identificacion= $request->identificacion;
                $rita->nombres= $request->nombres;
                $rita->apellidos= $request->apellidos;
                $rita->razon_social= $request->razon_social;
                $rita->asunto= $request->asunto;
                $rita->telefono_movil= $request->telefono_movil;
                $rita->telefono_fijo= $request->telefono_fijo;
                $rita->direccion= $request->direccion;
                $rita->barrio= $request->barrio;
                $rita->email_responsable= $request->email_responsable;
                $rita->pais= $request->pais;
                $rita->departamento= $request->departamento;
                $rita->municipio= $request->municipio;
                $rita->medio_respuesta= ($request->medio_respuesta) ? $request->medio_respuesta : 'CONSULTA WEB';
                $rita->lugar_denuncia= $request->lugar_denuncia;
                $rita->cuando_denuncia= $request->cuando_denuncia;
                $rita->involucrados_denuncia= $request->involucrados_denuncia;
                $rita->descripcion_hechos= $request->descripcion_hechos;
                $rita->adj_descripcion= $adj_descripcion;
                $rita->riesgo_denuncia= $request->riesgo_denuncia;
                $rita->proceso_seleccion= $request->proceso_seleccion;
                $rita->tipo_contrato= $request->tipo_contrato;
                $rita->informacion_contrato= $request->informacion_contrato;
                $rita->adj_informacion= $adj_informacion;
                $rita->fecha_aprox_proceso= $request->fecha_aprox_proceso;
                $rita->lugar_contrato= $request->lugar_contrato;
                $rita->entidad_contrato= $request->entidad_contrato;
                $rita->link_contrato= $request->link_contrato;
                $rita->tiene_evidencias= $request->tiene_evidencias;
                $rita->ha_denunciado= $request->ha_denunciado;
                $rita->entidad_denuncia= $request->entidad_denuncia;
                $rita->otra_entidad= $request->otra_entidad;
                $rita->impacta_organizacion= $request->impacta_organizacion;
                $rita->contacto_adicional= $request->contacto_adicional;
                $rita->disuadirlo= $request->disuadirlo;
                $rita->quien_disuade= $request->quien_disuade;
                $rita->fecha_limite= $fecha_limite;
                $rita->estado_solicitud= 'RADICADA';
                $rita->observaciones_solicitud= 'SOLICITUD RADICADA EN LEGAL Y DEBIDA FORMA';
                $rita->fecha_actuacion= $date;
                $rita->tratamiento_datos= $request->tratamiento_datos;
                $rita->acepto_terminos= $request->acepto_terminos;
                $rita->confirmo_mayorEdad= $request->confirmo_mayorEdad;
                $rita->compartir_informacion= $request->compartir_informacion;

                if($rita->save()){
                    
                    if($request->countFiles>0){
                        for ($x = 0; $x < $request->countFiles; $x++) {
                            if ($request->hasFile('files'.$x)){
                                $ext = '.'.$request->file('files'.$x)->getClientOriginalExtension();
                                $anexos = $request->file('files'.$x)->storeAs('documentos_RITA/' . $radicado, 'Anexo-'.$x.'-' . $radicado . $ext);

                            } 
                            $anexos = New AnexosRita();
                            $anexos->rita_id = $rita->id;
                            $anexos->radicado = $radicado;
                            $anexos->titulo = 'Anexos';
                            $anexos->nombre_archivo = 'Anexo-'.$x.'-' . $radicado . $ext;
                            $anexos->ruta= 'storage/documentos_RITA/' . $radicado .'/Anexo-'.$x.'-' . $radicado . $ext;
                            $anexos->save();
               
                    }                    
                }
                

                $detalleCorreo = [
                    'radicado' => $radicado,
                    'Subject' => 'RADICACION DE DENUNCIA '.$radicado. ' RITA',
                    'documento'=> 'NO',
                    'modulo' => 'D',            
                    'estado' => null,
                    'mensaje'=> 'Se realizo correctamente la radicacion con el numero: '.$radicado.', para realizar el seguimiento a su denuncia por favor guarde este numero'
                   
                ];
                $detalleCorreo_fun = [
                    'radicado' => $radicado,
                    'Subject' => 'RADICACION DE DENUNCIA '.$radicado. ' RITA',
                    'documento'=> 'NO',
                    'modulo' => 'F',            
                    'estado' => null,
                    'mensaje'=> 'Una nueva solicitud ha sido radicada por favor ingresa a la plataforma para darle gestion necesaria',
                    
                ];
                $correo_funcionario = 'ojrincon@bucaramanga.gov.co';
                if($request->email_responsable){
                Mail::to($request->email_responsable)->send(new Notificaciones($detalleCorreo));
                }
                Mail::to($correo_funcionario)->send(new Notificaciones($detalleCorreo_fun));
                $auditoria = Auditoria::create([
                    'usuario' => ($request->identificacion) ? $request->identificacion : 'No Identificado',
                    'proceso_afectado'=> 'Radicado-'.$radicado,
                    'tramite'=> 'RITA',
                    'radicado'=> $radicado,
                    'accion'=>'SOLICITUD RADICADA',
                    'observacion'=> 'Radicación de denuncia canal RITA'
    
                ]);

                $request->session()->flash('radicado_id', $radicado);

                $resp = ["success" => true];
                return response()->json($resp);


               }
         }


        
        
        
        
        
   

}
}


