<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/gestionla/styles/header.css">
    <link rel="stylesheet" href="/gestionla/styles/inicio.css">
    <link rel="stylesheet" href="/gestionla/styles/footer.css">
    <title>LICOAMÉRICA - Sistema de Gestión de Calidad</title>
</head>
<body>
    <div class="container">
        <div class="content-left">
            <img src="/gestionla/images/cover.jpg" alt="LICOAMÉRICA">
        </div>
        <div class="content-right">
            <form method="post">
                <h2>INICIO DE SESIÓN</h2>
                <label for="name">Nombre de Usuario</label>
                <input type="text" name="name" id="name" required>
                <label for="pass">Contraseña</label>
                <input type="password" name="pass" id="pass" required>
                <button type="submit">Entrar</button>
                <hr>
                <center><a href="/gestionla/view/recuperacion.php">Se me olvidó la contraseña</a></center>
            </form>
        </div>
    </div>
</body>
</html>
<?php
error_reporting(0);
include("./model/conexion.php");
include("./model/swal.php");

session_start();
    
if(isset($_POST)){
    if(strlen($_POST["name"])>=1 && strlen($_POST["pass"])>=1){
        $name=trim($_POST["name"]);
        $pass=trim($_POST["pass"]);
        $pass=hash('sha512',$pass);

        $query=mysqli_query($conx,"SELECT * FROM usuarios WHERE Nombre='$name' AND Contraseña='$pass'");
        $result=mysqli_fetch_array($query);
        if($result["Funcion"]=='Edición'){
            $_SESSION['usuario']=$name;
            header("location:/gestionla/view/usuario1/principal.php");
        }else
        if($result["Funcion"]=='Consulta'){
            $_SESSION['usuario']=$name;
            header("location:/gestionla/view/usuario2/principal.php");
        }else
        if($result["Funcion"]=='Descarga'){
            $_SESSION['usuario']=$name;
            header("location:/gestionla/view/usuario3/principal.php");
        }
        else{
            echo "<script>
            Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Nombre o contraseña incorrecta',
            showConfirmButton: true,
            })
            </script>";
        }
    }
}
?>