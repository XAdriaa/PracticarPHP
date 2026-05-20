<?php
require_once 'Clientes.class.php';

$dni = $_GET["dni"];

$pdo = new Cliente($dni,"","","","","","");

$datos[] = $pdo ->obtenerCliente();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];
    $provincia = $_POST['provincia'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $modCliente = new Cliente($dni,$nombre,$direccion,$localidad,$provincia,$telefono,$email);
    $modCliente->editarCliente();
    header('Location: Index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex w-75 mx-auto justify-content-center flex-column border bg-dark text-light mb-4">
        <h1 class="text-center">Datos viejos</h1>
        <table class="table w-75 mx-auto">
            <thead>
                <tr>
                    <td>DNI</td>
                    <td>Nombre</td>
                    <td>Direccion</td>
                    <td>Localidad</td>
                    <td>Provincia</td>
                    <td>Telefono</td>
                    <td>e-mail</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach($datos as $d): ?>
                        <td><?= $d -> getDni() ?></td>
                        <td><?= $d -> getNombre() ?></td>
                        <td><?= $d -> getDireccion() ?></td>
                        <td><?= $d -> getLocalidad() ?></td>
                        <td><?= $d -> getProvincia() ?></td>
                        <td><?= $d -> getTelefono() ?></td>
                        <td><?= $d -> getEmail() ?></td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex w-75 mx-auto justify-content-center flex-column">
        <h1>Datos nuevos</h1>
        <form method="POST" class="d-flex flex-column">
            <?php foreach($datos as $d):?>
            <input type="hidden" id="dni" name="dni" value="<?= $d -> getDni() ?>" />

            <label>Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?= $d ->getNombre() ?>"/>

            <label>Direccion</label>
            <input type="text" id="direccion" name="direccion" value="<?= $d ->getDireccion() ?>"/>

            <label>Localidad</label>
            <input type="text" id="localidad" name="localidad" value="<?= $d ->getLocalidad() ?>"/>

            <label>Provincias</label>
            <input type="text" id="provincia" name="provincia" value="<?= $d ->getProvincia() ?>"/>
            
            <label>Telefono</label>
            <input type="text" id="telefono" name="telefono" value="<?= $d ->getTelefono() ?>"/>
            
            <label>Email</label>
            <input type="text" id="email" name="email" value="<?= $d ->getEmail() ?>"/>

            <button class="btn btn-primary  mt-5">Modificar</button>
            <?php endforeach;?>
        </form>
    </div>
</body>
</html>