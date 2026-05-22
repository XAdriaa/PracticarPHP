<?php
session_start();
if(!isset($_SESSION)){
    header("Location: ../Sesion/Login.php");
    exit();
}
require_once 'Clientes.class.php';

$errores = [];


//recibir datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni        = $_POST['dni'];
    $nombre     = $_POST['nombre'];
    $direccion  = $_POST['direccion'];
    $localidad  = $_POST['localidad'];
    $telefono   = $_POST['telefono'];
    $provincia  = $_POST['provincia'];
    $email      = $_POST['email'];

    $existDni = Cliente::exiteDNI($dni);

    $errores = validaciones($dni,$nombre,$email,$existDni,$telefono);

    if(empty($errores)){
    $newCliente = new Cliente($dni,$nombre,$direccion,$localidad,$provincia,$telefono,$email);
    $newCliente ->clienteNuevo();
    header('Location: Index.php');
    }
}



//validaciones
function validaciones($dni,$nombre,$email,$existDni,$telefono){
    
    $errores = [];
    

    if (empty($dni) || empty($nombre) || empty($email)){
        $errores[] = "Los campos dni,nombre y email son obligatorios";
        var_dump($dni);
    }
    if(preg_match('/^[0-9]{8}[A-Za-z]$/', $dni) === 0){
        $errores[] = "El formato del dni es incorrecto";
    }
    if(preg_match('/^[0-9]{9}$/',$telefono) === 0){
        $errores[] = "El formato del telefono es incorrecto";
    }
    if($existDni){
        $errores[] = "dni ya registrado";
    }

        return $errores;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente nuevo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="w-75 m-auto">
        <form method = "POST" class="d-flex flex-column justify-content-center">
            <label>DNI</label>
            <input type="text" id="dni" name="dni"/>

            <label>Nombre</label>
            <input type="text" id="nombre" name="nombre"/>
            
            <label>Direccion</label>
            <input type="text" id="direccion" name="direccion"/>

            <label>Localidad</label>
            <input type="text" id="localidad" name="localidad"/>

            <label>Provincias</label>
            <input type="text" id="provincia" name="provincia"/>

            <label>Telefono</label>
            <input type="text" id="telefono" name="telefono"/>

            <label>e-mail</label>
            <input type="text" id="email" name="email"/>

            <button class="btn btn-primary mt-2" type="submit">Enviar</button>

            <?php foreach($errores as $e): ?>
                <p class="text-danger"><?= $e ?></p>
            <?php endforeach ?>
        </form>
    </div>
</body>
</html>