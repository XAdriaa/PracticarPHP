<?php
session_start();
if(!isset($_SESSION)){
    header("Location: ../Sesion/Login.php");
    exit();
}
require_once 'Clientes.class.php';

$dni = $_GET['dni'];

$datos = new Cliente($dni,"","","","","","");
$cliente[] = $datos -> obtenerCliente();


if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_POST['id'];
    $dni = $_POST['dni'];
    if($id === 'cancelar'){
        header('Location: Index.php');
    } elseif ($id === 'borrar') {
        $accion = new Cliente($dni,"","","","","","");
        $accion -> borrarCliente();
        header("Location: Index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex justify-content-center flex-column align-items-center">
        <h1 class="text-center">Borrar Cliente</h1>
        <h4 class="text-center">Seguro que quiere eliminar el cliente</h4>

        <ul class="mx-auto d-flex gap-5 text-danger">
            <?php foreach($cliente as $d): ?>
            <li><?= $d -> getDni()?></li>
            <li><?= $d -> getNombre()?></li>
            <li><?= $d -> getDireccion()?></li>
            <li><?= $d -> getLocalidad()?></li>
            <li><?= $d -> getProvincia()?></li>
            <li><?= $d -> getTelefono()?></li>
            <li><?= $d -> getEmail()?></li>
            <?php endforeach;?>
        </ul>

        <form method="POST">
                <button type="submit" name="id" value="borrar">Borrar</button>
                <button type="submit" name="id" value="cancelar">Cancelar</button>
                <input type="hidden" name="dni" value="<?= $dni ?>"/>
        </form>
    </div>
</body>
</html>