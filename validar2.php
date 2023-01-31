<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$txtNombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : '';
$txtAp = isset($_POST['txtAp']) ? $_POST['txtAp'] : '';
$txtAm = isset($_POST['txtAm']) ? $_POST['txtAm'] : '';
$txtApo = isset($_POST['txtApo']) ? $_POST['txtApo'] : '';
$txtCorreo = isset($_POST['txtCorreo']) ? $_POST['txtCorreo'] : '';
$txtPws = isset($_POST['txtPws']) ? $_POST['txtPws'] : '';
$txtTpu = isset($_POST['txtTpu']) ? $_POST['txtTpu'] : '';



$con = new SQLite3("tienda.db") or die("problemas para conectar");
$cs = $con -> query("SELECT correo FROM usuarios WHERE correo='$txtCorreo'");


$correo = '';

while($resul = $cs -> fetchArray()){
    $correo = $resul['correo'];
}

if ($txtCorreo == $correo) {
      echo '
        <script>
        alert("el correo ya esta en uso")
        window.location="formulario.html"
       </script>
        ';
}else{
    if(isset($txtNombre) && !empty($txtNombre && isset($txtAp) && !empty($txtAp) && isset($txtAm) && !empty($txtAm) && isset($txtApo) && !empty($txtApo) && isset($txtCorreo) && !empty($txtCorreo) && isset($txtPws) && !empty($txtPws))){
        $cs = $con -> query("INSERT INTO usuarios(nombre,apellidoP,apellidoM,apodo,correo,cont,tipoUsuario) VALUES('$txtNombre','$txtAp','$txtAm','$txtApo','$txtCorreo','$txtPws','$txtTpu');");

        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="css/bootstrap.min.css">
          <link rel="stylesheet" href="css/inicio.css">
          <link rel="stylesheet" href="css/index.css">
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <title>Document</title>
        </head>
        <header>
         <div class="overlay"></div>
         <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
             <source src="vid/fondo.mp4" type="video/mp4">
         </video>
        </header>
        <body>
          <script>
            swal({
              title:"Registro Completado",
              text : "'.$txtApo.'",
              icon: "success",
              buttons:"Continuar"
            }).then(respuesta=>{
             if(respuesta){
                window.location="index.php"
             }
         })
          </script>
        </body>
        </html>
       ';

    }else{
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="css/bootstrap.min.css">
          <link rel="stylesheet" href="css/inicio.css">
          <link rel="stylesheet" href="css/index.css">
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <title>Document</title>
        </head>
        <header>
         <div class="overlay"></div>
         <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
             <source src="vid/fondo.mp4" type="video/mp4">
         </video>
        </header>
        <body>
          <script>
            swal({
              title:"Ingresa los datos correctamente",
              text : "Intentalo de nuevo",
              icon: "success",
              buttons:"Continuar"
            }).then(respuesta=>{
             if(respuesta){
                window.location="formulario.html"
             }
         })
          </script>
        </body>
        </html>
       ';
    }
}
$con -> close();

?>