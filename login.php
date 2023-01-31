<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

session_start();
session_destroy();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    <header>
        <div class="overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="vid/fondo.mp4" type="video/mp4">
        </video>
        <nav class="navbar navbar-light  fixed-top" style="background-color: #954595;">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php" style="font-family: Wallpoet; color: black; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-size: 28px; -webkit-text-stroke: 1px rgba(0, 0, 0 , 1);">Pc Shop Neon</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" style="background-color: black">
                <p style="margin-top: 5px; color: whitesmoke;">Menu</p>
              </button>
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header" style="background-color: #4B224B">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="font-family: Wallpoet; color: #954595; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);  font-size: 30px;">Pc Shop / Neon - Alpha</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" style="background-color: rgba(156, 72, 156, 0.9);">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        
                    </li>
                    <li class="nav-item">
                        <div class="card" style="background-color: black; margin-top: 10px;">
                            <a class="nav-link" href="index.php" ><p style="text-align: center; font-size: 40px; color: aliceblue;">Busca una PC</p></a>
                        </div>
                    </li>
                 
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto" style="margin-top: 230px;">
                   <div class="card" style="background-color: rgba(156, 72, 156, 0.9); border-color: black; border-radius: 5%;">
                      <div class="card-body text-center"> 
                         <div class="mx-auto" style=" width: 230px; height: 230px; border-radius: 50%; margin-top: -150px;">
                             <img src="img/neon.png" style="border: solid 1px black; width: 200px; height: 200px; border-radius: 50%; margin-top: -1px;">
                          </div>
                          <div class="card" style="background-color: black; margin-top: -25px; border-color: aliceblue;">
                            <p style="color: whitesmoke; font-size: 50px; font-family: Tourney ;">Inicio de Sesion</p>
                          </div>
                         
                          <form action="validar.php" method="POST" class="my-3">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" style="background-color: black; color: aliceblue;" placeholder="Correo Electronico" name="txtCorreo" onKeypress="validacion()" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" style="background-color: black; color: aliceblue;" placeholder="contraseña" name="txtPws" required>
                            </div>
                            <div class="form-group mb-3">
                                <button style="width: 230px;">
                                    <p style="font-size: 28px; color: whitesmoke;"> Acceder </p>
                                </button>
                            </div>
                        </form>
                        <div class="form-group mb-3">
                          <form action="formulario.html">
                            <button style="width: 230px;">
                              <p style="font-size: 22px; color: whitesmoke;"> Crear una Cuenta </p>
                            </button>
                          </form>
                        </div>
                        <a href="olvidar.html" style="color: black; font-family: Wallpoet ; font-size: 20px;">¿Olvidaste tu Contraseña?</a>
                      </div>
                </div>
            </div>
        </div>
    </header>
    
</body>
</html>