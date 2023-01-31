<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$txtNombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : '';
$txtPrecio = isset($_POST['txtPrecio']) ? $_POST['txtPrecio'] : '';
$txtclaveP = isset($_POST['txtclaveP']) ? $_POST['txtclaveP'] : '';
$txtPiezas = isset($_POST['txtPiezas']) ? $_POST['txtPiezas'] : '';


      if(isset($txtNombre) && !empty($txtNombre) && isset($txtPrecio) && !empty($txtPrecio) &&  isset($txtclaveP) && !empty($txtclaveP) && isset($txtPiezas) && !empty($txtPiezas)){
         $con = new SQLite3("tienda.db") or die("problemas para conectar");
         
            $cs = $con -> query("INSERT INTO articulos(claveP,nombre,piezas,precio) VALUES('$txtclaveP','$txtNombre','$txtPiezas','$txtPrecio');");
            echo '
            <script>alert("Registro Exitoso!");</script>
            <script>window.location="consul.php";</script>
           ';
        $con -> close();
      }else{
         echo' <script>alert("Completa los parametros correctamente");</script>
         <script>window.location="productos.php";</script>
         ';
      }
        
?>