// FUNCIONES DE CAJA DE TEXTO.
/** Esta funcion me permite controlar los caracteres que se van a diguitar en el campo numero de documento **/
function NumDoc(e){

  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  letras = "0123456789-";
  especiales = [8,37,14,15,32,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,
    84,85,86,87,88,89,90,97,98,99,100,101,102,103,104,105,106,107,108,109,
    110,111,112,113,114,115,116,117,118,119,120,121,122,130,160,161,162,163,164,165,239];
  tecla_especial = false
      for(var i in especiales){
          if(key == especiales[i]){
            tecla_especial = true;
          break;
            } 
        }
                       
      if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}


/** Esta funcion me permite controlar los caracteres que se van a diguitar en el campo Nombres y Apellidos **/
function Letras(n){

  key = n.keyCode || n.which;
  tecla = String.fromCharCode(key).toLowerCase();
  numeros = "ñÑ ";
  especiales = [14,15,32,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,
  84,85,86,87,88,89,90,97,98,99,100,101,102,103,104,105,106,107,108,109,
  110,111,112,113,114,115,116,117,118,119,120,121,122,130,160,161,162,163,164,165,239];
  tecla_especial = false
      for(var i in especiales){
          if(key == especiales[i]){
            tecla_especial = true;
          break;
            } 
        }
                       
      if(numeros.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}

/** Esta funcion me permite controlar los caracteres que se van a diguitar en el campo Nombres y Apellidos **/
function Observaciones(n){

  key = n.keyCode || n.which;
  tecla = String.fromCharCode(key).toLowerCase();
  numeros = "ñÑ1234567890 -.,: ";
  especiales = [14,15,32,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,
  84,85,86,87,88,89,90,97,98,99,100,101,102,103,104,105,106,107,108,109,
  110,111,112,113,114,115,116,117,118,119,120,121,122,130,160,161,162,163,164,165,239];
  tecla_especial = false
      for(var i in especiales){
          if(key == especiales[i]){
            tecla_especial = true;
          break;
            } 
        }
                       
      if(numeros.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}


/**Esta funcion me permite convertir los textos digitados a mayusculas **/
function aMayusculas(obj,id){

    obj = obj.toUpperCase();
    document.getElementById(id).value = obj;
}

/** Esta funcion me devuelve solo los numeros se usa para las cajas varchar con opcion numerica o campos time y date**/
function Numeros(e){

    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = [8];
    tecla_especial = false
        for(var i in especiales){
            if(key == especiales[i]){
              tecla_especial = true;
            break;
              } 
          }
                         
        if(letras.indexOf(tecla)==-1 && !tecla_especial)
          return false;
}

function IP(e){

    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789.";
    especiales = [8,37];
    tecla_especial = false
        for(var i in especiales){
            if(key == especiales[i]){
              tecla_especial = true;
            break;
              } 
          }
                         
        if(letras.indexOf(tecla)==-1 && !tecla_especial)
          return false;
}


/** Funcion email la cual me permite la digitacion de los carateres necesarios para el registro de un correo electronico **/
function Email(em){

    key = em.keyCode || em.which;
    tecla = String.fromCharCode(key).toLowerCase();
    numeros = "@-_&.0123456789";
    especiales = [9,32,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,
    84,85,86,87,88,89,90,97,98,99,100,101,102,103,104,105,106,107,108,109,
    110,111,112,113,114,115,116,117,118,119,120,121,122];
    tecla_especial = false
        for(var i in especiales){
            if(key == especiales[i]){
              tecla_especial = true;
            break;
              } 
          }
                         
        if(numeros.indexOf(tecla)==-1 && !tecla_especial)
          return false;
}

// funcion para limitar campos de direcciones
function Direccion(n){

  key = n.keyCode || n.which;
  tecla = String.fromCharCode(key).toLowerCase();
  numeros = "0123456789-#ñÑ.:, ";
  especiales = [14,15,32,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,
  84,85,86,87,88,89,90,97,98,99,100,101,102,103,104,105,106,107,108,109,
  110,111,112,113,114,115,116,117,118,119,120,121,122,130,160,161,162,163,164,165,239];
  tecla_especial = false
      for(var i in especiales){
          if(key == especiales[i]){
            tecla_especial = true;
          break;
            } 
        }
                       
      if(numeros.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}

// funcion campo date: maximo

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //
    var yyyy = today.getFullYear();
     if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    // today = yyyy+'-'+mm+'-'+dd;
    (document.getElementById('fecha_aprox_proceso'))?
    document.getElementById("fecha_aprox_proceso").setAttribute("max", today)
    : ''



    // funciones espectaculos

    function agregarFila() {

      // Swal.fire('Any fool can use a computer')
      let tipo_boleteria = document.getElementById('tipo_boleteria').value;
      let valor_boleteria = document.getElementById('valor_boleteria').value;
      let cantidad_boleteria = document.getElementById('cantidad_boleteria').value;
      let table = document.getElementById("tablaBoleteria"); 
      var tbodyRowCount = table.tBodies[0].rows.length;
      var id_table = 1 +tbodyRowCount;
      
      
    
      
      
      let valor_boletas = new Intl.NumberFormat("es-CO").format(valor_boleteria);
    
      if (tipo_boleteria.length == 0) {    
       Swal.fire('Debes completar el campo tipo de boleteria')
         return;
      }
    
      if (valor_boleteria.length == 0) {
        Swal.fire('Debes completar el campo valor de boleteria')
        return;
      }
    
      if (cantidad_boleteria.length == 0) {
        Swal.fire('Debes completar el campo Numero de boleteria')
        return;
      }
    
      if(valor_boleteria.startsWith("0")){
        valor_boleteria = "0";
     }
     if(cantidad_boleteria.startsWith("0")){
      cantidad_boleteria = "0";
    }
    
      
    
      document.getElementById("tablaBoleteria").getElementsByTagName('tbody')[0].insertRow(-1).innerHTML =
         `<tr id="boleta_${id_table}">
            <td data-tb="${tipo_boleteria}" id="boleta_${id_table}">
               ${tipo_boleteria}
            </td>
            <td data-vb="${valor_boleteria}">
               $${valor_boletas}
            </td>   
            <td data-cantidad="${cantidad_boleteria}">
            ${cantidad_boleteria}
            </td>        
            <td>
               <div class="row">
                  <div class="col">
                  <div class="btn-group" role="group" aria-label="Basic example">
                  <a onClick="editarFila('${tipo_boleteria}',${valor_boleteria},${cantidad_boleteria},${id_table})" class="btn btn-success btn-xs btn-sm col text-white">
                        Editar
                     </a>
                     <a onClick="eliminarFila(this)" class="btn btn-danger btn-xs btn-sm col text-white">
                        Eliminar
                     </a>
                     </div>
                  </div>
               </div>
            </td>
         </tr>`;
      $("#tipo_boleteria").val('');
      $("#valor_boleteria").val('');
      $("#cantidad_boleteria").val('');
    
      // let total_oculto = Number(total) + Number(subtotal);
      // let suma_total = new Intl.NumberFormat("es-CO").format(total_oculto);
      // $('#total').val(suma_total);
      // $('#total_oculto').val(total_oculto);
      $('#ModalBoleteria').modal('hide');
     
    }
    
    function eliminarFila(fila) {  
    
      Swal.fire({
        title: 'ESTAS SEGURO DE ELIMINAR ESTE REGISTRO?',
        text: "Este cambio es irreversible",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3772FF',
        cancelButtonColor: '#A80521',
        confirmButtonText: 'Si, eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
          fila.closest("tr").remove();
          return;  
         
        }
      })
      
      
    
    }
    
    function editarFila(tipo,valor,cantidad,id_fila) {  
      
      $('#ModalBoleteria').modal('show');
      $('#btnBoleteria').addClass('d-none');
      $('#btnEditBoleteria').removeClass('d-none');  
      $('#tipo_boleteria').val(tipo);
      $('#valor_boleteria').val(valor);
      $('#cantidad_boleteria').val(cantidad);
      $('#parametro').val(id_fila);
    
    }
    function updateFila(){
    
     
      let parametro = document.getElementById('parametro').value;
      $('#boleta_'+parametro).parent().remove();
      agregarFila();
    
       
    
    }
    
    function borrarCampos(){
      $("#tipo_boleteria").val('');
      $("#valor_boleteria").val('');
      $("#cantidad_boleteria").val('');
      return;
    
      
    }
    function openModal(){
      $("#tipo_boleteria").val('');
      $("#valor_boleteria").val('');
      $("#cantidad_boleteria").val('');
      $('#ModalBoleteria').modal('show');
      $('#btnBoleteria').removeClass('d-none');
      $('#btnEditBoleteria').addClass('d-none');
    
    }

    function getData(form) {
      var formData = new FormData(form);
    
      for (var pair of formData.entries()) {
      //   console.log(pair[0] + ": " + pair[1]);
      }
    
      let data =Object.fromEntries(formData);
      return data;
    }

    Array.prototype.forEach.call(document.getElementsByClassName('g-recaptcha'), function(element) {
      //Add a load event listener to each wrapper, using capture.
      element.addEventListener('load', function(e) {
          //Get the data-tabindex attribute value from the wrapper.
          var tabindex = e.currentTarget.getAttribute('data-tabindex');
          //Check if the attribute is set.
          if (tabindex) {
              //Set the tabIndex on the iframe.
              e.target.tabIndex = tabindex;
          }
      }, true);
  });

    
    var button = document.getElementById('button-modal');
    button.addEventListener("keypress", function(event) {
     if (event.key === "Enter") {
       event.preventDefault();
       button.click();
     }
   });
   

  //  var button2 = document.getElementById('button-modal-2');
  //  button2.addEventListener("keypress", function(event) {
  //    if (event.key === "Enter") {
  //      event.preventDefault();
  //      button2.click();
  //    }
  //  });

   ///SOLICITUD ANONIMA
   let checkbox = document.getElementById("tipo_solicitud");

     checkbox.addEventListener('change', function() {
     const $elementsInputs = document.querySelectorAll('.info_general'),
      $elementsDivs = document.querySelectorAll('.div-info');
  if (this.checked) {
      $elementsInputs.forEach((el)=>{
     el.required = false;
     el.value = '';
     el.classList.remove('is-valid');
     el.classList.remove('is-invalid');
    })
    document.getElementById('razon_social').required = false;
    document.querySelector('.div-razon').classList.add('d-none');
    $elementsDivs.forEach((elm)=>{
      elm.classList.add('d-none');
    })
    $("#tipo_persona").val('').trigger('change');
    $("#tipo_doc").val('').trigger('change');
    $('.div-nombres').addClass('d-none');
   
   
    
  } else {
    $elementsInputs.forEach((el)=>{
      el.required = true;
      el.value = '';
    })
    $elementsDivs.forEach((elm)=>{
      elm.classList.remove('d-none');
    }) 
    $("#tipo_persona").val('').trigger('change');
    $("#tipo_doc").val('').trigger('change');   
    
  }
  
  
});

let tipoPersona = document.getElementById('tipo_persona');
const $divTipo = document.querySelectorAll('.div-nombres'),
$divRaz = document.querySelector('.div-razon');

$('#tipo_persona').change(function() {
  if($(this).val()==='NATURAL'){
    $divTipo.forEach((elm)=>{
      elm.classList.remove('d-none');
    })
    $divRaz.classList.add('d-none')
    $("#tipo_doc").val('').trigger('change'); 
    document.getElementById('tipo_doc').value='';
    document.getElementById('nombres').required = true;
    document.getElementById('apellidos').required = true;
    document.getElementById('razon_social').required = false
  }else if($(this).val()=='JURIDICO'){
    $divTipo.forEach((elm)=>{
      elm.classList.add('d-none');
    })
    $divRaz.classList.remove('d-none');
    $("#tipo_doc").val('NIT').trigger('change');    
    document.getElementById('nombres').required = false;
    document.getElementById('apellidos').required = false;
    document.getElementById('razon_social').required = true;
  }
})

$('#pais').change(function() {

if($(this).val() !== 'COLOMBIA'){
  document.getElementById('departamento').required = false;
  document.getElementById('municipio').required = false;
  document.getElementById('departamento').disabled = true;
  document.getElementById('municipio').disabled = true;
  document.querySelector('.label-dep').textContent = 'Departamento';
  document.querySelector('.label-mun').textContent = 'Municipio';
  $("#departamento").val('').trigger('change');   
  $("#municipio").val('').trigger('change');   
}else{
  document.getElementById('departamento').required = true;
  document.getElementById('municipio').required = true;
  document.getElementById('departamento').disabled = false;
  document.getElementById('municipio').disabled = false;
  document.querySelector('.label-dep').textContent = 'Departamento*';
  document.querySelector('.label-mun').textContent = 'Municipio*';

}


});

$('#departamento').change(function(){
  
 let departamento = document.getElementById("departamento").value;
 let municipio = $('#municipio');

 $.ajaxSetup({
     headers: {
         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
     },
 });

 $.ajax({
     type: "POST",
     url: "/rita/municipios",
     dataType: "json",
     data: {
         departamento: departamento,            
     },
     success: function (response) {
        
         if (response.success) {
                           $('#municipio').find('option').remove();
                           municipio.append('<option value="">Seleccione..</option>')
                          for (let municipios of response.data){
                              municipio.append(`<option value="${municipios.municipio}">${municipios.municipio}</option>`);
                          }                         
                        
                                                
         }
     },
     error: function () {
         alert("error de petición ajax");
     },
 });

});
(()=>{
document.addEventListener('keyup',(e)=>{
 if(e.target.localName==='textarea'){
  let characterCount = e.target.value.length;
  let $divCount = e.target.nextElementSibling;  
  let $spanCurrent = e.target.nextElementSibling.children[0];
  let $spanMaximum = e.target.nextElementSibling.children[1];  
  $spanCurrent.textContent = characterCount;
  
  if(characterCount> 200){
    $spanCurrent.style.setProperty("color","#8f0001");
    $spanMaximum.style.setProperty("color","#8f0001");
  }
 }
})
})();

let $fileHechos = document.getElementById('arc_descripcion');
$fileHechos.addEventListener('change',(e)=>{
 let size = e.target.files[0].size / 1024 / 1024
 if(size > 10){
  Swal.fire({
    icon: 'error',
    iconColor: 'white',
    position: 'top-right',
    title: 'Oops...',
    text: 'Excede el tamaño maximo permitido de 10MB',
    toast:true,
    timer: 3500,
    customClass: {
      popup: 'colored-toast'
    },
    showConfirmButton: false,
    timerProgressBar: true
   
  });
  e.target.value = '';
  e.target.classList.add('is-invalid');
  setTimeout(()=>{
   e.target.classList.remove('is-invalid');
  },5000)

 }



})

let $checkBoxContrato = document.querySelectorAll('input[name="proceso_seleccion"]');
let $divContratos = document.querySelectorAll('.div-contratos'),
    $inputsContratos = document.querySelectorAll('.info_contrato');
$checkBoxContrato.forEach((element) => {

  element.addEventListener('change',(e)=>{
    let item = e.target.value;
      if(item ==='SI'){
        $divContratos.forEach((el)=>{
          el.classList.remove('d-none');
        })
        $inputsContratos.forEach((elm)=>{
        elm.required = true;

        })

          var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1; //
      var yyyy = today.getFullYear();
     if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

       today = yyyy+'-'+mm+'-'+dd;
       document.getElementById("fecha_aprox_proceso").setAttribute("max", today);
        
      }else{
        $divContratos.forEach((el)=>{
          el.classList.add('d-none');
        })
        $inputsContratos.forEach((elm)=>{
        elm.required = false;
        elm.value = '';
        let name = elm.name
        elm.classList.remove('is-valid');
        elm.classList.remove('is-invalid');
        (document.body.contains(document.getElementById(`${name}-error`))) ? document.getElementById(`${name}-error`).remove(): '';

        })
        $('#your_select_input').val('').trigger('change');
        document.getElementById('arc_informacion').value= '';
        document.getElementById('link_contrato').value= '';
        document.getElementById('link_contrato').classList.remove('is-valid');
        document.getElementById('arc_informacion').classList.remove('is-valid');
        document.getElementById('link_contrato').classList.remove('is-invalid');
        document.getElementById('arc_informacion').classList.remove('is-invalid');
      }    
})


});

let $fileInformacion = document.getElementById('arc_informacion');
$fileInformacion.addEventListener('change',(e)=>{
 let size = e.target.files[0].size / 1024 / 1024
 if(size > 10){
  Swal.fire({
    icon: 'error',
    iconColor: 'white',
    position: 'top-right',
    title: 'Oops...',
    text: 'Excede el tamaño maximo permitido de 10MB',
    toast:true,
    timer: 3500,
    customClass: {
      popup: 'colored-toast'
    },
    showConfirmButton: false,
    timerProgressBar: true
   
  });
  e.target.value = '';
  e.target.classList.add('is-invalid');
  setTimeout(()=>{
   e.target.classList.remove('is-invalid');
  },5000)
 }
})

let $checkboxEvidencia = document.querySelectorAll('input[name="tiene_evidencias"]');
let $divEvidencia = document.querySelectorAll('.div-evidencias'),
    $inputsEvidencia = document.querySelectorAll('.info_evidencias');
$checkboxEvidencia.forEach((element) => {

  element.addEventListener('change',(e)=>{
    let item = e.target.value;
      if(item ==='SI'){
        $divEvidencia.forEach((el)=>{
          el.classList.remove('d-none');
        })
        $inputsEvidencia.forEach((elm)=>{
        elm.required = true;

        })
        
      }else{
        $divEvidencia.forEach((el)=>{
          el.classList.add('d-none');
        })
        $inputsEvidencia.forEach((elm)=>{
        elm.required = false;
        let name = elm.id;
        (document.body.contains(document.getElementById(`${name}-error`))) ? document.getElementById(`${name}-error`).remove() : ''


        })
       let nodeSpan =  document.getElementById('files-names').querySelectorAll('.file-block');
       nodeSpan.forEach((span)=>{
       span.remove();
       })
        document.getElementById('attachment').value = '';
        let sizeFile = 0;
       
      }    
})
})


const dt = new DataTransfer(); // Le permite manipular los archivos del archivo de entrada
let sizeFile = 0; 
$("#attachment").on('change', function(e){
 console.log('inicia:'+ sizeFile)
  
  let size = Math.round(this.files[0].size / 1024 / 1024 *100)/100;
 if(size > 10){
  Swal.fire({
    icon: 'error',
    iconColor: 'white',
    position: 'top-right',
    title: 'Oops...',
    text: 'Excede el tamaño maximo permitido de 10MB',
    toast:true,
    timer: 3500,
    customClass: {
      popup: 'colored-toast'
    },
    showConfirmButton: false,
    timerProgressBar: true
   
  });
  this.value = '';
  return;
 }

 if((size+sizeFile)>10){
  Swal.fire({
    icon: 'error',
    iconColor: 'white',
    position: 'top-right',
    title: 'Oops...',
    text: 'Excede el tamaño maximo permitido de 10MB',
    toast:true,
    timer: 3500,
    customClass: {
      popup: 'colored-toast'
    },
    showConfirmButton: false,
    timerProgressBar: true
   
  });
  this.value = '';
  return;

 }

   
	for(var i = 0; i < this.files.length; i++){
		let fileBloc = $('<span/>', {class: 'file-block'}),
			 fileName = $('<span/>', {class: 'name', text: this.files.item(i).name+'('+ Math.round(this.files.item(i).size /1024 /1024 *100)/100+') MB'});
		   fileBloc.append(`<span class="file-delete govco-icon govco-icon-x-cn" data-size="${Math.round(this.files.item(i).size /1024 /1024 *100)/100}"><span></span></span>`)
			.append(fileName);
		$("#filesList > #files-names").append(fileBloc);
    //sumar
    sizeFile += Math.round(this.files.item(i).size /1024 /1024 *100)/100;
	};

  console.log('despues de la suma:' +sizeFile);
  
	//Agregar archivos al objeto DataTransfer
	for (let file of this.files) {
		dt.items.add(file);
	}
	// Actualización de los archivos del archivo de entrada después de la adición
	this.files = dt.files;
  
	// EventListener para la eliminacion

  	$('span.file-delete').click(function(e){
    sizeDelete = $(this).data("size");
    console.log(sizeDelete);
		let name = $(this).next('span.name').text();
   
    //Suprimir la visualización del nombre del archivo
		$(this).parent().remove();
		for(let i = 0; i < dt.items.length; i++){
      		//Coincidencia de archivo y nombre
           
      if(name == dt.items[i].getAsFile().name+'('+ Math.round(dt.items[i].getAsFile().size /1024 /1024 *100)/100+') MB'){   
        sizeFile -= Math.round(dt.items[i].getAsFile().size /1024 /1024 *100)/100;
        //Eliminar archivo en el objeto DataTransfer
				dt.items.remove(i);        
				continue;
			}
		}
    
    console.log('total con la resta:'+ sizeFile);
		//Actualizar los archivos del archivo de entrada después de la eliminación
		document.getElementById('attachment').files = dt.files;
	});
    // var files = document.getElementById("attachment").files;
  
  // for (var i = 0; i < files.length; i++)
  // {
  //  console.log(files[i].name);
  // }
 
});

let $checkboxHaDenunciado = document.querySelectorAll('input[name="ha_denunciado"]');
let $divDenuncia = document.querySelectorAll('.div-denuncias'),
    $inputsDenuncia = document.querySelectorAll('.info_denuncias');
$checkboxHaDenunciado.forEach((element) => {

  element.addEventListener('change',(e)=>{
    let item = e.target.value;
      if(item ==='SI'){
        $divDenuncia.forEach((el)=>{
          el.classList.remove('d-none');          
        })

        $inputsDenuncia.forEach((elm)=>{elm.required = true; 
          })
          let entidadDenuncia = document.getElementById('entidad_denuncia');
          entidadDenuncia.addEventListener('change',(e)=>{
            if(entidadDenuncia.value == 'Otro'){
              document.querySelector('.div-denuncias-2').classList.remove('d-none');
              document.querySelector('.info_denuncias-2').required = true;
            }else{
              document.querySelector('.div-denuncias-2').classList.add('d-none');
              document.querySelector('.info_denuncias-2').classList.remove('is-valid');
              document.querySelector('.info_denuncias-2').classList.remove('is-invalid');
              document.querySelector('.info_denuncias-2').value = '';
              document.querySelector('.info_denuncias-2').required = false;

            }
          })
        }else{
        $divDenuncia.forEach((el)=>{
          el.classList.add('d-none');
        })
        $inputsDenuncia.forEach((elm)=>{
        elm.value = ''
        let name = elm.name
        elm.classList.remove('is-valid');
        elm.classList.remove('is-invalid');
        elm.required = true;
        (document.body.contains(document.getElementById(`${name}-error`))) ? document.getElementById(`${name}-error`).remove(): ''

        })
        document.querySelector('.div-denuncias-2').classList.add('d-none');
        document.querySelector('.info_denuncias-2').classList.remove('is-valid');
        document.querySelector('.info_denuncias-2').classList.remove('is-invalid');
        document.querySelector('.info_denuncias-2').value = '';
        document.querySelector('.info_denuncias-2').required = false;       
      }    
})

})

let $checkboxDisuadir = document.querySelectorAll('input[name="disuadirlo"]');
let $divDisuadir = document.querySelectorAll('.div-disuadir'),
    $inputsDisuadir = document.querySelectorAll('.info_disuadir');
$checkboxDisuadir.forEach((element) => {

  element.addEventListener('change',(e)=>{
    let item = e.target.value;
      if(item ==='SI'){
        $divDisuadir.forEach((el)=>{
          el.classList.remove('d-none');
        })
        $inputsDisuadir.forEach((elm)=>{
        elm.required = true;

        })
        
      }else{
        $divDisuadir.forEach((el)=>{
          el.classList.add('d-none');
        })
        $inputsDisuadir.forEach((elm)=>{
        elm.required = false;
        elm.value='';
        let name = elm.name;
        elm.classList.remove('is-valid');
        elm.classList.remove('is-invalid');
        (document.body.contains(document.getElementById(`${name}-error`))) ? document.getElementById(`${name}-error`).remove() : '';
        

        })
       
       
      }    
})
})


$('.formRita').ready(function(){

  $("select").on("select2:close", function (e) {  
      $(this).valid(); 
  });

  $(".info_evidencias").on('change',function(e){
    $(this).each(function(){
     if($(this).val() != ''){
      $(this).valid(); 
     }
     $(this).removeClass('is-valid');
    });
  });       
                
  $.validator.addMethod("valueNotEquals", function(value, element, arg){
          return arg !== value;
         }, "Value must not equal arg.");
  
  $("#formRita").validate({
      
      rules: {
      proceso_seleccion : {required: true},
      tiene_evidencias :{required: true},
      compartir_informacion:{required: true},
      ha_denunciado: {required: true},
      disuadirlo: {required: true},
     
      
      },
      errorPlacement: function(error, element) {
        console.log(element);
          if (element.attr("type") == "radio") {
              error.insertBefore(element);
          } else {
              error.insertAfter(element);
          }
      },
      highlight: function(element) {
          $(element).removeClass('is-valid').addClass('is-invalid');
        },
        unhighlight: function(element) {
          $(element).removeClass('is-invalid').addClass('is-valid');
      },
      messages : {
          
        tipo_persona: { required: "Campo obligatorio"},
        tipo_doc: { required: "Campo obligatorio"},
        identificacion: { required: "Campo obligatorio"},
        nombres: { required: "Campo obligatorio"},
        apellidos: { required: "Campo obligatorio"},
        razon_social: { required: "Campo obligatorio"},
        asunto: { required: "Campo obligatorio"},
        telefono_movil: { required: "Campo obligatorio"},
        telefono_fijo: { required: "Campo obligatorio"},
        direccion: { required: "Campo obligatorio"},
        barrio: { required: "Campo obligatorio"},
        email_responsable: { required: "Campo obligatorio"},
        email_confirmado: { required: "Campo obligatorio"},
        pais: { required: "Campo obligatorio"},
        departamento: { required: "Campo obligatorio"},
        municipio: { required: "Campo obligatorio"},
        medio_respuesta: { required: "Campo obligatorio"},
        lugar_denuncia: { required: "Campo obligatorio"},
        cuando_denuncia: { required: "Campo obligatorio"},
        involucrados_denuncia: { required: "Campo obligatorio"},
        descripcion_hechos: { required: "Campo obligatorio"},
        adj_descripcion: { required: "Campo obligatorio"},
        riesgo_denuncia: { required: "Campo obligatorio"},
        proceso_seleccion: { required: "Campo obligatorio"},
        tipo_contrato: { required: "Campo obligatorio"},
        informacion_contrato: { required: "Campo obligatorio"},
        adj_informacion: { required: "Campo obligatorio"},
        fecha_aprox_proceso: { required: "Campo obligatorio"},
        lugar_contrato: { required: "Campo obligatorio"},
        entidad_contrato: { required: "Campo obligatorio"},
        link_contrato: { required: "Campo obligatorio"},
        tiene_evidencias: { required: "Campo obligatorio"},
        'evidencias[]': { required: "Campo obligatorio"},
        ha_denunciado: { required: "Campo obligatorio"},
        entidad_denuncia: { required: "Campo obligatorio"},
        otra_entidad: { required: "Campo obligatorio"},
        impacta_organizacion: { required: "Campo obligatorio"},
        contacto_adicional: { required: "Campo obligatorio"},
        disuadirlo: { required: "Campo obligatorio"},
        quien_disuade: { required: "Campo obligatorio"},
        fecha_limite: { required: "Campo obligatorio"},
        estado_solicitud: { required: "Campo obligatorio"},
        observaciones_solicitud: { required: "Campo obligatorio"},
        fecha_actuacion: { required: "Campo obligatorio"},
        tratamiento_datos: { required: "Campo obligatorio"},
        acepto_terminos: { required: "Campo obligatorio"},
        confirmo_mayorEdad: { required: "Campo obligatorio"},
        compartir_informacion: { required: "Campo obligatorio"}
 

      }
        
      
    });

  });

  $body = $("body");

  $(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
});

  $('.formRita').submit(function(e) {	   
    e.preventDefault();
  if($('.formRita').valid()){
      var response = grecaptcha.getResponse();
      if (response.length == 0) {
        Swal.fire("Captcha no verificado");
        return;
      }
     let $formRita= document.getElementById('formRita');
     let datos = new FormData($(".formRita")[0]);
     let direccion = document.getElementById("direccion_solicitante").value;
     let arc_descripcion = $("#arc_descripcion")[0].files;
     let arc_informacion = $("#arc_informacion")[0].files;
     datos.append("arc_descripcion", arc_descripcion);
     datos.append("arc_informacion", arc_informacion);
    
    
     let files = document.getElementById("attachment").files;
    
     for (var index = 0; index < files.length; index++) {
      datos.append("files"+index, document.getElementById('attachment').files[index]);
    }
     datos.append("countFiles",files.length);
    for (var pair of datos.entries()) {
      console.log(pair[0]+ ', ' + pair[1]); 
    }
    let data =Object.fromEntries(datos);
    console.log(data);

    $.ajaxSetup({
      headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
  });

    $.ajax({
      type: "POST",
      url: "/rita/store",
      data: datos,
      contentType: false,
      cache: false,
      processData: false,

      beforeSend: function () {
        
      },

      success: function (response) {
          if (response.success) {
            $("#barrio_solicitante").select2("val", "");
            $("#tipo_persona").select2("val", "");
            $("#tipo_doc").select2("val", "");
            $(".formRita")[0].reset();           
            window.location.href = '/rita/confirmacion'
              
          } else {
              printErrorMsg(response.error);
          }
      },
      error: function () {
          alert("error de petición ajax");
      },
  }).done(function(){
     
  });

  function printErrorMsg(msg) {
    $(".print-error-msg").find("ul").html("");
    $(".print-error-msg").css("display", "block");
    $.each(msg, function (key, value) {
        $(".print-error-msg")
            .find("ul")
            .append("<li>" + value + "</li>");
    });  
    window.scrollTo(0, 0)
   
    }
    }
      
  });

  $("#formConsulta").validate({
    messages : {
          
      tipo_parametro: { required: "Campo obligatorio"},
      parametro: { required: "Campo obligatorio"},
    }



  })

  $('#formConsulta').submit(function(e){
    e.preventDefault();
  if($('#formConsulta').valid()){
    console.log('asdasdads');
  }
  
  
  
  })













  



 

  

