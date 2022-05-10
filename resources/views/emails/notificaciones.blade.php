<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <style>
        body {
         font-family:Arial, Helvetica, sans-serif;
         
        }
        .color-blue {
          background-color: #2332CE !important;
        }
        .center {
            text-align: justify;
        }
        .img-center {
            text-align: center;
        }
    </style>
</head>
<body>
  <div class="container-fluid color-blue">
      <br><br><br><br>
  </div>
  <br>
  <br>
  <div class="container center" style="margin-left: 350px ;">
    <img src="https://saludmadreymujer.com/archivos/img/logo.png" width="90px" height="90px" style="margin-left: 450px ;">
    <br>
    <br>
    <p>¿Como vas?</p>
    <p>Te contamos que recibimos una solicitud de PQRS</p>
    <p>Expuesta para la EPSI o/y IPS con los siguientes datos.</p>
  </div>

  <div class="container" style="margin-left: 350px ;">
      <h4>PQRS EXPUESTA POR EL USUARIO<span> {{ $nombre}}</span> </h4>
      <h5>Tipo de Documento: {{ $tpdocumento }}</h5>
      <h5>Numero de Documento: {{ $documento }}</h5>
      <h5>Numero Telefonico: {{ $telefono }}</h5>
      <h5>Correo Electronico: {{ $correo }} </h5>
  </div>
  <div class="container" style="margin-left: 350px; padding-right: 200px;" width="200px;" >
      <h3>Mensaje</h3>
      <P> {{ $mensaje }}</P>
  </div>
  <div class="container">
      <img src="https://saludmadreymujer.com/archivos/img/pqrs.png" >
  </div>

  <div class="container-fluid color-blue">
      <br><br><br><br>
  </div>
</body>
</html>