<?php
session_start();
if(!isset($_SESSION['dni'])){
    header("Location: ../Sesion/login.php");
    exit();
}

$nameCookie = $_GET["name"];

if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $nameCookie = $_POST['N_group'];
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar grupo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div>
        <form method ="post">
            <label>Nombre del grupo</label>
            <input type="text" name="N_group" value="<?=$nameCookie ?>"/>
        </form>
    </div>
    <div>

    </div>
</body>
</html>