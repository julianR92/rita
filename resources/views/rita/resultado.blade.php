@extends('layouts.app')

@section('content')
<style>
    th.sorting_desc::after, th.sorting_asc::after{
      right: -16px!important;
   }
</style>

    <div class="container mt-3 mb-4 m-xs-x-3">
        <div class="row pl-4">
            <div class="px-0 col-md-9">
                <nav aria-label="Miga de pan" style="max-height: 20px;">
                    <ol class="breadcrumb" style="background-color: #FFFFFF;">
                        <li class="breadcrumb-item ml-3 ml-md-0">
                            <a style="color: #004fbf;" class="breadcrumb-text" href="https://www.gov.co/home/">Inicio</a>
                        </li>
                        <li class="breadcrumb-item ">
                            <div class="image-icon">
                                <span class="breadcrumb govco-icon govco-icon-shortr-arrow" style="height: 22px;"></span>
                                <a style="color: #004fbf;" class="breadcrumb-text" href="#">Tramites y servicios</a>
                            </div>
                        </li>
                        <li class="breadcrumb-item ">
                            <div class="image-icon">
                                <span class="breadcrumb govco-icon govco-icon-shortr-arrow" style="height: 22px;"></span>
                                <p class="ml-3 ml-md-0 "><b style="color: #004fbf;text-transform: none;">
                                    Rita
                                    </b></p>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="col-md-12 pt-4">
            <h1 class="headline-xl-govco">Consulta de Solicitudes</h1>
            <div class="row pt-5">
                <div class="col-md-12 justify-content-center">

                    <div class="card govco-card animate__animated animate__bounceInRight">
                        <div class="card-header govco-card-header">
                            <span class="govco-icon govco-icon-analytic size-3x pr-3"> </span>
                         Seguimiento de la Denuncia
                        </div>

                        <div class="col-md-12 justify-content-center pt-4">
                          
                            <div class="tabs-govco col-md-12 animate__animated animate__bounceInRight">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Información General </a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Informacion Especifica</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Trazabilidad</a>
                                    </li>
                                    
                                </ul>
                            
                                <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                   {{-- TABLA DE ENVIADOS --}}
                                    <div class="col-md-12 pt-4">
                                        <div class="row">
                                      <div class="col-md-4">
                                        <p><strong>Radicado:</strong><br>
                                        {{$QuerySolicitud[0]->radicado}}</p>
                                      </div>
                                      <div class="col-md-4">
                                        <p><strong>Tipo de Solicitud:</strong><br>
                                        {{$QuerySolicitud[0]->tipo_solicitud}}</p>
                                      </div>
                                      <div class="col-md-4">
                                        <p><strong>Tipo de Persona:</strong><br>
                                        {{($QuerySolicitud[0]->tipo_persona) ? $QuerySolicitud[0]->tipo_persona : 'NO REGISTRA' }}</p>
                                      </div>
                                      <div class="col-md-4">
                                        <p><strong>Numero de Identificacion:</strong><br>
                                        {{($QuerySolicitud[0]->identificacion) ? $QuerySolicitud[0]->identificacion : 'NO REGISTRA' }}</p>
                                      </div>
                                      <div class="col-md-4">
                                        <p><strong>Nombres y/o Razon Social:</strong><br>
                                        {{($QuerySolicitud[0]->razon_social) ? $QuerySolicitud[0]->razon_social : $QuerySolicitud[0]->nombres.' '.$QuerySolicitud[0]->apellidos }}</p>
                                      </div>
                                      <div class="col-md-4">
                                        <p><strong>Telefono Movil:</strong><br>
                                        {{($QuerySolicitud[0]->telefono_movil) ? $QuerySolicitud[0]->telefono_movil : 'NO REGISTRA' }}</p>
                                      </div>
                                      <div class="col-md-4">
                                        <p><strong>Telefono Fijo:</strong><br>
                                        {{($QuerySolicitud[0]->telefono_fijo) ? $QuerySolicitud[0]->telefono_fijo : 'NO REGISTRA' }}</p>
                                      </div>
                                      <div class="col-md-8">
                                        <p><strong>Direccion:</strong><br>
                                        {{($QuerySolicitud[0]->direccion) ? $QuerySolicitud[0]->direccion.' '.$QuerySolicitud[0]->barrio : 'NO REGISTRA' }}</p>
                                      </div>
                                      <div class="col-md-4">
                                        <p><strong>Correo Electronico:</strong><br>
                                        {{($QuerySolicitud[0]->email_responsable) ? $QuerySolicitud[0]->email_responsable : 'NO REGISTRA' }}</p>
                                      </div>
                                      <div class="col-md-4">
                                        <p><strong>Departamento:</strong><br>
                                        {{($QuerySolicitud[0]->departamento) ? $QuerySolicitud[0]->departamento : 'NO REGISTRA' }}</p>
                                      </div>
                                      <div class="col-md-4">
                                        <p><strong>Municipio:</strong><br>
                                        {{($QuerySolicitud[0]->municipio) ? $QuerySolicitud[0]->municipio : 'NO REGISTRA' }}</p>
                                      </div>
                                    </div>
                                    
                                    {{-- </ TABLA DE ENVIADOS FIN --}}
                                </div>
                                </div>
                                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    {{-- tabla de garantia entregada --}}
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                          <p><strong>Asunto:</strong><br>
                                          {{$QuerySolicitud[0]->asunto}}</p>
                                        </div>
                                        <div class="col-md-6">
                                          <p><strong>¿Dónde fue el lugar de la irregularidad?</strong><br>
                                          {{$QuerySolicitud[0]->lugar_denuncia}}</p>
                                        </div>
                                        <div class="col-md-6">
                                          <p><strong>¿Cuándo ocurrieron los hechos?</strong><br>
                                          {{($QuerySolicitud[0]->cuando_denuncia) ? $QuerySolicitud[0]->cuando_denuncia : 'NO REGISTRA' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                          <p><strong>¿Quiénes estan involucrados?</strong><br>
                                          {{($QuerySolicitud[0]->identificacion) ? $QuerySolicitud[0]->involucrados_denuncia : 'NO REGISTRA' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                          <p><strong>Descripcion de los hechos:</strong><br>
                                          {{($QuerySolicitud[0]->descripcion_hechos) ? $QuerySolicitud[0]->descripcion_hechos : 'NO REGISTRA'}}</p>
                                        </div>
                                        <div class="col-md-6">
                                          <p><strong>Documento Adjunto:</strong><br>
                                            @if($QuerySolicitud[0]->adj_descripcion !=null)
                                            <a href="/{{$QuerySolicitud[0]->adj_descripcion}}" target="_blank">Descargar documento</a>&nbsp;&nbsp;<i class="fa fa-download"></i>
                                            @else
                                             NO REGISTRA
                                            @endif
                                          </p>
                                        </div>
                                        <div class="col-md-6">
                                          <p><strong>Existe algún riesgo para usted o para los demás</strong><br>
                                          {{($QuerySolicitud[0]->riesgo_denuncia) ? $QuerySolicitud[0]->riesgo_denuncia : 'NO REGISTRA' }}</p>
                                        </div>
                                        
                                        @if($QuerySolicitud[0]->proceso_seleccion=='SI')
                                        <div class="col-md-4">
                                          <p><strong>Tipo de contrato:</strong><br>
                                          {{($QuerySolicitud[0]->tipo_contrato) ? $QuerySolicitud[0]->tipo_contrato : 'NO REGISTRA' }}</p>
                                        </div>
                                        <div class="col-md-4">
                                          <p><strong>Información que permita identificar el proceso de selección o el contrato</strong><br>
                                          {{($QuerySolicitud[0]->informacion_contrato) ? $QuerySolicitud[0]->informacion_contrato : 'NO REGISTRA' }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p><strong>Documento Adjunto:</strong><br>
                                              @if($QuerySolicitud[0]->adj_informacion !=null)
                                              <a href="/{{$QuerySolicitud[0]->adj_informacion}}" target="_blank">Descargar documento</a>&nbsp;&nbsp;<i class="fa fa-download"></i>
                                              @else
                                               NO REGISTRA
                                              @endif
                                            </p>
                                          </div>
                                        <div class="col-md-4">
                                          <p><strong>Fecha Aproximada:</strong><br>
                                          {{($QuerySolicitud[0]->fecha_aprox_proceso) ? $QuerySolicitud[0]->fecha_aprox_proceso : 'NO REGISTRA' }}</p>
                                        </div>
                                        <div class="col-md-4">
                                          <p><strong>Lugar de ejecución del contrato:</strong><br>
                                          {{($QuerySolicitud[0]->lugar_contrato) ? $QuerySolicitud[0]->lugar_contrato : 'NO REGISTRA' }}</p>
                                        </div>
                                        <div class="col-md-4">
                                          <p><strong>Entidad contratante:</strong><br>
                                          {{($QuerySolicitud[0]->entidad_contrato) ? $QuerySolicitud[0]->entidad_contrato : 'NO REGISTRA' }}</p>
                                        </div>
                                        <div class="col-md-4">
                                          <p><strong>link del secop II o referencia del proceso</strong><br>
                                          {{($QuerySolicitud[0]->link_contrato) ? $QuerySolicitud[0]->link_contrato : 'NO REGISTRA' }}</p>
                                        </div>
                                    @else
                                    <div class="col-md-4">
                                    <p><strong>Proceso de selección:</strong><br>
                                    {{$QuerySolicitud[0]->proceso_seleccion}}</p></div>
                                    @endif

                                    @if($QuerySolicitud[0]->tiene_evidencias=='SI')
                                    <div class="col-md-6 pb-2">
                                        <p><strong>Evidencias Anexas:</strong></p>
                                         @foreach($anexos as $anexo)
                                           @if($anexo->titulo =='Anexos')
                                           <a href="/{{$anexo->ruta}}" target="_blank">{{$anexo->nombre_archivo}}</a>&nbsp;&nbsp;<i class="fa fa-download"></i><br>
                                           @endif
                                         @endforeach
                                    </div>                                
                                    @else
                                    <div class="col-md-6">
                                        <p><strong>Evidencias Denuncia:</strong><br>
                                        {{$QuerySolicitud[0]->tiene_evidencias}}</p></div>
                                    @endif


                                    @if($QuerySolicitud[0]->ha_denunciado=='SI')
                                    <div class="col-md-4">
                                        <p><strong>Entidad en la que ha denunciado:</strong><br>
                                        {{($QuerySolicitud[0]->entidad_denuncia) ? $QuerySolicitud[0]->entidad_denuncia : 'NO REGISTRA' }}</p>
                                      </div>
                                    <div class="col-md-4">
                                        <p><strong>Otra entidad:</strong><br>
                                        {{($QuerySolicitud[0]->otra_entidad) ? $QuerySolicitud[0]->otra_entidad : 'NO REGISTRA' }}</p>
                                    </div>
                                
                                    @else
                                    <div class="col-md-6">
                                        <p><strong>Ha denunciado anteriormente:</strong><br>
                                        {{$QuerySolicitud[0]->ha_denunciado}}</p></div>
                                    @endif
                                    <div class="col-md-6">
                                        <p><strong>Cómo impacta a la organización desde su punto de vista:</strong><br>
                                        {{($QuerySolicitud[0]->impacta_organizacion) ? $QuerySolicitud[0]->impacta_organizacion : 'NO REGISTRA' }}</p>
                                      </div>
                                    <div class="col-md-6">
                                        <p><strong>Contacto Adicional:</strong><br>
                                        {{($QuerySolicitud[0]->contacto_adicional) ? $QuerySolicitud[0]->contacto_adicional : 'NO REGISTRA' }}</p>
                                    </div>

                                    @if($QuerySolicitud[0]->disuadirlo=='SI')
                                    <div class="col-md-4">
                                        <p><strong>Quien intenta disuadir:</strong><br>
                                        {{($QuerySolicitud[0]->quien_disuade) ? $QuerySolicitud[0]->quien_disuade : 'NO REGISTRA' }}</p>
                                      </div>
                                    
                                
                                    @else
                                    <div class="col-md-4">
                                        <p><strong>Alguien ha tratado de ocultar esto o disuadirlo de denunciar:</strong><br>
                                        {{$QuerySolicitud[0]->disuadirlo}}</p></div>
                                    @endif

                                    
                                      </div>
                                   
                                </div>
                                
                                <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                                   {{-- TABLA DE PENDIENTES --}}
                                   <div class="row">

                                    <div class="col-md-6">
                                        <p><strong>Estado Denuncia:</strong><br>
                                        <span class="headline-l-govco">{{$QuerySolicitud[0]->estado_solicitud}}</span></p>
                                      </div>
                                    <div class="col-md-6">
                                        <p><strong>Observaciones</strong>:</strong><br>
                                            {{($QuerySolicitud[0]->observaciones_solicitud) ? $QuerySolicitud[0]->observaciones_solicitud : 'NO REGISTRA' }}</p>
                                      </div>
                                    <div class="col-md-6">
                                        <p><strong>Fecha limite de respuesta</strong>:</strong><br>
                                            {{($QuerySolicitud[0]->fecha_limite) ? $QuerySolicitud[0]->fecha_limite : 'NO REGISTRA' }}</p>
                                      </div>

                                      @if (!$respuestas->isEmpty())
                                      <div class="col-md-6 pb-2">
                                          <p><strong>Adjuntos de Respuesta:</strong></p>
                                          @foreach ($respuestas as $respuesta)
                                              
                                                  <a href="/{{ $respuesta->ruta }}"
                                                      target="_blank">{{ $respuesta->nombre_archivo }}</a>&nbsp;&nbsp;<i
                                                      class="fa fa-download"></i><br>
                                             
                                          @endforeach
                                      </div>
                                  @endif

                                      <div class="col-md-12">
                                        <p><p><strong>Acciones</strong>:</strong></p>

                                <table id="DataTables_Table_0"
                                    class="table display table-responsive-md" width="100%"
                                    style="text-align: left!important;">
                                    <thead>
                                        <tr>
                                            <th style="color: #004884;">Acción</th>
                                            <th style="color: #004884;">Observación</th>
                                            <th style="color: #004884;">Fecha</th>
                                            
                                    </thead>
                                    <tbody>
                                        @foreach ($trazabilidad as $traza)
                                            <tr>
                                                <td>{{ $traza->accion }}</td>
                                                <td>{{ $traza->observacion }}</td>
                                              <td>{{ $traza->created_at }}</td>
                                                                                              
                                               </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                                      </div>
                                  
                                   </div>
                                {{-- </ TABLA DE PENDIENTE FIN --}}
                            </div>          
                                                    
                       
                            </div>
                            </div>

                               

                         
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-round btn-high" href="{{ URL::route('rita.index') }}" style="float: left;">Volver</a>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>

    </div>     

@endsection


