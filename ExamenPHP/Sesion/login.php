<?php
session_start();
require_once '../PDO/Conexion.class.php';
require_once '../PDO/Clientes.class.php';
$pdo = Conexion::pdo();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $dni = $_POST['dni'];

    $cliente = new Cliente($dni,"","","","","","");
    $comprobar = $cliente ->exiteDNI($dni);

    if($comprobar){
        $_SESSION['dni'] = $dni;
        
        header("Location: ../PDO/Index.php");
    } else {
        echo"DNI incorrecto";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1 class="text-center mb-5">Iniciar sesion</h1>
        <form method="POST">
            <label for="dni">DNI</label>
            <input type="text" name="dni"/>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>