<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

session_start();

$buscador = isset($_POST['buscador']) ? $_POST['buscador'] : '';

//variable hiperglobal
$hiperCorreo = isset($_SESSION['txtCorreo']) ? $_SESSION['txtCorreo'] : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                <a class="navbar-brand" href="index.php" style="color: whitesmoke; font-family: Wallpoet;">Pc Shop Neon</a>
              </div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" style="background-color: black" aria-expanded="false" aria-label="Toggle navigation">
                <p style="margin-top: 5px; color: whitesmoke;">Menu</p>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <div class="card" style="background-color: black; margin-left: 5px;">
                      <a class="nav-link active" aria-current="page" href="login.php" style="color: whitesmoke">Home</a>
                    </div> 
                  </li>
                  <li class="nav-item">
                    <div class="card" style="background-color: black; margin-left: 5px;">
                      <?php

                      if ($hiperCorreo === '') {
                        echo '
                        <a class="nav-link" href="login.php" style="color: white;">iniciar sesion</a>
                        ';
                      }else{
                        echo '
                        <a class="nav-link" href="login.php" style="color: white;">Cerrar sesion</a>
                        ';
                      }
                      ?>
                    </div>
                </ul>
                <form class="d-flex" action="validacion1.php" method="POST">
                  <input class="form-control me-2" type="text" name="buscador" placeholder="Search" onKeypress="validacion()" aria-label="Search">
                  <button type="submit" style="color: whitesmoke;">Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>
    <?php

           error_reporting(E_ALL ^ E_DEPRECATED);
           header("Content-Type: text/html; Charset=UTF-8");

                $txtCompra = isset($_POST['txtCompra']) ? $_POST['txtCompra'] : '';
                $txtCantidad = isset($_POST['txtCantidad']) ? $_POST['txtCantidad'] : '';
                $txtPrecio = isset($_POST['txtPrecio']) ? $_POST['txtPrecio'] : '';
                $txtImg = isset($_POST['txtImg']) ? $_POST['txtImg'] : '';

                 $con = new SQLite3("tienda.db") or die("problemas para conectar");
                 $cs = $con -> query("INSERT INTO compra(nombre,cantidad,precio,img) VALUES('$txtCompra','$txtCantidad','$txtPrecio','$txtImg');");
                 
                
                   echo '
                   <script>
                   setTimeout(function(){
                    swal({
                      title:"Haz agotado el tiempo de compra intentalo de nuevo",
                      icon: "warning",
                      buttons:"Continuar"
                    }).then(respuesta=>{
                     if(respuesta){
                        window.location="index.php"
                     }
                 })
                   },1000 * 5  );
                   </script>
                      <div class="container">
                          <div class="row">
                              <div class="col-md-5 mx-auto" style="margin-top: 35px;">
                                <div class="card" style="margin-top: 100px; background-color: #954595;">
                                    <div class="card-body text-center">
                                        <h1 style="font-family: wallpoet; background-color: black; color: whitesmoke;"> Completa tu Compra</h1>
                                        <h3 style="font-family: wallpoet; background-color: black; color: whitesmoke;"> Elige tu metodo de pago</h3>
                                        <div class="row g-3">
                                            <div class="col">
                                                <img src="imgP/'.$txtImg.'.jpg" style="width: 300px; height: 300px;">
                                                <h4 style="font-family: wallpoet; background-color: black; color: whitesmoke;">'.$txtCompra.'</h4>
                                                <h5 style="font-family: wallpoet; background-color: black; color: whitesmoke;"> Cantidad : '.$txtCantidad.'</h5>
                                                <h5 style="font-family: wallpoet; background-color: black; color: whitesmoke;">A Pagar: $'.$txtPrecio.'</h5>
                                            </div>
                                            <div class="col">
                                                <form action="pagos.php">
                                                    <br>

                                                    <br>
                                                    <input type="radio" name="txtdepo" value="" style="width: 15px; height: 15px;">
                                                    <label for="" style="font-size: 25px; font-family: wallpoet; background-color: black; color: whitesmoke;">Deposito</label>
                                                    <br>
                                                    
                                                    <br>
                                                    <input type="radio" name="txtdepo" value="" style="width: 15px; height: 15px;">
                                                    <label for="" style="font-size: 25px; font-family: wallpoet; background-color: black; color: whitesmoke;">Paypal</label>
                                                    <br>

                                                    <br>
                                                    <input type="radio" name="txtdepo" value=""style="width: 15px; height: 15px;">
                                                    <label for="" style="font-size: 18px; font-family: wallpoet; background-color: black; color: whitesmoke;">Mercado pago</label>
                                                    <br>

                                                    <br>
                                                    <button type="submit" class="btn btn-dark" disabled >Continuar</button>
    
                                                </form>
                                              
                                            </div>
                                        </div>
                                    </div>
                                  </div>

                              </div>
                          </div>
                      </div>
                      ';
                $con -> close();

    ?>
    
</body>
</html>