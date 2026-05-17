<?php
require_once 'Conexion.class.php';


class Cliente {
    private $dni;
    private $nombre;
    private $direccion;
    private $localidad;
    private $provincia;
    private $telefono;
    private $email;

    // Constructor
    public function __construct($dni, $nombre, $direccion, $localidad, $provincia, $telefono, $email) {
        $this->dni       = $dni;
        $this->nombre    = $nombre;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->provincia = $provincia;
        $this->telefono  = $telefono;
        $this->email     = $email;
    }

    // Getters
    public function getDni()       { return $this->dni; }
    public function getNombre()    { return $this->nombre; }
    public function getDireccion() { return $this->direccion; }
    public function getLocalidad() { return $this->localidad; }
    public function getProvincia() { return $this->provincia; }
    public function getTelefono()  { return $this->telefono; }
    public function getEmail()     { return $this->email; }

    // Setters
    public function setNombre($nombre)       { $this->nombre    = $nombre; }
    public function setDireccion($direccion) { $this->direccion = $direccion; }
    public function setLocalidad($localidad) { $this->localidad = $localidad; }
    public function setProvincia($provincia) { $this->provincia = $provincia; }
    public function setTelefono($telefono)   { $this->telefono  = $telefono; }
    public function setEmail($email)         { $this->email     = $email; }


    public function obtenerTodos() {
        $pdo = Conexion::pdo();
        
        $clientes = [];
        $stmt = $pdo->prepare("SELECT * FROM clientes");
        $stmt -> execute();
        
        while ($fila = $stmt->fetch()) {
            $cliente = new Cliente(
                $fila['DNI'],
                $fila['Nombre'],
                $fila['Direccion'],
                $fila['Localidad'], 
                $fila['Provincias'],
                $fila['Telefono'], 
                $fila['e-mail']
            );
            $clientes[] = $cliente;
        }
        return $clientes;
    }

    public static function exiteDNI($p_dni){
        try{
        $pdo = Conexion::pdo();

        

        $stmt = $pdo->prepare("SELECT DNI FROM clientes WHERE DNI = :dni");
        $stmt-> execute(
            [':dni' => $p_dni]
        );

        if($stmt -> rowCount()){
            $existe = true;
            return $existe;
        } else {
            $existe = false;
            return $existe;
        }
        }catch(PDOException $e){
            echo"Error en la comprobacion de los DNI". $e->getMessage();
        }
    }

    public function clienteNuevo(){
        try{

        $pdo = Conexion::pdo();

        $stmt = $pdo->prepare(
        "INSERT INTO clientes(DNI,Nombre,Direccion,Localidad,Provincias,Telefono,`e-mail`)
        VALUES(:dni,:nombre,:direccion,:localidad,:provincia,:telefono,:email)");
        $stmt -> execute(
            [
            ":dni"          => $this->dni,
            ":nombre"       => $this->nombre,
            ":direccion"    => $this->direccion,
            ":localidad"    => $this->localidad,
            ":provincia"    => $this->provincia,
            ":telefono"     => $this->telefono,
            ":email"        => $this->email
            ]
        );
        } catch(PDOException $e){
            echo "Error en al insercion de los datos" . $e->getMessage();
        }
    }

    public function obtenerCliente(){
        try{


        $pdo = Conexion::pdo();

        $stmt = $pdo->prepare("SELECT * FROM clientes WHERE DNI = :dni");
        $stmt -> execute([
            ":dni" => $this -> dni
        ]);

        while($fila = $stmt->fetch()){
            $cliente = new Cliente(
                $fila['DNI'],
                $fila['Nombre'],
                $fila['Direccion'],
                $fila['Localidad'],
                $fila['Provincias'],
                $fila['Telefono'],
                $fila['e-mail']
            );

            return $cliente;
        }

        

        }catch(PDOException $e){
            echo "Fallo en la consulta de obtenmcion de datos dfe cliente en concreto" . $e->getMessage();
        }
    }
}
?>