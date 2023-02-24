<?php
include ("conexion.php");

$id=$_GET["id"];

$query=mysqli_query($conx,"DELETE FROM usuarios WHERE idUsuario='$id'");
if($query){
    header("location:/gestionla/view/usuario1/administrar-usuarios.php");
}else{
    echo "ERROR";
}
?>