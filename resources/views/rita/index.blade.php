@extends('layouts.app')

@section('title', 'RITA')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">


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
                                    Canal de denuncia RITA
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
                                <div data-id="step2" class="step-slider-item active-init">
                                    <p style="padding-top: 0px;margin-top:5px;color: #3366CC;" id="barra_progreso"><span
                                            class="circle_uno">1</span> Inicio</p>
                                </div>
                                <div data-id="step3" class="step-slider-item">
                                    <p style="padding-top: 0px;margin-top:5px;" id="barra_progreso"><span
                                            class="circle_dos">2 </span> Hago mi solicitud</p>
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
                     
                  <div id="section-index">
                     <div class="card govco-card border-0 shadow-none" style="border-radius: 0px;">
                        <h1 class="headline-xl-govco">Canal de denuncia RITA</h1>

                        <div class="alert-primary-govco alert alert-dismissible fade show mt-3"
                        aria-label="Alerta informativa">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"
                            title="Cerrar">&times;</button>
                        <div class="alert-heading">
                            <span class="govco-icon govco-icon-bell-sound-p size-2x"></span>
                            <span class="headline-l-govco">Importante</span>
                        </div>
                        <p style="text-align: justify"> Caracteristicas RITA...</p>
                     </div>
                     
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="card gov-co-tramite-card">
                          <a href="{{route('rita.registro')}}" tabindex="9"> <div class="card-header text-center">Formulario de denuncia <svg width="24" height="24" viewBox="0 0 24 24"><path fill="#004884" d="M16 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V8l-5-5zM7 7h5v2H7V7zm10 10H7v-2h10v2zm0-4H7v-2h10v2zm-2-4V5l4 4h-4z"/></svg> </div></a>
                           <div class="card-body">
                              <p class="card-text">Inicie la gestion de radicar su denuncia.</p>
                           </div>
                        </div>
                     </div>
                   
                     <div class="col-md-6">
                        <div class="card gov-co-tramite-card">
                           <a href="" data-toggle="modal" data-target="#ModalConsulta" type="button" tabindex="10"><div class="card-header text-center">Seguimiento a la denuncia <svg width="24" height="24" viewBox="0 0 24 24"><path fill="#004884" d="M10.18 17H7v-2h3c.08-.68.23-1.36.5-2H7v-2h4.82c.03-.03.05-.06.08-.1A6.53 6.53 0 0 1 16.5 9H7V7h10v2h-.5c1.62 0 3.24.61 4.5 1.82V5a2 2 0 0 0-2-2h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14a2 2 0 0 0 2 2h8.06c-.41-.26-.8-.55-1.16-.9c-.9-.89-1.45-1.97-1.72-3.1M12 3c.55 0 1 .45 1 1s-.45 1-1 1s-1-.45-1-1s.45-1 1-1m8.31 14.9c.44-.69.69-1.52.69-2.4c0-2.5-2-4.5-4.5-4.5S12 13 12 15.5s2 4.5 4.5 4.5c.87 0 1.69-.25 2.38-.68L22 22.39L23.39 21l-3.08-3.1m-3.81.1a2.5 2.5 0 0 1 0-5a2.5 2.5 0 0 1 0 5Z"/></svg></div> </a>
                           <div class="card-body">
                              <p class="card-text">Consulte el estado de su denuncia.</p>
                           </div>
                        </div>
                     </div>
                  </div>
                </div>
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
   

     {{-- MODAL CONSULTAR SOLICITUD --}}
     
     <div id="ModalConsulta" class="modal fade center" role="dialog">
        <div class="modal-dialog modal-lg" style="max-width: 1000px!important;">
           <!-- Modal content-->
           <div class="modal-content">
              <div class="modal-header" style="background:#E5EEFB;">
                 <h4 class="modal-title">Consultar Solicitud</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <form method="post" role="form" action="{{route('rita.consulta')}}" id="formConsulta">
                @csrf
                 <div class="modal-body">
                    <div class="row form-row">
                       <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD01" style="font-family: 'Barlow', sans-serif;">Buscar Por </label>
                             <select id="VD01" name="tipo_parametro" class="form-control input-md select_general" title="Seleccione la opción para validar el documento" required="required" tabindex="11">
                                <option value="">Seleccione</option>
                                <option value="radicado" selected>Numero de radicado</option>                                
                                {{-- <option value="identificacion_solicitante">Documento de identificación Solicitante</option> --}}
  
                               </select>
                            </div>
                       </div>  
                       <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><br>
                          <div class="form-group">
                             <label style="color:#111111;" class="input" for="DD01" style="font-family: 'Barlow', sans-serif;">Digite Numero </label>
                            <input type="text" name="parametro" id="VD00" class="form-control input-md" title="Digite un numero valido" required="required" onkeypress="return Numeros(event)" maxlength="40" minlength="5" tabindex="12">
      
                          </div>
                       </div>
                    </div>
                 </div>
  
                 <div class="modal-footer">
                   
                    <button type="submit" class="btn btn-round btn-middle btn-outline-info"  id="Boton" tabindex="13">Realizar Búsqueda</button>
                    <button type="button" class="btn btn-round btn-middle btn-outline-info" data-dismiss="modal" tabindex="14">Cerrar</button>
                 </div>
              </form>
           </div>
        </div>
     </div>


@endsection