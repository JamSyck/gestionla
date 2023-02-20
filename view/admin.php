<?php
include ("../model/conexion.php");
session_start();
if(!isset($_SESSION['usuario'])){
    echo "<script>alert('Debes iniciar sesion');location='/gestionla';</script>";
    session_destroy();
    die();
}
$user=mysqli_query($conx,"SELECT * FROM usuarios WHERE Nombre='$_SESSION[usuario]'");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/gestionla/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/gestionla/styles/admin.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css'>
    <title>Gestión | LICOAMERICA</title>
</head>
<body>
    <main class="dashboard">
        <!--SIDEBAR-->
        <section class="menu">
            <div class="sidebar">
                <div class="profile">
                    <img src="../images/photo.jpg" alt="" width="10px ">
                    <?php while($row=mysqli_fetch_assoc($user)){?>
                        <b><?php echo $row["Nombre"]?></b>
                        <p><?php echo $row["Rol"]?></p>
                    <?php } ?>
                </div>
                <div class="list-menu">
                    <ul>
                        <li><i class='bx bx-home'></i>Inicio</li>
                        <li><i class='bx bx-file'></i>Archivos</li>
                        <li><i class='bx bx-task'></i>Documentos</li>
                        <li><i class='bx bx-receipt'></i>Facturas</li>
                        <li><i class='bx bxs-group'></i>Usuarios</li>
                        <a href="../model/close.php"><li><i class='bx bx-log-out'></i>Salir</li></a>
                    </ul>
                </div>
            </div>
        </section>
        <!--CONTENT-->
        <section class="content">
            <div class="navbar">
                <img src="../images/logo.png" alt="">
            </div>
            <div class="data"></div>
        </section>
    </main>
</body>
</html>