<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';


// $id = '';
// $nombre = '';
// $apellidoP = '';
// $apellidoM = '';
$correo = '';
// $apodo='';
// $tipoUsuario='';



$txtCorreo = isset($_POST['txtCorreo']) ? $_POST['txtCorreo'] : '';

function generatePassword($length)
{
    $key = "";
    $pattern = "123456789abcdefghijklmnopqrstABCDEFGHIJKLMNOPQRST";
    $max = strlen($pattern)-1;
    for($i = 0; $i < $length; $i++){
        $key .= substr($pattern, mt_rand(0,$max), 1);
    }
    return $key;
}
   


 if (isset($txtCorreo) && !empty($txtCorreo)){
    $con = new SQLite3("tienda.db") or die("problemas para conectar");
    $cs = $con -> query("SELECT * FROM usuarios WHERE correo='$txtCorreo'");



    while($resul = $cs -> fetchArray()){
        $id = $resul['id'];
        $nombre = $resul['nombre'];
        $apellidoP = $resul['apellidoP'];
        $apellidoM = $resul['apellidoM'];
        $apodo = $resul['apodo'];
        $correo = $resul['correo'];
        $cont = $resul['cont'];
        $tipoUsuario = $resul['tipoUsuario'];
        
    }

    
    if($txtCorreo == $correo){
       
        
        if (isset($_POST['submitChars'])) {
            $chars= '8';
            $cont = 0 ;
            $length = (int)$_POST['chars'];  
            $javi =generatePassword($length);
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
                  title:"Contraseña Restablecida",
                  text : "La contraseña se ha restablecido exitosamente revisa tu correo electronico para ver tu nueva contraseña",
                  icon: "success",
                  buttons:"Continuar"
                }).then(respuesta=>{
                 if(respuesta){
                    window.location="login.php"
                 }
             })
              </script>
            </body>
            </html>
           ';
        }   
        $mail = new PHPMailer(true);

        try {
        
            $mail->CharSet = 'UTF-8';
        
            $mail->isSMTP();
        
            $mail->Host       = 'smtp.gmail.com';  // host de correos
            $mail->SMTPAuth   = true;                                   // Activa la autenticación del Usuario
            $mail->Username   = 'tiendaneon302@gmail.com';                     // SMTP Usuario
            $mail->Password   = 'sasori302';                               // SMTP Password
            $mail->SMTPSecure = 'tls';                                  // Tipo de protocolo de envio de correo
            $mail->Port       = 587;                                    // TCP Puerto Servidor
        
            //PARA PHP 5.6 Y POSTERIOR
            $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
        
            //Salida correo
            $mail->setFrom('tiendaneon302@gmail.com', 'Tienda Neon');
            $mail->addAddress($correo);     //Correo de Salida
        
            // Contenido
            $mail->isHTML(true);                                  // Activamos codigo HTML
            // $mail->msgHTML(file_get_contents('ejemplo.html'), __DIR__);     //Se envio archivo en HTML pero $mail->Body debe estar desactivado
            $mail->Subject = 'Cambio de contraseña - Tienda Neon';
            $mail->Body    = '
            <h1>¡Hola '.$nombre.'!</h1>
            <br>
            <p>Contraseña restablecida, exitosamente.</p>
            <br>
            <p>Tu nueva contraseña es: <b>'.$javi.'</b></p>
            ';
        
            $mail->send();
            
        } catch (Exception $e) {
            $errorMSg = "No se pudo enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
            echo $errorMSg;
        }
        $cs = $con -> query("UPDATE usuarios SET cont = '$javi' WHERE correo ='$correo'");

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
              title:"Error",
              text : "El correo no esta registrado",
              icon: "warning",
              buttons:"Continuar"
            }).then(respuesta=>{
             if(respuesta){
                window.location="olvidar.html"
             }
         })
          </script>
        </body>
        </html>
       ';
    }
} 
?>
