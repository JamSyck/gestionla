<?php
include("../../model/conexion.php");
session_start();
if (!isset($_SESSION['usuario'])) {
    echo "<script>alert('Debes iniciar sesión');location='/gestionla'</script>";
    session_destroy();
    die();
}
$user = mysqli_query($conx, "SELECT * FROM usuarios WHERE Nombre='$_SESSION[usuario]'");
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
    <title>Crear usuario | LICOAMERICA</title>
</head>

<body>
    <main class="dashboard">
        <!--SIDEBAR-->
        <section id="menu" class="menu">
            <div class="sidebar">
                <div class="profile">
                    <i id="btn-close" class='bx bx-x'></i>
                    <?php while ($row = mysqli_fetch_assoc($user)) { ?>
                        <img src='data:image/jpg;base64,<?php echo base64_encode($row["Imagen"]) ?>' alt='Foto'>
                        <b><?php echo $row["Nombre"] ?></b>
                        <p><u><?php echo $row["Funcion"] ?></u></p>
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
                            <li><i class='bx bx-archive'></i>
                                <p>Procedimientos</p>
                            </li>
                        </a>
                        <a href="#">
                            <li><i class='bx bx-spreadsheet'></i>
                                <p>Guías</p>
                            </li>
                        </a>
                        <a href="#">
                            <li><i class='bx bx-file'></i>
                                <p>Registros</p>
                            </li>
                        </a>
                    </ul>
                </div>
                <div class="users">
                    <b>USUARIOS</b>
                    <ul>
                        <a href="./crear-usuario.php">
                            <li><i class='bx bxs-user-plus'></i>
                                <p>Crear usuario</p>
                            </li>
                        </a>
                        <a href="./administrar-usuarios.php">
                            <li><i class='bx bxs-group'></i>
                                <p>Administrar</p>
                            </li>
                        </a>
                    </ul>
                </div>
                <hr>
                <a id="close" href="/gestionla/model/close.php"><i class='bx bx-log-out'></i>
                    <p>Salir</p>
                </a>
            </div>
        </section>
        <!--CONTENT-->
        <section class="content">
            <div class="navbar">
                <div class="title">
                    <i id="btn-menu" class='bx bx-menu'></i>
                    <b>CREAR USUARIO</b>
                </div>
                <img src="/gestionla/images/logo.png" alt="LICOAMERICA">
            </div>
            <div class="data">
                <div class="container-form">
                    <form method="post" enctype="multipart/form-data" onsubmit="return crear(event)">
                        <div class="camp-name">
                            <label for="name"><b>Nombre</b><span style="color:red">*</span></label>
                            <input type="text" name="name" id="name" onkeypress="return sololetras(event)" required>
                            <span id="alert-name"><i>El nombre es muy corto</i></span><br>
                        </div>
                        <div class="camp-pass">
                            <label for="pass"><b>Contraseña</b><span style="color:red">*</span></label>
                            <input type="password" name="pass" id="pass" required>
                            <span id="alert-pass"><i>La contraseña es muy corta</i></span><br>
                        </div>
                        <div class="camp-rol">
                            <label for="rol"><b>Función</b><span style="color:red">*</span></label>
                            <select name="rol" id="rol" required>
                                <option value="" disabled selected hidden>Seleccione</option>
                                <option value="Edición">Edición</option>
                                <option value="Consulta">Consulta</option>
                                <option value="Descarga">Descarga</option>
                            </select><br>
                        </div>
                        <div class="camp-image">
                            <label for="image"><b>Foto</b><span><i>Opcional</i></span></label>
                            <div class="custom-input-file">
                                <i class='bx bx-cloud-upload'></i>Subir
                                <br>
                                <input type="file" class="input-file" name="image" id="image" accept="image/*"><br>
                            </div>
                        </div>
                        <input id="btn-crt" type="submit" name="create-user" value="Crear">
                    </form>
                </div>
            </div>
        </section>
    </main>
    <script src="/gestionla/js/sidebar.js"></script>
</body>

</html>
<?php
include("../../model/conexion.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(isset($_POST["name"])){
        $name=$_POST["name"];
    }else{
        $name="";
    }
    if(isset($_POST["pass"])){
        $pass=$_POST["pass"];
    }else{
        $pass="";
    }
    if(isset($_POST["rol"])){
        $rol=$_POST["rol"];
    }else{
        $rol="";
    }
    if(file_exists($_FILES["image"]["tmp_name"])){
        $img=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    }else{
        $img="";
    }

    $pass=hash('sha512',$pass);

    $query=mysqli_query($conx,"INSERT INTO usuarios (Nombre, Contraseña, Funcion, Imagen) VALUES ('$name','$pass','$rol','$img')");
    if($query){
    echo "<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Usuario creado con éxito',
        showConfirmButton: true,
        })
    </script>";
    }else{
    echo "<script>
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Ha ocurrido en error',
        showConfirmButton: true,
    })
    </script>";
    }
}
?>