<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/gestionla/styles/inicio.css">
    <link rel="stylesheet" href="/gestionla/styles/header.css">
    <link rel="stylesheet" href="/gestionla/styles/footer.css">
    <title>LICOAMERICA - Sistema de Gestión de Calidad</title>
</head>
<body>
    <div class="container">
        <div class="content-left">
            <img src="./images/cover.jpg" alt="Licoamerica">
        </div>
        <div class="content-right">
            <form action="/gestionla/model/read-user.php" method="post">
                <h2>INICIO DE SESION</h2>
                <label for="name">Nombre de Usuario</label>
                <input type="text" name="name" id="name" required>
                <label for="pass">Contraseña</label>
                <input type="password" name="pass" id="pass" required>
                <button type="submit">Entrar</button>
                <br>
                <span id="alert">Nombre o contraseña incorrecta</span>
                <hr>
                <a href="#">Se me olvidó la contraseña</a>
            </form>
        </div>
    </div>
</body>
</html>