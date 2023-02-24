<?php
include ("../../model/conexion.php");
session_start();
if(!isset($_SESSION['usuario'])){
    echo "<script>alert('Debes iniciar sesión');location='/gestionla';</script>";
    session_destroy();
    die();
}
$user=mysqli_query($conx,"SELECT * FROM usuarios WHERE Nombre='$_SESSION[usuario]'");
$usuarios=mysqli_query($conx,"SELECT * FROM usuarios WHERE Nombre!='$_SESSION[usuario]' ORDER BY idUsuario DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/gestionla/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/gestionla/styles/user1.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/gestionla/js/fecha.js"></script>
    <title>Administrar usuarios | LICOAMERICA</title>
</head>
<body>
    <main class="dashboard">
        <!--SIDEBAR-->
        <section class="menu">
            <div class="sidebar">
                <div class="profile">
                    <?php while($row=mysqli_fetch_assoc($user)){?>
                        <img src='data:image/jpg;base64,<?php echo base64_encode($row["Imagen"])?>'>
                        <b><?php echo $row["Nombre"]?></b>
                        <p><u><?php echo $row["Funcion"]?></u></p>
                    <?php } ?>
                </div>
                <hr>
                <div class="processes">
                    <a id="home" href="./principal.php">
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
                <div class="users">
                    <b>USUARIOS</b>
                    <ul>
                        <a href="./crear-usuario.php">
                            <li><i class='bx bxs-user-plus'></i><p>Crear usuario</p></li>
                        </a>
                        <a href="./administrar-usuarios.php">
                            <li><i class='bx bxs-group'></i><p>Administrar</p></li>
                        </a>
                    </ul>
                </div>
                <hr>
                <a id="close" href="/gestionla/model/close.php"><i class='bx bx-log-out'></i><p>Salir</p></a>
            </div>
        </section>
        <!--CONTENT-->
        <section class="content">
            <div class="navbar">
                <b>ADMINISTRAR USUARIOS</b>
                <div id="fecha"></div>
                <img src="/gestionla/images/logo.png" alt="LICOAMERICA">
            </div>
            <div class="data">
                <div class="table-users">
                    <table>
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Función</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($data=mysqli_fetch_assoc($usuarios)) { ?>
                            <tr>
                                <td><div class="foto"><img src="data:image/jpg;base64,<?php echo base64_encode($data["Imagen"])?>"></div></td>
                                <td><?php echo $data["Nombre"]?></td>
                                <td><?php echo $data["Funcion"]?></td>
                                <?php 
                                    if($data["Estado"]=='Bloqueado'){
                                        echo "<td style='color:red'>Bloqueado</td>";
                                    }else{
                                        echo "<td style='color:blue'>Desbloqueado</td>";
                                    }
                                ?>
                                <td>
                                    <?php
                                        if($data["Estado"]=='Bloqueado'){
                                            echo "<a id='user-block' href='#' style='background-color:green'><i class='bx bxs-lock-open'></i> Desbloquear</a>";
                                        }else{
                                            echo "<a id='user-block' href='#'><i class='bx bxs-lock'></i> Bloquear</a>";
                                        }
                                    ?>
                                    <a id="user-delete" href="/gestionla/model/delete-user.php?id=<?php echo $data["idUsuario"]?>"><i class="bx bxs-trash"></i> Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>
</html>