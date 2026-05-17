<?php
require_once 'Clientes.class.php';

$dni = $_GET["dni"];

$pdo = new Cliente($dni,"","","","","","");

$datos[] = $pdo ->obtenerCliente();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $Localidad = $_POST['localidad'];
    $Provincia = $_POST['provincia'];
    $Telefono = $_POST['telefono'];
    $email = $_POST['email'];

    
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
            <label>Nombre</label>
            <input type="text" id="nombre" name="nombre"/>

            <label>Direccion</label>
            <input type="text" id="direccion" name="direccion"/>

            <label>Localidad</label>
            <input type="text" id="localidad" name="localidad"/>

            <label>Provincias</label>
            <input type="text" id="provincias" name="provincias"/>
            
            <label>Telefono</label>
            <input type="text" id="telefono" name="telefono"/>
            
            <label>Email</label>
            <input type="text" id="email" name="email"/>

            <button class="btn btn-primary  mt-5">Modificar</button>
        </form>
    </div>
</body>
</html>