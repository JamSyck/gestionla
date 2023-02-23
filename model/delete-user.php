<?php
include ("conexion.php");
include ("swal.php");

$id=$_GET["id"];

$query=mysqli_query($conx,"DELETE FROM usuarios WHERE idUsuario='$id'");
if($query){
    echo "OK";
}else{
    echo "No pude";
}
?>