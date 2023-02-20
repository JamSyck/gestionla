<?php
session_start();
include("conexion.php");

$name=$_POST["name"];
$pass=$_POST["pass"];

$query="SELECT * FROM usuarios WHERE Nombre='".$name."' AND Contraseña='".$pass."'";
$check=mysqli_query($conx,$query);
$result=mysqli_fetch_array($check);

if(isset($result)){
    $_SESSION['usuario']=$name;
    header("location:/gestionla/view/admin.php");
}else{
    echo "<script>alert('No existe este usuario');window.history.go(-1);</script>";
}
?>