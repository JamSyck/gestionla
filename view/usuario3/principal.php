<?php
include ("../../model/conexion.php");
session_start();
if(!isset($_SESSION['usuario'])){
    echo "<script>alert('Debes iniciar sesión');location='/gestionla';</script>";
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
    <link rel="stylesheet" href="/gestionla/styles/user3.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css'>
    <title>Sistema de Gestión de Calidad | LICOAMERICA</title>
</head>
<body>
    <main class="dashboard">
        <!--SIDEBAR-->
        <section id="menu" class="menu">
            <div class="sidebar">
                <div class="profile">
                    <i id="btn-close" class='bx bx-x'></i>
                    <?php while($row=mysqli_fetch_assoc($user)){?>
                        <?php if($row["Imagen"]>1) { ?>
                            <img src="data:image/jpg;base64, <?php echo base64_encode($row["Imagen"])?>">
                        <?php }else{ ?>
                            <img src="/gestionla/images/photo.jpg" alt="Sin foto">
                        <?php } ?>
                        <b><?php echo $row["Nombre"]?></b>
                        <p><u><?php echo $row["Funcion"]?></u></p>
                    <?php } ?>
                </div>
                <hr>
                <div class="processes">
                    <a id="home" href="/gestionla/view/usuario3/principal.php">
                        <b><i class='bx bx-home'></i>PRINCIPAL</b>
                    </a>
                    <b>PROCESOS</b>
                    <ul>
                        <a href="#">
                            <li><i class='bx bx-archive'></i><p>Procedimientos</p></li>
                        </a>
                        <a href="#">
                            <li><i class='bx bx-spreadsheet'></i><p>Guías</p></li>
                        </a>
                        <a href="#">
                            <li><i class='bx bx-file'></i><p>Registros</p></li>
                        </a>
                    </ul>
                </div>
                <hr>
                <a id="close" href="/gestionla/model/close.php"><i class='bx bx-log-out'></i><p>Salir</p></a>
            </div>
        </section>
        <!--CONTENT-->
        <section class="main">
            <div class="navbar">
                <div class="title">
                    <i id="btn-menu" class='bx bx-menu'></i>
                    <b>SISTEMA DE GESTIÓN DE CALIDAD</b>
                </div>
                <img src="/gestionla/images/logo.png" alt="LICOAMERICA">
            </div>
            <div class="content">...</div>
        </section>
    </main>
    <script src="/gestionla/js/sidebar.js"></script>
</body>
</html>