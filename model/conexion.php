<?php
$conx=mysqli_connect('localhost','root','','licoamerica');
if(isset($conx)){
    //echo 'Conectado';
}else{
    die("Conexión fallida: ".mysqli_connect_error());
}
?>