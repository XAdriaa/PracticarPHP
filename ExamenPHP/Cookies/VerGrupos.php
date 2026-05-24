<?php

session_start();
require_once "../PDO/Clientes.class.php";


if(!isset($_SESSION['dni'])){
    header("Location: ../Sesion/login.php");
    exit();
}

$cliente = [];
$name = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['V_grupo'];

    $dni = $_COOKIE[$name];

    $clientes = new Cliente($dni,"","","","","","");
    $cliente[]  = $clientes->obtenerCliente();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver grupo creado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1>Grupos creados</h1>

        <form method="post">
            <label>Nombre del grupo a ver</label>
            <input type="text" name="V_grupo"/>

            <button type="submit" class="btn btn-primary">Mostrar</button>
            <a class="btn btn-secondary" href="../PDO/Index.php">Volver al inicio</a>
        </form>
    </div>
    <div class=" d-flex flex-column justify-content-center  align-items-center">
        <h1>Grupo<?= " " . $name?> </h1>

        <?php foreach($cliente as $c):?>
        <ul>
            <li><?= $c ->getDni()?></li>
            <li><?= $c ->getNombre()?></li>
            <li><?= $c ->getDireccion()?></li>
            <li><?= $c ->getLocalidad()?></li>
            <li><?= $c ->getProvincia()?></li>
            <li><?= $c ->getTelefono()?></li>
            <li><?= $c ->getEmail()?></li>
        </ul>
        <a class="btn btn-primary" href="ModificarGrupo.php?=<?= $name ?>">Modificar</a>
        <?php endforeach;?>
    </div>
</body>
</html>