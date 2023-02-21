<?php
include("conexion.php");

$name=$_POST["name"];
$pass=$_POST["pass"];
$rol=$_POST["rol"];
$img=addslashes(file_get_contents($_FILES["image"]['tmp_name']));

$query=mysqli_query($conx,"INSERT INTO usuarios (Nombre,Contraseña,Rol,Foto) VALUES ('$name','$pass','$rol','$img')");

if($query){
    echo "<script>alert('Guardado con Exito');window.location='/gestionla/view/admin.php';</script>";
}else{
    echo "Error";
}
?>