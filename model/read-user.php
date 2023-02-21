<?php
include("conexion.php");
session_start();

$name=$_POST["name"];
$pass=$_POST["pass"];

$query=mysqli_query($conx,"SELECT * FROM usuarios WHERE Nombre='".$name."' AND Contraseña='".$pass."'");
$result=mysqli_fetch_array($query);

if($result["Rol"]=='Edición'){
    $_SESSION['usuario']=$name;
    header("location:/gestionla/view/admin/user1.php");
}
?>