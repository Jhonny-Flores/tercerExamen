<?php
require_once 'conexion.php';
session_start();
/*$idusuario = $_POST=['idusuario'];*/
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
/*Variable conexion desde conexion.php*/
$conexion = new mysqli(SERVER, USER, PASS, DB);
$q = "SELECT COUNT(*) as contar from usuario where usuario = '$usuario' and clave = '$clave'";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);
/*Un if para controlar*/
if ($array['contar'] > 0) {
    $_SESSION['$usuario'];
    header("location: ../views/principal.php");
} else {
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <script>alert("USUARIO INCORRECTO O INVALIDO")</script>
    </body>
    </html>
    <?php
}
?>
