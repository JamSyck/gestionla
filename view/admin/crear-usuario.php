<?php
include ("../../model/conexion.php");
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
    <link rel="stylesheet" href="/gestionla/styles/user1.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/gestionla/js/validacion.js"></script>
    <title>Crear usuario | Sistema de Gestión de Calidad de LICOAMERICA</title>
</head>
<body>
    <main class="dashboard">
        <!--SIDEBAR-->
        <section class="menu">
            <div class="sidebar">
                <div class="profile">
                    <?php while($row=mysqli_fetch_assoc($user)){?>
                        <img src='data:image/jpg;base64,<?php echo base64_encode($row["Imagen"])?>' alt='Foto'>
                        <b><?php echo $row["Nombre"]?></b>
                        <p><?php echo $row["Rol"]?></p>
                    <?php } ?>
                </div>
                <hr>
                <div class="processes">
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
                <div class="users">
                    <b>USUARIOS</b>
                    <ul>
                        <a href="/gestionla/view/admin/crear-usuario.php">
                            <li><i class='bx bxs-user-plus'></i><p>Crear usuario</p></li>
                        </a>
                        <a href="#">
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
                <b>CREAR USUARIO</b>
                <img src="/gestionla/images/logo.png" alt="LICOAMERICA">
            </div>
            <div class="data">
                <div class="container-form">
                    <form method="post" enctype="multipart/form-data">
                        <label for="name"><b>Nombre</b>*</label>
                        <input type="text" name="name" id="name" onkeypress="return sololetras(event)" required><br>
                        <label for="pass"><b>Contraseña</b>*</label>
                        <input type="password" name="pass" id="pass" required><br>
                        <label for="rol"><b>Rol</b>*</label>
                        <select name="rol" id="rol" required>
                            <option value="" disabled selected hidden>Seleccione</option>
                            <option value="Edición">Edición</option>
                            <option value="Consulta">Consulta</option>
                            <option value="Descarga">Descarga</option>
                        </select><br>
                        <label for="image"><b>Foto</b><span><i>Opcional</i></span></label>
                        <input type="file" name="image" id="image"><br>
                        <button id="btn-crt" type="submit">Crear</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
<?php
include ("../../model/conexion.php");

$name=$_POST["name"];
$pass=$_POST["pass"];
$rol=$_POST["rol"];
$img=addslashes(file_get_contents($_FILES["image"]['tmp_name'])) || null;

$query=mysqli_query($conx,"INSERT INTO usuarios (Nombre,Contraseña,Rol,Imagen) VALUES ('$name','$pass','$rol','$img')");
if($query){
    echo "<script>
        Swal.fire({
            title: 'Listo',
            text: 'Usuario registrado exitosamente',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location='/gestionla/view/admin/crear-usuario.php';
                }
            })
    </script>";
}else{
    echo 'Error';
}
?>