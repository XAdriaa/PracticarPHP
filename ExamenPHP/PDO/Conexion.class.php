<?php

class conexion {
    private $host   = 'mysql';
    private $db     = 'tienda';
    private $user   = 'root';
    private $passw  = 'root';

    private function __constructor($host,$db,$user,$passw){
        $this->mysql    =$host;
        $this->tienda   =$db;
        $this->root     =$user;
        $this->root     =$passw;
    }


    public function pdo(){
        try{
        $con    = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->passw);
        $con    ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
        } catch(PDOException $e){
            echo "Error al realizar la conexion" . $e->getMessage();
        }
    }
}


?>