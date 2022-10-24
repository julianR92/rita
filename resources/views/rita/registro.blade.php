@extends('layouts.app')

@section('title', 'RITA')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
   textarea {
  resize: none;
}
#the-count {
  float: right;
  font-size: 12px!important;
}
.current,.maximum{
   font-size: 12px!important;
}




.loader {
            position: relative;
            text-align: center;
            margin: 15px auto 35px auto;
            z-index: 9999;
            display: block;
            width: 80px;
            height: 80px;
            border: 10px solid rgba(0, 0, 0, .3);
            border-radius: 50%;
            border-top-color: #004884;
            animation: spin 1s ease-in-out infinite;
            -webkit-animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @-webkit-keyframes spin {
            to {
                -webkit-transform: rotate(360deg);
            }
        }

            /* Start by setting display:none to make this hidden.
         Then we position it in relation to the viewport window
         with position:fixed. Width, height, top and left speak
         for themselves. Background we set to 80% white with
         our animation centered, and no-repeating */
      .modal {
         display:    none;
         position:   fixed;
         z-index:    1000;
         top:        0;
         left:       0;
         height:     100%;
         width:      100%;
         background: rgba( 255, 255, 255, .8 ) 
                     url('http://i.stack.imgur.com/FhHRx.gif') 
                     50% 50% 
                     no-repeat;
      }

      /* When the body has the loading class, we turn
         the scrollbar off with overflow:hidden */
      body.loading .modal {
         overflow: hidden;   
      }

      /* Anytime the body has the loading class, our
         modal element will be visible */
      body.loading .modal {
         display: block;
}
</style>

    <div class="container mt-3 mb-4 m-xs-x-3">
        <div class="row pl-4">
            <div class="px-0 col-md-9 col-xs-12 col-sm-12">
                <nav aria-label="Miga de pan" style="max-height: 20px;">
                    <ol class="breadcrumb" style="background-color: #FFFFFF;">
                        <li class="breadcrumb-item ml-3 ml-md-0">
                            <a style="color: #004fbf; font-size:14px;" class="breadcrumb-text" href="https://www.bucaramanga.gov.co" target="_blank" tabindex="3">Inicio</a>
                        </li>
                        <li class="breadcrumb-item ">
                            <div class="image-icon">
                                <span class="breadcrumb govco-icon govco-icon-shortr-arrow" style="height: 22px;"></span>
                                <a style="color: #004fbf; font-size:14px;" class="breadcrumb-text" href="https://www.bucaramanga.gov.co/tramites/" target="_blank" tabindex="4">Tramites y servicios</a>
                            </div>
                        </li>
                        <li class="breadcrumb-item ">
                            <div class="image-icon">
                                <span class="breadcrumb govco-icon govco-icon-shortr-arrow" style="height: 22px;"></span>
                                <p class="ml-3 ml-md-0 text-miga" style="color: #004884; font-size:14px;">
                                    Rita
                                    </p>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                    <div class="col-md-12" style="padding-left: 0!important">
                        <div class="card step-progress border-0" style="font-size: 10px; background-color: transparent !important;">
                            <div class="step-slider">
                                <!--<div data-id="step1" class="step-slider-item active" ><p style="padding-top: 0px;margin-top:5px;"></p></div>-->
                                <div data-id="step2" class="step-slider-item active">
                                    <p style="padding-top: 0px;margin-top:5px;color: #BABABA;" id="barra_progreso"><span
                                            class="circle_cero">1</span> Inicio</p>
                                </div>
                                <div data-id="step3" class="step-slider-item">
                                    <p style="padding-top: 0px;margin-top:5px;color: #3366CC" id="barra_progreso"><span
                                            class="circle_uno">2 </span> Hago mi solicitud</p>
                                </div>
                                <div data-id="step4" class="step-slider-item">
                                    <p style="padding-top: 0px;margin-top:5px;" id="barra_progreso"><span
                                            class="circle_dos">3</span>Procesan mi solicitud</p>
                                </div>
                                <div data-id="step5" class="step-slider-item">
                                    <p style="padding-top: 0px;margin-top:5px;" id="barra_progreso"><span
                                            class="circle_dos">4</span> Respuesta</p>
                                </div>

                            </div>
                        </div>
                    </div>                     
                    <form action="#" method="" role="form" enctype="multipart/form-data" id="formRita" class="formRita form-general">
                        @csrf
                        <div class="card govco-card border-0 shadow-none" style="border-radius: 0px;">

                            <h1 class="headline-xl-govco">Canal de denuncia RITA</h1>

                            <div id="top">
                              <div class="alert alert-danger print-error-msg alert-dismissible fade show" style="display:none"
                                  role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                  <ul></ul>
                              </div>
                          </div>
                        </div>

                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                    @endif 

                        <h3 class="headline-l-govco mt-3 pl-0">1. Datos Generales de la Solicitud</h3>
                        
                        <div class="row form-group mt-2 div-info-general">
                            <div class="col-md-12 pl-1 pr-1 pt-3">                              
                              <label class="d-inline" tabindex="25" style="cursor: pointer">
                                 Solicitud Anónima
                                 <input type="checkbox" class="check-style" id="tipo_solicitud" name="tipo_solicitud"  value="Anonima" tabindex="25"/>
                                 <label for="tipo_solicitud"> </label>
                              </label>
                            
                                @error('tipo_solicitud')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             {{-- inicio de INFORMACION GENERAL --}}
                           
                            <div class="col-md-6 pl-1 pr-1 pt-3 div-info">
                              <label for="tipo_persona" class="form-label">Tipo persona * </label>
                              <select class="form-control select_general  @error('tipo_persona') is-invalid @enderror info_general" name="tipo_persona" id="tipo_persona" required tabindex="11">
                                  <option value="">Seleccione</option>
                                  <option value="NATURAL">Natural</option>
                                  <option value="JURIDICO">Juridico</option>                                
                              </select>
                              @error('tipo_persona')
                              <span class="invalid-feedback" role="alert">
                                 <strong class="text-danger">{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="col-md-6 pl-1 pr-1 pt-3 div-info">
                              <label for="tipo_doc" class="form-label">Tipo de Documento * </label>
                              <select class="form-control select_general  @error('tipo_doc') is-invalid @enderror info_general" name="tipo_doc" id="tipo_doc" required tabindex="11">
                                  <option value="">Seleccione</option>                            
                                  <option value="C.C.">Cedula de Ciudadanía</option>
                                  <option value="NIT">NIT</option>
                                  <option value="C.E.">Cedula de Extranjería</option>
                                  <option value="P.P.">Pasaporte</option>
                              </select>
                              @error('tipo_doc')
                              <span class="invalid-feedback" role="alert">
                                 <strong class="text-danger">{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                          <div class="col-md-6 pl-1 pr-1 pt-3 div-info">
                           <label for="identificacion" class="form-label">Numero de documento* </label>
                           <input value="{{old('identificacion')}}" type="text" class="form-control document_validate  @error('identificacion') is-invalid @enderror info_general" name="identificacion" id="identificacion"  maxlength="15" minlength="4" required onkeypress="return Numeros(event)" placeholder="Ej: 13921289" tabindex="11" >
                           @error('identificacion')
                           <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                        <div class="col-md-6 pl-1 pr-1 pt-3 d-none div-nombres">
                                <label for="nombres" class="form-label">Nombres* </label>
                                <input value="{{old('nombres')}}" type="text" class="form-control name_validate  @error('nombres') is-invalid @enderror info_general" name="nombres" id="nombres"  maxlength="25" minlength="4" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)" tabindex="10" placeholder="Ej: Dario" >
                                @error('nombres')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                         <div class="col-md-6 pl-1 pr-1 pt-3 d-none div-nombres">
                                <label for="apellidos" class="form-label">Apellidos* </label>
                                <input value="{{old('apellidos')}}" type="text" class="form-control name_validate  @error('apellidos') is-invalid @enderror info_general" name="apellidos" id="apellidos"  maxlength="25" minlength="4" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)" tabindex="10" placeholder="Ej: Perez" >
                                @error('apellidos')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                       
                        
                           {{-- FIN DE INFORMACION GENERAL --}}

                         <div class="col-md-12 pl-1 pr-1 pt-3 d-none div-razon">
                                <label for="razon_social" class="form-label">Razon social* </label>
                                <input value="{{old('razon_social')}}" type="text" class="form-control razon_social  @error('razon_social') is-invalid @enderror info_general" name="razon_social" id="razon_social"  maxlength="80" minlength="4" onkeypress="return NumDoc(event)" onkeyup="aMayusculas(this.value,this.id)" tabindex="10" placeholder="Ej: DISPLAY CONNECTIONS " >
                                @error('razon_social')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                         <div class="col-md-12 pl-1 pr-1 pt-3">
                                <label for="asunto" class="form-label">Asunto* </label>
                                <input value="{{old('asunto')}}" type="text" class="form-control razon_social  @error('asunto') is-invalid @enderror info_general" name="asunto" id="asunto"  maxlength="100" minlength="4" onkeypress="return NumDoc(event)" onkeyup="aMayusculas(this.value,this.id)" tabindex="10" placeholder="Ej: Denuncia... " required>
                                @error('asunto')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>

                           <div class="col-md-6 pl-1 pr-1 pt-3">
                              <label for="telefono_movil" class="form-label">Teléfono movil* </label>
                              <input value="{{old('telefono_movil')}}" type="text" class="form-control  @error('telefono_movil') is-invalid @enderror number_validate" name="telefono_movil" id="telefono_movil"  maxlength="10" minlength="7" required onkeypress="return Numeros(event)" tabindex="14" placeholder="E: 3167901232" >
                              @error('telefono_movil')
                              <span class="invalid-feedback" role="alert">
                                 <strong class="text-danger">{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                           <div class="col-md-6 pl-1 pr-1 pt-3">
                              <label for="telefono_fijo" class="form-label">Teléfono fijo </label>
                              <input value="{{old('telefono_fijo')}}" type="text" class="form-control  @error('telefono_fijo') is-invalid @enderror number_validate" name="telefono_fijo" id="telefono_fijo"  maxlength="10" minlength="7" onkeypress="return Numeros(event)" tabindex="14" placeholder="Ej: 607697612" >
                              @error('telefono_fijo')
                              <span class="invalid-feedback" role="alert">
                                 <strong class="text-danger">{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                            
                            <div class="col-md-12 pl-1 pt-3">

                                <label for="direccion_solicitante" class="form-label">Dirección* </label><button type="button" class="btn btn-link"><span style="text-transform: lowercase; font-size: 12px;" class="text-primary label-event" data-toggle="modal" id="button-modal" data-target="#ModalDirecciones" tabindex="12">(Clic para insertar direccion)</span></button>
                                <input type="text" value="{{old('direccion_solicitante')}}" class="form-control  @error('direccion_solicitante') is-invalid @enderror" name="direccion" id="direccion_solicitante"  maxlength="120" required readonly placeholder="Ej: CARRERA 12 # 13-10">
                                @error('direccion_solicitante')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 pl-1 pr-1 pt-3">
                                <label for="barrio_solicitante" class="form-label">Barrio* </label>
                               <select name="barrio" id="barrio_solicitante" class="form-control @error('barrio_solicitante') is-invalid @enderror" required tabindex="13">
                                   <option value=""></option>
                                   @foreach ($Barrios as $barrio)
                                   <option value="{{$barrio->nombre}}">{{$barrio->nombre}}</option>
                                       
                                   @endforeach
                               </select>
                                @error('barrio_solicitante')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 pl-1 pr-1 pt-3"></div>

                            <div class="col-md-6 pl-1 pr-1 pt-3">
                                <label for="email_responsable" class="form-label">Correo Electronico* </label>
                                <input value="{{old('email_responsable')}}" type="text" class="form-control  @error('email_responsable') is-invalid @enderror email_validate" name="email_responsable" id="email_responsable"  required tabindex="15" placeholder="Ej: marioperez10@gmail">
                                @error('email_responsable')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 pl-1 pr-1 pt-3">
                                <label for="email_confirmado" class="form-label">Confirme su correo* </label>
                                <input type="text" onpaste="return false;" class="form-control  @error('email_confirmado') is-invalid @enderror email_validate" name="email_confirmado" id="email_confirmado"  required onpaste="return false;"  placeholder="Ej: marioperez10@gmail" tabindex="16">
                                @error('email_confirmado')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                                     

                            <div class="col-md-4 pl-1 pr-1 pt-3">
                                <label for="pais" class="form-label">Pais* </label>
                               <select name="pais" id="pais" class="form-control @error('pais') is-invalid @enderror select_general" required tabindex="19">
                                   <option value=""></option>
                                   @foreach ($paises as $pais)
                                   <option value="{{$pais->pais}}" {{ ($pais->pais == 'COLOMBIA') ? 'selected' : '' }}>{{$pais->pais}}</option>                                       
                                   @endforeach
                               </select>
                                @error('pais')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 pl-1 pr-1 pt-3">
                                <label for="pais" class="form-label label-dep">Departamento* </label>
                               <select name="departamento" id="departamento" class="form-control @error('departamento') is-invalid @enderror select_general" required tabindex="19">
                                   <option value=""></option>
                                   @foreach ($departamentos as $departamento)
                                   <option value="{{$departamento->codigo_depto}}" {{ ($departamento->codigo_depto == '68') ? 'selected' : '' }}>{{$departamento->departamento}}</option>                                       
                                   @endforeach
                               </select>
                                @error('departamento')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 pl-1 pr-1 pt-3">
                                <label for="municipio" class="form-label label-mun">Municipio* </label>
                               <select name="municipio" id="municipio" class="form-control @error('municipio') is-invalid @enderror select_general" required tabindex="19">
                                   <option value=""></option>
                                   @foreach ($municipios as $municipio)
                                   <option value="{{$municipio->municipio}}" {{ ($municipio->codigo_muni == '68001') ? 'selected' : '' }}>{{$municipio->municipio}}</option>                                       
                                   @endforeach
                               </select>
                                @error('municipio')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 pl-1 pr-1 pt-3">
                              <p class="text-justify text-sm"><b>MEDIO DE RESPUESTA*: </b> <small>Tenga en cuenta que la opción que seleccione será utilizada para el envío de la respuesta. En caso de no seleccionar ninguna o que la solicitud sea de Tipo anónimo la respuesta estará disponible para consultar en este sitio en la opción del menú <mark>"Consultar"</mark> con el número de radicado o con la identificación, (Respecto a la presentación de reportes anónimos, estas sí pueden ser presentadas y deben ser gestionadas por las entidades en los canales respectivos. Sin embargo, al tratarse de un reporte de carácter anónimo, el ciudadano debe dar toda la información suficiente que permita generar una orientación en el análisis de los hechos respectivos y aportar todo el material probatorio con que cuente)</small></p>
                                 @error('medio_respuesta')
                                 <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                     </span>
                                 @enderror
                              <div class="form-check-inline" tabindex="27">
                                 <label class="" tabindex="27">
                                    <input type="radio" name="medio_respuesta" id="rb_em" value="CORREO ELECTRONICO" tabindex="27" class="radio-per-gov"/>
                                    <label for="rb_em">Correo Electronico</label>
                                 </label>
                              </div>
                              <div class="form-check-inline" tabindex="28">
                                 <label class="" tabindex="28">
                                    <input type="radio" name="medio_respuesta" id="rb_dir" value="DIRECCION DE CORRESPONDENCIA" tabindex="28" class="radio-per-gov"/>
                                    <label for="rb_dir">Dirección de correspondencia</label>
                                 </label>
                              </div>
                              <div class="form-check-inline" tabindex="28">
                                 <label class="" tabindex="28">
                                    <input type="radio" name="medio_respuesta" id="rb_web" value="CONSULTA WEB" tabindex="28" class="radio-per-gov"/>
                                    <label for="rb_web">Consulta Web</label>
                                 </label>
                              </div>
                            </div>

                            <h3 class="headline-l-govco mt-3 pl-0">2. Datos especificos de la denuncia</h3>
                            
                            <div class="col-md-12 pl-1 pr-1 pt-2">
                              <label for="lugar_denuncia" class="form-label">¿Dónde fue el lugar de la irregularidad? *</label>
                              <textarea class="form-control @error('lugar_denuncia') is-invalid @enderror" name="lugar_denuncia" id="lugar_denuncia" rows="3" placeholder="" onkeypress="return Direccion(event)" maxlength="300" required></textarea>
                              <div id="the-count">
                                 <span class="text-sm current">0</span>
                                 <span class="maximum text-sm">/ 300</span>
                              </div>
                              @error('lugar_denuncia')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                               </span>
                                @enderror

                            
                            </div>
                            <div class="col-md-12 pl-1 pr-1 pt-2">
                              <label for="cuando_denuncia" class="form-label">¿Cuándo ocurrieron los hechos? *</label>
                              <textarea class="form-control @error('cuando_denuncia') is-invalid @enderror" name="cuando_denuncia" id="cuando_denuncia" rows="3" placeholder="" onkeypress="return Direccion(event)" maxlength="300" required></textarea>
                              <div id="the-count">
                                 <span class="text-sm current">0</span>
                                 <span class="maximum text-sm">/ 300</span>
                              </div>
                              @error('cuando_denuncia')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                               </span>
                                @enderror

                            
                            </div>
                            <div class="col-md-12 pl-1 pr-1 pt-2">
                              <label for="involucrados_denuncia" class="form-label">¿Quiénes estan involucrados? *</label>
                              <textarea class="form-control @error('involucrados_denuncia') is-invalid @enderror" name="involucrados_denuncia" id="involucrados_denuncia" rows="3" placeholder="puede identificar la entidad, secretaria u oficina o posibles funcionarios responsables." onkeypress="return Direccion(event)" maxlength="300" required ></textarea>
                              <div id="the-count">
                                 <span class="text-sm current">0</span>
                                 <span class="maximum text-sm">/ 300</span>
                              </div>
                              @error('involucrados_denuncia')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                               </span>
                                @enderror

                            
                            </div>
                            <div class="col-md-12 pl-1 pr-1 pt-2">
                              <label for="descripcion_hechos" class="form-label">Describa los Hechos *</label>
                              <textarea class="form-control @error('descripcion_hechos') is-invalid @enderror" name="descripcion_hechos" id="descripcion_hechos" rows="3" placeholder="Campo abierto para describir las circunstancias de modo, tiempo y lugar" onkeypress="return Direccion(event)" maxlength="300" required ></textarea>
                              <div id="the-count">
                                 <span class="text-sm current">0</span>
                                 <span class="maximum text-sm">/ 300</span>
                              </div>
                              @error('descripcion_hechos')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                               </span>
                                @enderror                            
                            </div>
                            
                            <div class="col-md-8 pl-1 pr-1 pt-2">
                               <label for="arc_descripcion" class="form-label">Adjunto (<small>Si es necesario para la descripcion de los hechos <b>MAX:10MB</b></small>)</label>
                               <input type="file" class="form-control  @error('arc_descripcion') is-invalid @enderror" accept="application/pdf,.doc,.docx,.png, .jpg, .jpegapplication/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="arc_descripcion" id="arc_descripcion"    tabindex="16">
                               @error('arc_descripcion')
                               <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                              <div class="col-md-12 pl-1 pr-1 pt-3">
                                <label for="riesgo_denuncia" class="form-label">¿Existe algún riesgo para usted o para los demás?  *</label>
                                <textarea class="form-control @error('riesgo_denuncia') is-invalid @enderror" name="riesgo_denuncia" id="riesgo_denuncia" rows="3" placeholder="" onkeypress="return Direccion(event)" maxlength="300" required ></textarea>
                                <div id="the-count">
                                   <span class="text-sm current">0</span>
                                   <span class="maximum text-sm">/ 300</span>
                                </div>
                                @error('riesgo_denuncia')
                                  <span class="invalid-feedback" role="alert">
                                     <strong class="text-danger">{{ $message }}</strong>
                                 </span>
                                  @enderror                            
                              </div>

                              <div class="col-md-12 pl-1 pr-1 pt-3">
                                 <p class="text-justyfy">En caso de tratarse de un proceso de selección o de un contrato estatal, debe identificarlo:</p>
                                    @error('proceso_seleccion')
                                    <span class="invalid-feedback" role="alert">
                                       <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 <div class="form-check-inline" tabindex="27">
                                    <label class="" tabindex="27">
                                       <input type="radio" name="proceso_seleccion" id="rb_pr_si" value="SI" tabindex="27" class="radio-per-gov"/>
                                       <label for="rb_pr_si">SI</label>
                                    </label>
                                 </div>
                                 <div class="form-check-inline" tabindex="28">
                                    <label class="" tabindex="28">
                                       <input type="radio" name="proceso_seleccion" id="rb_pr_no" value="NO" tabindex="28" class="radio-per-gov"/>
                                       <label for="rb_pr_no">NO</label>
                                    </label>
                                 </div>
                                
                              </div>

                              <div class="col-md-6 pl-1 pr-1 pt-3 d-none div-contratos">
                                 <label for="tipo_contrato" class="form-label">Tipo de contrato * </label>
                                 <select class="form-control  @error('tipo_contrato') is-invalid @enderror info_contrato" name="tipo_contrato" id="tipo_contrato" tabindex="11">
                                     <option value="">Seleccione</option>                            
                                     <option value="Mínima cuantía">Mínima cuantía</option>
                                     <option value="Licitación pública">Licitación pública</option>
                                     <option value="Selección abreviada de menor cuantía">Selección abreviada de menor cuantía</option>
                                     <option value="Selección abreviada subasta inversa">Selección abreviada subasta inversa</option>
                                     <option value="Concurso de mérito">Concurso de mérito</option>
                                     <option value="Otro">Otro</option>
                                 </select>
                                 @error('tipo_contrato')
                                 <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                              <div class="col-md-12 pl-1 pr-1 pt-3 d-none div-contratos">
                                 <label for="informacion_contrato" class="form-label">Información que permita identificar el proceso de selección o el contrato * </label>
                                 <textarea class="form-control @error('informacion_contrato') is-invalid @enderror info_contrato" name="informacion_contrato" id="informacion_contrato" rows="3" placeholder="Campo abierto para describir las circunstancias de modo, tiempo y lugar" onkeypress="return Direccion(event)" maxlength="300" required ></textarea>
                                 <div id="the-count">
                                    <span class="text-sm current">0</span>
                                    <span class="maximum text-sm">/ 300</span>
                                 </div>
                                 @error('informacion_contrato')
                                   <span class="invalid-feedback" role="alert">
                                      <strong class="text-danger">{{ $message }}</strong>
                                  </span>
                                   @enderror
                                 
                             </div>                            


                             <div class="col-md-6 pl-1 pr-1 pt-2 d-none div-contratos">
                              <label for="arc_informacion" class="form-label">Adjunto (<small>Si es necesario para complementar información <b>MAX:10MB</b></small>)</label>
                              <input type="file" class="form-control  @error('arc_informacion') is-invalid @enderror" accept="application/pdf,.doc,.docx,.png, .jpg, .jpegapplication/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="arc_informacion" id="arc_informacion" tabindex="16">
                              @error('arc_informacion')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                             </div>

                             
                             <div class="col-md-6 pl-1 pr-1 pt-2 d-none div-contratos">
                              <label for="fecha_aprox_proceso" class="form-label">Fechas aproximadas del proceso de contratación*.</label>
                              <input type="date" class="form-control  @error('fecha_aprox_proceso') is-invalid @enderror info_contrato" name="fecha_aprox_proceso" id="fecha_aprox_proceso" tabindex="16">
                              @error('fecha_aprox_proceso')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                             </div>

                             <div class="col-md-12 pl-1 pr-1 pt-3 d-none div-contratos">
                              <label for="lugar_contrato" class="form-label">Lugar de ejecución del contrato* </label>
                              <input value="{{old('lugar_contrato')}}" type="text" class="form-control lugar_contrato  @error('lugar_contrato') is-invalid @enderror info_contrato" name="lugar_contrato" id="lugar_contrato"  maxlength="80" minlength="4" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)" tabindex="10" placeholder="Ej: BUCARAMANGA " >
                              @error('lugar_contrato')
                              <span class="invalid-feedback" role="alert">
                                 <strong class="text-danger">{{ $message }}</strong>
                                  </span>
                              @enderror
                         </div>
                             <div class="col-md-12 pl-1 pr-1 pt-3 d-none div-contratos">
                              <label for="entidad_contrato" class="form-label">Entidad contratante* </label>
                              <input value="{{old('entidad_contrato')}}" type="text" class="form-control entidad_contrato  @error('entidad_contrato') is-invalid @enderror info_contrato" name="entidad_contrato" id="entidad_contrato"  maxlength="80" minlength="4" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)" tabindex="10" placeholder="Ej: ALCALDIA DE BUCARAMANGA " >
                              @error('entidad_contrato')
                              <span class="invalid-feedback" role="alert">
                                 <strong class="text-danger">{{ $message }}</strong>
                                  </span>
                              @enderror
                         </div>
                             <div class="col-md-12 pl-1 pr-1 pt-3 d-none div-contratos">
                              <label for="link_contrato" class="form-label"> Si tiene conocimiento anexar el link del secop II o referencia del proceso </label>
                              <input value="{{old('link_contrato')}}" type="text" class="form-control link_contrato  @error('link_contrato') is-invalid @enderror" name="link_contrato" id="link_contrato"  maxlength="80" minlength="4" onkeypress="return NumDoc(event)" onkeyup="aMayusculas(this.value,this.id)" tabindex="10" placeholder="Ej: https://community.secop.gov.co/Public/Tendering/ContractNoticePhases/View?PPI=CO1.PPI.19441011&isFromPublicArea=True&isModal=False " >
                              @error('link_contrato')
                              <span class="invalid-feedback" role="alert">
                                 <strong class="text-danger">{{ $message }}</strong>
                                  </span>
                              @enderror
                         </div>

                         <div class="col-md-12 pl-1 pr-1 pt-1">
                           <p class="text-justyfy">¿Tiene evidencia que respalde la denuncia? * </p>
                              @error('tiene_evidencias')
                              <span class="invalid-feedback" role="alert">
                                 <strong class="text-danger">{{ $message }}</strong>
                                  </span>
                              @enderror
                           <div class="form-check-inline" tabindex="27">
                              <label class="" tabindex="27">
                                 <input type="radio" name="tiene_evidencias" id="rb_te_si" value="SI" tabindex="27" class="radio-per-gov"/>
                                 <label for="rb_te_si">SI</label>
                              </label>
                           </div>
                           <div class="form-check-inline" tabindex="28">
                              <label class="" tabindex="28">
                                 <input type="radio" name="tiene_evidencias" id="rb_te_no" value="NO" tabindex="28" class="radio-per-gov"/>
                                 <label for="rb_te_no">NO</label>
                              </label>
                           </div>
                          
                        </div>

                        <div class="col-md-12 pl-1 pr-1 pt-1 d-none div-evidencias">
                          <label for="attachment">
                              <a class="btn btn-round btn-middle btn-outline-info" role="button" aria-disabled="false">+ Añadir Archivos</a>
                              
                           </label>
                           <input type="file" name="evidencias[]" accept="application/pdf,.doc,.docx,.png, .jpg, .jpegapplication/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" id="attachment" style="visibility: hidden; position: absolute;" class="info_evidencias" multiple/>
                           
                        </p>
                        <div id="files-area">
                             <span id="filesList">
                              <span id="files-names"></span>
                             </span>
                        </div>
                        @error('evidencias')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-12 pl-1 pr-1 pt-3">
                           <p class="text-justyfy">¿Ha denunciado con anterioridad? </p>
                              @error('ha_denunciado')
                              <span class="invalid-feedback" role="alert">
                                 <strong class="text-danger">{{ $message }}</strong>
                                  </span>
                              @enderror
                           <div class="form-check-inline" tabindex="27">
                              <label class="" tabindex="27">
                                 <input type="radio" name="ha_denunciado" id="rb_hd_si" value="SI" tabindex="27" class="radio-per-gov"/>
                                 <label for="rb_hd_si">SI</label>
                              </label>
                           </div>
                           <div class="form-check-inline" tabindex="28">
                              <label class="" tabindex="28">
                                 <input type="radio" name="ha_denunciado" id="rb_hd_no" value="NO" tabindex="28" class="radio-per-gov"/>
                                 <label for="rb_hd_no">NO</label>
                              </label>
                           </div>
                          
                        </div>

                        <div class="col-md-6 pl-1 pr-1 pt-3 d-none div-denuncias">
                           <label for="entidad_denuncia" class="form-label">¿Ante quién?  * </label>
                           <select class="form-control  @error('entidad_denuncia') is-invalid @enderror info_denuncias" name="entidad_denuncia" id="entidad_denuncia" tabindex="11">
                               <option value="">Seleccione</option>                            
                               <option value="Alcaldia de Bucaramanga">Alcaldia de Bucaramanga</option>
                               <option value="Gobernación de Santander">Gobernación de Santander</option>
                               <option value="​Contraloría General de la República">​Contraloría General de la República</option>
                               <option value="Procuraduría General de la Nación">Procuraduría General de la Nación</option>                               
                               <option value="Otro">Otro</option>                               
                           </select>
                           @error('entidad_denuncia')
                           <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>

                       <div class="col-md-6 pl-1 pr-1 pt-3 d-none div-denuncias-2">
                        <label for="otra_entidad" class="form-label">Otro* </label>
                        <input value="{{old('otra_entidad')}}" type="text" class="form-control otra_entidad  @error('otra_entidad') is-invalid @enderror info_denuncias-2" name="otra_entidad" id="otra_entidad"  maxlength="80" minlength="4" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)" tabindex="10" placeholder="Ej: Defensoria del Pueblo " >
                        @error('otra_entidad')
                        <span class="invalid-feedback" role="alert">
                           <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                   </div>

                   <div class="col-md-12 pl-1 pr-1 pt-2">
                     <label for="impacta_organizacion" class="form-label">¿Cómo impacta a la organización desde su punto de vista?</label>
                     <textarea class="form-control @error('impacta_organizacion') is-invalid @enderror" name="impacta_organizacion" id="impacta_organizacion" rows="3" placeholder="" onkeypress="return Direccion(event)" maxlength="300"></textarea>
                     <div id="the-count">
                        <span class="text-sm current">0</span>
                        <span class="maximum text-sm">/ 300</span>
                     </div>
                     @error('impacta_organizacion')
                       <span class="invalid-feedback" role="alert">
                          <strong class="text-danger">{{ $message }}</strong>
                      </span>
                       @enderror                            
                   </div>

                   <div class="col-md-12 pl-1 pr-1 pt-3">
                     <label for="contacto_adicional" class="form-label">¿Hay alguien más que conozca de primera mano a quien se pueda contactar?</label>
                     <input value="{{old('contacto_adicional')}}" type="text" class="form-control contacto_adicional  @error('contacto_adicional') is-invalid @enderror info_contrato" name="contacto_adicional" id="contacto_adicional"  maxlength="100" minlength="2" onkeypress="return NumDoc(event)" onkeyup="aMayusculas(this.value,this.id)" tabindex="10" placeholder="Ej: MI PRIMO ALEX SEGURA NUMERO 31671727812 " >
                     @error('contacto_adicional')
                     <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                         </span>
                     @enderror
                </div>
                
                <div class="col-md-12 pl-1 pr-1 pt-3">
                  <p class="text-justyfy">¿Alguien ha tratado de ocultar esto o disuadirlo de denunciar? </p>
                     @error('disuadirlo')
                     <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                         </span>
                     @enderror
                  <div class="form-check-inline" tabindex="27">
                     <label class="" tabindex="27">
                        <input type="radio" name="disuadirlo" id="rb_di_si" value="SI" tabindex="27" class="radio-per-gov"/>
                        <label for="rb_di_si">SI</label>
                     </label>
                  </div>
                  <div class="form-check-inline" tabindex="28">
                     <label class="" tabindex="28">
                        <input type="radio" name="disuadirlo" id="rb_di_no" value="NO" tabindex="28" class="radio-per-gov"/>
                        <label for="rb_di_no">NO</label>
                     </label>
                  </div>                 
               </div>

               <div class="col-md-12 pl-1 pr-1 pt-3 d-none div-disuadir">
                  <label for="quien_disuade" class="form-label">¿Quien?*</label>
                  <input value="{{old('quien_disuade')}}" type="text" class="form-control quien_disuade  @error('quien_disuade') is-invalid @enderror info_disuadir" name="quien_disuade" id="quien_disuade"  maxlength="100" minlength="2" onkeypress="return NumDoc(event)" onkeyup="aMayusculas(this.value,this.id)" tabindex="10" placeholder="Ej: xxx " >
                  @error('quien_disuade')
                  <span class="invalid-feedback" role="alert">
                     <strong class="text-danger">{{ $message }}</strong>
                      </span>
                  @enderror
             </div>

               
                              
                              
                              
                          

                            

                            {{-- por definir cuarto documento --}}
                            <div class="col-md-12 pl-1 pt-3">
                                <h4 class="headline-m-govco">Aviso de privacidad y autorización tratamiento de datos personales</h4>

                            <a class="btn btn-low px-0" href="https://www.bucaramanga.gov.co/Inicio/autorizacion-de-tratamiento-de-datos-personales/" target="_blank" tabindex="24">Autorizo el tratamiento de datos personales</a>
                            <label class="d-inline">
                               <input type="checkbox"  class="check-style" id="AT00" name="tratamiento_datos"  value="SI" tabindex="24" required />
                               <label for="AT00"> </label>
                            </label><br>

                            <a class="btn btn-low px-0" href="https://www.bucaramanga.gov.co/wp-content/uploads/2018/12/Resolucion-340-Dic-26-2018-y-Politica.pdf" target="_blank" tabindex="25">Acepto términos y condiciones</a>
                            <label class="d-inline" tabindex="25">
                               <input type="checkbox" class="check-style" id="AT01" name="acepto_terminos"  value="SI" tabindex="25" required />
                               <label for="AT01"> </label>
                            </label>
                            <p class="text-justify">Confirmo que soy mayor de edad y con plena capacidad para diligenciar el presente formulario.
                               Así mismo declaro que la información aquí suministrada corresponde a la verdad.
                               Declaro que he leído, entiendo y acepto las políticas de tratamiento de los datos que suministro,
                               de conformidad con la Ley 1581 de 2012 y demás normas concordantes
                               <label class="d-inline" tabindex="26">
                                  <input type="checkbox" class="check-style" id="AT02" name="confirmo_mayorEdad" tabindex="26"  value="SI" required/>
                                  <label for="AT02"> </label>
                               </label>
                            </p>
                         </div>
                         <div class="col-md-11 pl-1 pr-1 pt-3">
                            <p>Acepto que la información aquí registrada sea compartida con otras entidades y/o
                               terceros vinculados a la Alcaldía de Bucaramanga</p>
                               @error('compartir_informacion')
                               <span class="invalid-feedback" role="alert">
                                  <strong class="text-danger">{{ $message }}</strong>
                                   </span>
                               @enderror
                            <div class="form-check-inline" tabindex="27">
                               <label class="" tabindex="27">
                                  <input type="radio" name="compartir_informacion" id="rb_si" value="SI" tabindex="27" class="radio-per-gov"/>
                                  <label for="rb_si">SI</label>
                               </label>
                            </div>
                            <div class="form-check-inline" tabindex="28">
                               <label class="" tabindex="28">
                                  <input type="radio" name="compartir_informacion" id="rb_no" value="NO" tabindex="28" class="radio-per-gov"/>
                                  <label for="rb_no">NO</label>
                               </label>
                            </div>
                           
                         </div>

                         <div class="col-md-12  pl-1 pr-1 pt-3 text-left mt-4" style="padding-left: 0px!important">
                           <div class="g-recaptcha" data-sitekey="6Ldm3EEiAAAAAPOeZdnM1U2yxyR0fn4xsURJJWv3" data-tabindex="29"></div>

                            <button style="font-size:15px;" type="submit" class="btn btn-round btn-middle  btn_enviar_solicitud" name="consultar" onclick="return confirm('¿Esta seguro de realizar esta solicitud ?')" tabindex="30">Enviar Solicitud</button>

                            <button style="font-size:15px;" class="btn btn-round btn-middle btn_carga d-none" type="button" disabled><span class="spinner-grow spinner-grow-sm text-primary" role="status" aria-hidden="true" ></span> Enviando...</button>

                            <div class="modal"><!-- Place at bottom of page --></div>
                            
                         </div>
                        </div>
                    </form>                 
                  </div>
                        
                            
                            


                       

                   
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <!---contenido de cajas -->
                   {{-- manual --}}

                   <div class="accordion accordion-govco mb-3" id="">
                     <div class="card mb-0">
                         <div class="card-header row no-gutters" id="">
                             <button class="btn-link row no-gutters" type="button">
                                 <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                    <a  type="button" href="{{asset('library/Manuales/M-TIC-1400-170-011 Manual usuario (ciudadano) parqueadero publico.pdf')}}" target="_blank"><h4 class="headline-s-govco" tabindex="5">Normativa</h4></a>
                                 </div>
                                 <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                     <div class="btn-icon-close">
                                         {{-- <span class="govco-icon govco-icon-shortu-arrow-n size-1x"></span> --}}
                                         {{-- <span class="govco-icon govco-icon-shortd-arrow-n size-1x"></span> --}}
                                     </div>
                                 </div>
                             </button>
                         </div>                        
                     </div>
                 </div>
                    

                    <div class="accordion accordion-govco" id="EjemploAccordion-2">
                        <div class="card mb-0">
                           <div class="card-header row no-gutters" id="headingUno">
                              <button class="btn-link row no-gutters collapsed" type="button" data-toggle="collapse"
                                  data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"  tabindex="6">
                                      <h4 class="headline-s-govco">¿Tienes dudas?</h4>
                                  </div>
                                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                      <div class="btn-icon-close">
                                          {{-- <span class="govco-icon govco-icon-shortu-arrow-n size-1x"></span> --}}
                                          <span class="govco-icon govco-icon-shortd-arrow-n size-1x"></span>
                                      </div>
                                  </div>
                              </button>
                          </div>
                            <div id="collapse1" class="collapse mb-3" aria-labelledby="headingUno"
                                data-parent="#EjemploAccordion-2">
                                <div class="card-body bg-color-selago">
                                    <div class="container">
                                        <p class="form-inline my-0"><span class="govco-icon govco-icon-email"></span> <a
                                                style="color: #3366CC; font-size: 13px!important;" href="mailto:cjguerrero@bucaramanga.gov.co"
                                                target="_blank" tabindex="7"> cjguerrero@bucaramanga.gov.co</a></p>
                                        <p class="form-inline my-0"><span class="govco-icon govco-icon-call-center"></span><a
                                                style="color: #3366CC; font-size: 13px!important;" href="tel:0376337000"> (+57)7 633 70 00</a></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion accordion-govco" id="acc4">
                        <div class="card">
                           <div class="card-header row no-gutters" id="c4">
                              <button class="btn-link row no-gutters collapsed" type="button" data-toggle="collapse"
                                  data-target="#coll4" aria-expanded="false" aria-controls="coll4" id="btn_colapse">
                                  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" tabindex="8">
                                      <h4 class="headline-s-govco">¿Como fue tu experiencia durante el proceso?</h4>
                                  </div>
                                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                      <div class="btn-icon-close">
                                          {{-- <span class="govco-icon govco-icon-shortu-arrow-n size-1x"></span> --}}
                                          <span class="govco-icon govco-icon-shortd-arrow-n size-1x"></span>
                                      </div>
                                  </div>
                              </button>
                          </div>
                            <div id="coll4" class="collapse" aria-labelledby="c4" data-parent="#acc4">
                                <div class="card-body bg-color-selago">
                                    <div class="row justify-content-center spacer no-gutters">
                                        <div class="col-3 pl-3 pt-2">
                                            <button type="button" id="btn-facil-global" class="btn-symbolic-govco align-column-govco btn-facil-global" value="FACIL" tabindex="8">
                                                <span class="govco-icon govco-icon-check-cn size-3x"></span>
                                                <span class="btn-govco-text">Facil</span>
                                            </button>
                                        </div>

                                        <div class="col-3 pl-3 pt-2">
                                            <button type="button" id="btn-dificil-global" class="btn-symbolic-govco align-column-govco btn-dificil-global"  value="DIFICIL" tabindex="8">
                                                <span class="govco-icon govco-icon-x-cn size-3x"></span>
                                                <span class="btn-govco-text">Dificil</span>
                                            </button>
                                        </div>
                                    </div>
                                    {{-- modulo tramites --}}
                                    <input id="modulo" type="hidden" class="form-control modulo" value="RITA">


                                    <div class="container text-center">
                                        <button type="button" class="btn btn-round btn-middle btn-block"
                                            id="btn-sugerencias" data-toggle="tooltip" data-placement="right"
                                            title="Después de escribir tus sugerencias oprime FACIL o DIFICIL para enviarlas"
                                            style="" tabindex="8">Escribe
                                            tus sugerencias</button><br>
                                        <div id="Texto_sugerencias" style="display: none;">
                                            <p style="color:#3366CC;"> Gracias por compartir tu experiencia</p>
                                        </div>

                                        <div id="text-button" style="padding-bottom: 10px; display: none;">
                                            <label class="text-left small">Escribe tus comentarios</label>
                                            <textarea class="form-control pb-2" rows="5"
                                                placeholder="Queremos conocer tu experiencia, sugerencias y consejos"
                                                id="text-area" maxlength="300" onkeypress="return Direccion(event)"
                                                onkeyup="aMayusculas(this.value,this.id)"></textarea>
                                               
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                  <div class="row justify-content-center">
                    <a href="{{route('rita.index')}}"><button style="font-size:15px;" type="button" class="btn btn-round btn-middle" id="btn-back" tabindex="8">Volver al inicio</button></a>
                  </div>


                    
                    {{-- tercer acordion --}}

                    <div class="accordion accordion-govco pt-0 d-none" id="acc3">
                        <div class="card">
                           <div class="card-header row no-gutters" id="c3">
                              <button class="btn-link row no-gutters collapsed" type="button" data-toggle="collapse" data-target="#coll3" aria-expanded="false" aria-controls="coll3">
                                 <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">                                    
                                    <h4 class="headline-s-govco">Consulto mi Solicitud</h4>
                                 </div>
                                 <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <div class="btn-icon-close">
                                       <span class="govco-icon govco-icon-minus"></span>
                                       <span class="govco-icon govco-icon-simpled-arrow"></span>
                                    </div>
                                 </div>
                              </button>
                           </div>
                           <div id="coll3" class="collapse" aria-labelledby="c3" data-parent="#acc3">
                              <div class="card-body bg-color-selago">
                                 <div class="container text-center">
                                    <button data-toggle="modal" data-target="#ModalConsulta" type="button" class="btn btn-round btn-middle">CONSULTE AQUÍ
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                    
                </div>
            </div>
        </div>              

        

    </div>
   {{-- fin contenedor pricincipal --}}

     {{-- MODAL DIRECCIONES --}}

     <div id="ModalDirecciones" class="modal fade center" role="dialog">
        <div class="modal-dialog modal-lg" style="max-width: 1000px!important;">
  
           <!-- Modal content-->
           <div class="modal-content">
              <div class="modal-header" style="background:#E5EEFB;">
  
                 <h4 class="modal-title">Ingresa tu Dirección</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>              
  
                 <div class="modal-body">
                    <div class="row form-row">
  
                       <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD01" style="font-family: 'Barlow', sans-serif;"> Calle - Carrera *</label>
                             <select name="DD01" id="DD01" type="text" class="form-control input-md modal1" required="required" title="Selecciona el tipo de indicación inicial para la dirección que desea ingresar" tabindex="12">
                                <option value=""></option>
                                @foreach ($Parametros2 as $parametro2)
                                <option value="{{$parametro2->ParDes}}">{{$parametro2->ParDes}}</option>
                                @endforeach

                               
                             </select>
                          </div>
                       </div>
  
                       <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD02" style="font-family: 'Barlow', sans-serif;">N° - Nombre * </label>
                             <input id="DD02" name="DD02" type="text" class="form-control modal1" maxlength="20" required="required" title="En este campo se deberá digitar número o nombre según corresponda a la selección en el campo anterior, te recomendamos observar el campo de visualización que se encuentra al final de este módulo para organizar tu dirección correctamente." onkeypress="return NumDoc(event)" onchange="aMayusculas(this.value,this.id)" style="height: 29px!important;" tabindex="12" placeholder="EJ: 10">
                          </div>
                       </div>
  
                       <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD03" style="font-family: 'Barlow', sans-serif;">Letra </label>
                             <select id="DD03" name="DD03" type="text" class="form-control input-md modal1" title="Selecciona una letra si tu indicación de dirección en el campo anterior contiene esta opción, si no la posee déjala en blanco" tabindex="12">
                                <option value=""></option>
                                @foreach ($Parametros1 as $parametro1)
                                <option value="{{$parametro1->ParNom}}">{{$parametro1->ParNom}}</option>
                                @endforeach
                                
                             </select>
                          </div>
                       </div>
  
                       <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD04" style="font-family: 'Barlow', sans-serif;">Numero* </label>
                             <input id="DD04" name="DD04" type="text" class="form-control modal1" maxlength="4" title="Digita en este campo el primer número de tu dirección" onkeypress="return Numeros(event)" required="required" style="height: 29px!important;" placeholder="EJ: 30" tabindex="12">
                          </div>
                       </div>
  
                       <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD05" style="font-family: 'Barlow', sans-serif;">Letra </label>
                             <select id="DD05" name="DD05" type="text" class="form-control input-md modal1" title="Selecciona una letra si tu indicación de dirección en el campo anterior contiene esta opción, si no la posee déjala en blanco" tabindex="12">
                                <option value=""></option>
                                @foreach ($Parametros1 as $parametro1)
                                <option value="{{$parametro1->ParNom}}">{{$parametro1->ParNom}}</option>
                                @endforeach
                             </select>
                          </div>
                       </div>
  
                       <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD06" style="font-family: 'Barlow', sans-serif;">Numero* </label>
                             <input id="DD06" name="DD06" type="text" class="form-control modal1" maxlength="4" title="Digita en este campo el primer número de tu dirección" onkeypress="return Numeros(event)" style="height: 29px!important;" placeholder="Ej:22" tabindex="12">
                          </div>
                       </div>
  
                       <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD07" style="font-family: 'Barlow', sans-serif;">Letra </label>
                             <select id="DD07" name="DD07" type="text" class="form-control input-md modal1" title="Selecciona una letra si tu indicación de dirección en el campo anterior contiene esta opción, si no la posee déjala en blanco" tabindex="12">
                                <option value=""></option>
                                @foreach ($Parametros1 as $parametro1)
                                <option value="{{$parametro1->ParNom}}">{{$parametro1->ParNom}}</option>
                                @endforeach
                                
                             </select>
                          </div>
                       </div>
  
                       <div class="col-lg-6 col-md-2 col-sm-12 col-xs-12 caja_ultima"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD08" style="font-family: 'Barlow', sans-serif;">Complemento </label>
                             <input id="DD08" name="DD08" type="text" class="form-control  modal1" maxlength="80" title="Digita en este el complemento de tu direccion" onkeyup="aMayusculas(this.value,this.id)" placeholder="Ej: CASA ESQUINERA" tabindex="12">
                          </div>
                       </div>
  
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br><br>
                          <div class="form-group">
                             <input style="background-color: #004884; color: #FFFFFF; font-weight: bold; border-radius:8px;" name="Direccion" id="DD000" type="text" class="form-control input-md DD00" data-toggle="tooltip" title="Previsualizador de la dirección introducida" data-delay='{"show":"30", "hide":"30"}' placeholder="Pre visualizador de direcciones" required="required" readonly>
                          </div>
                       </div>
  
                      
                    </div>
                 </div>
  
                 <div class="modal-footer">
                    
                    <button style="font-size:15px;" type="button" class="btn btn-round btn-middle btn-outline-info" id="btnDireccion" value="Boton" tabindex="12">Ingresar Dirección</button>
                    <button style="font-size:15px;" type="button" class="btn btn-round btn-middle btn-outline-info" data-dismiss="modal" tabindex="12">Cerrar</button>
                 </div>
              </form>
           </div>
        </div>
     </div>

     <div id="ModalDireccionesEmpresas" class="modal fade center" role="dialog">
        <div class="modal-dialog modal-lg" style="max-width: 1000px!important;">
  
           <!-- Modal content-->
           <div class="modal-content">
              <div class="modal-header" style="background:#E5EEFB;">
  
                 <h4 class="modal-title">Ingresa tu Dirección</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>              
  
                 <div class="modal-body">
                    <div class="row form-row">
  
                       <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD01" style="font-family: 'Barlow', sans-serif;"> Calle - Carrera *</label>
                             <select name="DD01" id="DD010" type="text" class="form-control input-md modal2" required="required" title="Selecciona el tipo de indicación inicial para la dirección que desea ingresar" tabindex="18">
                                <option value=""></option>
                                @foreach ($Parametros2 as $parametro2)
                                <option value="{{$parametro2->ParDes}}">{{$parametro2->ParDes}}</option>
                                @endforeach

                               
                             </select>
                          </div>
                       </div>
  
                       <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD02" style="font-family: 'Barlow', sans-serif;">N° - Nombre * </label>
                             <input id="DD020" name="DD02" type="text" class="form-control modal2" maxlength="20" required="required" title="En este campo se deberá digitar número o nombre según corresponda a la selección en el campo anterior, te recomendamos observar el campo de visualización que se encuentra al final de este módulo para organizar tu dirección correctamente." onkeypress="return NumDoc(event)" onchange="aMayusculas(this.value,this.id)" style="height: 29px!important;" tabindex="18" placeholder="Ej: 27">
                          </div>
                       </div>
  
                       <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD03" style="font-family: 'Barlow', sans-serif;">Letra </label>
                             <select id="DD030" name="DD03" type="text" class="form-control input-md modal2" title="Selecciona una letra si tu indicación de dirección en el campo anterior contiene esta opción, si no la posee déjala en blanco" tabindex="18">
                                <option value=""></option>
                                @foreach ($Parametros1 as $parametro1)
                                <option value="{{$parametro1->ParNom}}">{{$parametro1->ParNom}}</option>
                                @endforeach
                                
                             </select>
                          </div>
                       </div>
  
                       <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD04" style="font-family: 'Barlow', sans-serif;">Numero* </label>
                             <input id="DD040" name="DD04" type="text" class="form-control modal2" maxlength="4" title="Digita en este campo el primer número de tu dirección" onkeypress="return Numeros(event)" required="required" style="height: 29px!important;" tabindex="18" placeholder="EJ:55">
                          </div>
                       </div>
  
                       <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD05" style="font-family: 'Barlow', sans-serif;">Letra </label>
                             <select id="DD050" name="DD050" type="text" class="form-control input-md modal2" title="Selecciona una letra si tu indicación de dirección en el campo anterior contiene esta opción, si no la posee déjala en blanco" tabindex="18">
                                <option value=""></option>
                                @foreach ($Parametros1 as $parametro1)
                                <option value="{{$parametro1->ParNom}}">{{$parametro1->ParNom}}</option>
                                @endforeach
                             </select>
                          </div>
                       </div>
  
                       <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD06" style="font-family: 'Barlow', sans-serif;">Numero* </label>
                             <input id="DD060" name="DD06" type="text" class="form-control modal2" maxlength="4" title="Digita en este campo el primer número de tu dirección" onkeypress="return Numeros(event)" style="height: 29px!important;" tabindex="18" placeholder="EJ:35">
                          </div>
                       </div>
  
                       <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD07" style="font-family: 'Barlow', sans-serif;">Letra </label>
                             <select id="DD070" name="DD070" type="text" class="form-control input-md modal2" title="Selecciona una letra si tu indicación de dirección en el campo anterior contiene esta opción, si no la posee déjala en blanco" tabindex="18">
                                <option value=""></option>
                                @foreach ($Parametros1 as $parametro1)
                                <option value="{{$parametro1->ParNom}}">{{$parametro1->ParNom}}</option>
                                @endforeach
                                
                             </select>
                          </div>
                       </div>
  
                       <div class="col-lg-6 col-md-2 col-sm-12 col-xs-12 caja_ultima"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD08" style="font-family: 'Barlow', sans-serif;">Complemento </label>
                             <input id="DD080" name="DD08" type="text" class="form-control modal2" maxlength="80" title="Digita en este el complemento de tu direccion" onkeyup="aMayusculas(this.value,this.id)" tabindex="18" placeholder="EJ: Conjunto Residencial">
                          </div>
                       </div>
  
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br><br>
                          <div class="form-group">
                             <input style="background-color: #004884; color: #FFFFFF; font-weight: bold; border-radius:8px;" name="Direccion" id="DD0000" type="text" class="form-control input-md DD00" data-toggle="tooltip" title="Previsualizador de la dirección introducida" data-delay='{"show":"30", "hide":"30"}' placeholder="Pre visualizador de direcciones" required="required" readonly>
                          </div>
                       </div>
  
                      
                    </div>
                 </div>
  
                 <div class="modal-footer">
                    
                    <button style="font-size:15px;" type="button" class="btn btn-round btn-middle btn-outline-info" id="btnDireccionEmpresas" value="Boton" tabindex="18">Ingresar Dirección</button>
                    <button style="font-size:15px;" type="button" class="btn btn-round btn-middle btn-outline-info" data-dismiss="modal" tabindex="18">Cerrar</button>
                 </div>
              </form>
           </div>
        </div>
     </div>

     {{-- MODAL CONSULTAR SOLICITUD --}}
     

      {{-- modal de carga --}}
    <div class="modal fade" id="loadMe2" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
      <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
              <div class="modal-body text-center">
                  <div class="loader"></div>
                  <div clas="loader-txt">
                      <p>Enviando solicitud <br><br><small>Por favor espere...
                              </small></p>
                  </div>
              </div>
          </div>
      </div>
  </div>


@endsection