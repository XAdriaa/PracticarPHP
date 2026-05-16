<?php
require_once 'Clientes.class.php';

$cliente = new Cliente("","","","","","","");
$clientes = $cliente->obtenerTodos();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mantenimiento de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1 class="text-center">MANTENIMIENTO DE CLIENTES</h1>
    <h5 class="text-center text-muted">con PDO y usando POO</h5>

    <table class="table table-striped table-bordered table-hover mt-4">
        <thead class="table-dark">
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Localidad</th>
                <th>Provincia</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $c): ?>
            <tr>
                <td><?= $c->getDni() ?></td>
                <td><?= $c->getNombre() ?></td>
                <td><?= $c->getDireccion() ?></td>
                <td><?= $c->getLocalidad() ?></td>
                <td><?= $c->getProvincia() ?></td>
                <td><?= $c->getTelefono() ?></td>
                <td><?= $c->getEmail() ?></td>
                <td><a href="editarcliente.php?dni=<?= $c->getDni() ?>">✏️</a></td>
                <td><a href="borrarcliente.php?dni=<?= $c->getDni() ?>">❌</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="clientenuevo.php" class="btn btn-primary">Nuevo Cliente</a>
</body>
</html>