<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notificación RITA</title>
</head>
<body>

    
    <p style="font-size: 16px;"> <strong>Cordial Saludo</strong>,</p>
    <p style="text-align: justify;"> {{$detalleCorreo['mensaje']}} <br>
        
     @if($detalleCorreo['modulo']== 'D')
     Si desea hacerle seguimiento a su denuncia ingrese a: <a href="http://rita.test/" target="_blank">Clic aqui</a> <b>Opcion Seguimiento de denuncia</b>
     @elseif($detalleCorreo['modulo']=='F')
     Si desea darle gestión a la solicitud ingrese a <a href="https://tramitesenlinea.bucaramanga.gov.co/" target="_blank">Clic aqui</a>  con sus credenciales de dominio/correo
     
     @endif
    
     
    </p> 
       



    
    &copy; <small>Secretaria Juridica - Alcaldia de Bucaramanga</small><br>
    
</body>
</html>