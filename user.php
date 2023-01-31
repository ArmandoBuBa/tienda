<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

session_start();

$buscador = isset($_POST['buscador']) ? $_POST['buscador'] : '';

//variable hiperglobal
$hiperCorreo = isset($_SESSION['txtCorreo']) ? $_SESSION['txtCorreo'] : '';

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
                <a class="navbar-brand" href="index.php" style="color: whitesmoke; font-family: Wallpoet;">Pc Shop Neon</a>
              </div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" style="background-color: black" aria-expanded="false" aria-label="Toggle navigation">
                <p style="margin-top: 5px; color: whitesmoke;">Menu</p>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <div class="card" style="background-color: black; margin-left: 5px;">
                      <a class="nav-link active" aria-current="page" href="index.php" style="color: whitesmoke">Home</a>
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
                        if ($hiperCorreo === 'armandoutfv@gmail.com'){
                          echo' 
                          <a class="nav-link" href="login.php" style="color: white;">Cerrar sesion</a>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="color: aliceblue;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                              Opciones de Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="consul.php">Consultar Articulos</a></li>
                              <li><a class="dropdown-item" href="productos.php">Agreagar Articulos</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="user.php">Consultar Usuarios</a></li>
                            </ul>
                          </li>
                          ';

                        }else{
                          echo '
                           <a class="nav-link" href="login.php" style="color: white;">Cerrar sesion</a>
                          ';
                        }
                      }
                      
                      ?>

                    </div>
                  </li>
                  
                </ul>
                <form class="d-flex" action="index.php" method="POST">
                  <p class="text-white px-3 mt-3"><?php echo $hiperCorreo;?></p>
                  <input class="form-control me-2" type="text" name="buscador" placeholder="Busca tu Pc aqui" onKeypress="validacion()" aria-label="Search">
                  <button type="submit" style="color: whitesmoke;">Buscar</button>
                </form>
              </div>
            </div>
          </nav>
        <div class="container" style="margin-top: 3%;">
            <div class="row">
            <div class="contrainer">
        <div class="row">
        <div class="col-md-8 mx-auto my-5">
        <h1 class= "bg-dark text-white p-3 rounded" style="font-size: 300%; "> Usuarios </h1>
          <table class= "table text-center" style="background-color: white; border: solid 1px black;">
          <thead class= "bg-dark text-white">
                <tr>
                <th>
                       Id
                 </th>
                   <th>
                        Nombre
                 </th>
    
                 <th>
                      Apellido Paterno
                 </th>
    
                 <th>
                     Apellido Materno
                 </th>
    
                 <th>
                       Correo
                 </th>
                 <th>
                    contraseña
                </th>
                <th>
                    Alias
                </th>
                <th>
                   Tipo de Usuario
                </th>
                 </tr>
         </thead>
                <tbody>
                <?php
                 $con = new SQLite3("tienda.db") or die("problemas para conectar");
                 $cs = $con -> query("SELECT * FROM usuarios");
                 while($res = $cs -> fetchArray()) {
                      $id= $res['id'];
                      $apellidoP= $res['apellidoP'];
                      $nombre= $res['nombre'];
                      $apellidoM= $res['apellidoM'];
                      $correo= $res['correo'];
                      $cont= $res['cont'];
                      $apodo= $res['apodo'];
                      $tipoUsuario= $res['tipoUsuario'];
                      echo' 
                      <tr> 
                       <td class="align-middle"> '.$id.' </td>
                       <td class="align-middle"> '.$nombre.'</td>
                       <td class="align-middle"> '.$apellidoP.'</td>
                       <td class="align-middle"> '.$apellidoM.'</td>
                       <td class="align-middle"> '.$correo.'</td>
                       <td class="align-middle"> '.$cont.'</td>
                       <td class="align-middle"> '.$apodo.'</td>
                       <td class="align-middle"> '. $tipoUsuario.'</td>
                      </tr>';
                   }  
                 $con -> close();
                ?>
                </tbody>
               </table>
            </div>
         </div>
     </div>

            </div>

        </div>
          
    </header>
</body>
</html>