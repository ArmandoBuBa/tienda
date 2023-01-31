<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");





$buscador = isset($_POST['buscador']) ? $_POST['buscador'] : '';





?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Tienda</title>
    <style>
        body{
            background: url('img/fondo5.jpg') no-repeat center center fixed;
            background-size: cover;
            -webkit-background-size: cover;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #954595;">
            <div class="container-fluid">
              <div class="card" style="background-color: black; width: 170px;">
                <a class="navbar-brand" href="tienda.php" style="color: whitesmoke; font-family: Wallpoet;">Pc Shop Neon</a>
              </div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" style="background-color: black" aria-expanded="false" aria-label="Toggle navigation">
                <p style="margin-top: 5px; color: whitesmoke;">Menu</p>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <div class="card" style="background-color: black; margin-left: 5px;">
                      <a class="nav-link active" aria-current="page" href="login.html" style="color: whitesmoke">Inicio de Sesion</a>
                    </div> 
                  </li>
                  <li class="nav-item">
                    <div class="card" style="background-color: #DB50CD; margin-left: 5px;">
                      <a class="nav-link" href="login.html" style="color: white;">Cerrar sesion</a>

                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                </ul>
                <form class="d-flex" action="validacion1.php" method="POST">
                  <input class="form-control me-2" type="text" name="buscador" placeholder="Search" onKeypress="validacion()" aria-label="Search">
                  <button type="submit" style="color: whitesmoke;">Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>
    <div class="contrainer">
      <div class="row">
        <div class="col-md-5 mx-auto">    
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" >
      <div class="carousel-inner" style="margin-top: 80px;">
        <div class="carousel-item active" data-bs-interval="2000">
          <img src="imgK/1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="imgK/2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="imgK/3.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
          <?php
               $con = new SQLite3("tienda.db") or die("problemas para conectar");
               $cs = $con -> query("SELECT * FROM vista1 WHERE comodin LIKE '%$buscador%'");
               while($res = $cs -> fetchArray()) {
                    $id= $res['id'];
                    $claveP= $res['claveP'];
                    $nombre= $res['nombre'];
                    $precio= $res['precio'];
                    $piezas= $res['piezas'];

                    if(isset($piezas)==0){
                      echo'<script>alert("Registro Exitoso!");</script>';

                    }else{
                      echo' 
                      <div class="card" style="margin-top: 45px; background-color: #954595;">
                        <div class="card-body text-center">
                          <div class="row g-3">
                            <div class="col">
                              <img src="imgP/'.$id.'.jpg" class="card-img-top" style="width: 300px; height: 250px; margin-left: 50px;">
                              <h4 style="color: whitesmoke; background-color: black; font-family: wallpoet; margin-top: 5px;">Existencias : '.$piezas.'</h4>
                              <form action="compra.php" method="POST">
                                <input type="hidden" name="txtCompra" value="'.$nombre.'">
                                <input type="number" name="txtCantidad" max="'.$piezas.'" min="1" value="0" >
                                <input type="hidden" name="txtPrecio" value="'.$precio.'">
                                <input type="hidden" name="txtImg" value="'.$id.'">
                                <button type="submit" class="btn btn-dark">Comprar</button>
                              </form>
                          
                            </div>
                            <div class="col">
                              <h5 class="card-title" style="font-family: Wallpoet; color: whitesmoke; background-color: black;">'.$nombre.'</h5>
                              <h4 style="color: whitesmoke; background-color: black; font-family: wallpoet;">$'.$precio.'</h4>
                              <img src="imgP/'.$claveP.'.png" style="width: 350px; height: 350px;">
                            </div>
                          </div> 
                        </div> 
                      </div>
                        ';

                    }
                 }  
               $con -> close();
          ?>
        </div>
      </div>
    </div>
  
</body>
</html>