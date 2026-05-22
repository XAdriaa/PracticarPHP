<?php
class conexion {

    public static function pdo(){

        $host   = 'mysql';
        $db     = 'tienda';
        $user   = 'root';
        $passw  = 'root';

        try{
        $con    = new PDO("mysql:host=$host;dbname=$db",$user,$passw);
        $con    ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
        } catch(PDOException $e){
            echo "Error al realizar la conexion" . $e->getMessage();
        }
    }
}


?>