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
        .container-border {
            border: 2px solid #2332CE;
            width: 700px !important;
            margin-left: 400px;
            padding: 10px;
            border-radius: 20px;
            z-index: 10;
        }
    </style>
</head>
<body>
  <div class="container-border">
  <div class="container-fluid color-blue" style="border-radius: 10px;">
      <br><br><br><br>
  </div>
      <br>
      <br>
      <div class="container center" style="margin-left: 40px;">
        <img src="https://saludmadreymujer.com/archivos/img/logo.png" width="90px" height="90px" style="margin-left: 250px ;">
        <br>
        <br>
        <p>¿Como vas?</p>
        <p>Te contamos que recibimos una solicitud de PQRSF ( {{ $pqrs }} )</p>
        <p>Expuesta para la EPSI o/y IPS con los siguientes datos.</p>
    </div>

    <div class="container" style="margin-left: 40px;">
      <h4>PQRS EXPUESTA POR EL USUARIO<span> {{ $nombre}}</span> </h4>
      <h5>TIPO DE DOCUMENTO: {{ $tpdocumento }}</h5>
      <h5>NUMERO DE DOCUMENTO: {{ $documento }}</h5>
      <h5>NUMERO TELEFONICO: {{ $telefono }}</h5>
      <h5>CORREO ELECTRONICO: {{ $correo }} </h5>
    </div>
    <div class="container" style=" padding-left: 40px;" width="200px;" >
        <h3>MENSAJE</h3>
        <P> {{ $mensaje }}</P>
    </div>
    <div class="container">
        <img src="https://saludmadreymujer.com/archivos/img/pqrs.png" width="400px;">
    </div>
    <div class="container-fluid color-blue" style="border-radius: 10px;">
      <br><br><br><br>
    </div>
</div>

</body>
</html>
