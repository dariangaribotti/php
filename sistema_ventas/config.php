<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Iniciamos la session
session_start();

date_default_timezone_set('America/Argentina/Buenos_Aires');
//date_default_timezone_set("America/Bogota");


class Config {
    const BBDD_HOST = "127.0.0.1"; //127.0.0.1
    const BBDD_PORT = "3306"; //3306
    const BBDD_USUARIO = "root"; //root
    const BBDD_CLAVE = "";
    const BBDD_NOMBRE = "abmventas";

}


// Clases
class Persona extends Socio { // El plano, el molde, define como tiene que ser una persona.
    public $nombreCompleto;
    public $documento;
    public $fechaNac;
    public $telefono;
    public $edad;
    public $correo;
    public $nacionalidad;
    public $domicilio;
    // Son las acciones, las funciones.
    public function dormir(){}
    public function comer(){}
    public function ejercitar(){}
    public function __construct() //Predefine un objeto, es decir, les pone el mismo valor a todos los objetos, para no repetir en cada código la variable.
    {
        $this ->edad = "14";    
    }
}
class Socio {
    public $tipoMembresia;
    public $caducidad;
    public $lugar;
    public function insertar(){}
    public function modificar(){}
    public function eliminar(){}
    public function actualizar(){}
}

// Objetos

$alumno1 = new Persona();
$alumno1 -> nombreCompleto = "Darian Garibotti";
$alumno1 -> documento = "45204180";

$alumno2 = new Socio();
$alumno2 -> tipoMembresia = "Black";

print_r($alumno1);

?>