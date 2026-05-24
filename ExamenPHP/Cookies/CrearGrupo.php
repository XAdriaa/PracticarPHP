<?php
session_start();
if(!isset($_SESSION['dni'])){
    header("Location: ../Sesion/login.php");
    exit();
}

$dni = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['N_Grupo'];
    $dni = $_POST['dni'];


    setcookie($name,$dni,time() + 3600);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de grupos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex justify-content-center flex-column align-items-center">
        <h1 class="text-center">Crear grupo</h1>

        <form method="POST" class="mt-5 d-flex flex-column gap-3">
            <label class="">Nombre del grupo</label>
            <input type="text" name="N_Grupo"/>

            <label>Cliente</label>
            <input type="text" name="dni"/>

            <button class="btn btn-primary" type="submit">Crear Grupo</button>
            <a class="btn btn-warning" href="../PDO/Index.php">Volver al inicio</a>
            <a  class="btn btn-secondary" href="VerGrupos.php">Ver grupos</a>
            <a class="btn btn-secondary" href="ModificarGrupo.php">Modificar grupos</a>
        </form>
    </div>
</body>
</html>