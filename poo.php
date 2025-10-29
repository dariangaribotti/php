<?php 

//Clase => Plano
//Propiedades => Definición
//Funciones => Acciones

class Persona{ //Nombre de la clase
    //Propiedades
    public $documento;
    public $nombre;
    public $edad;
    public $nacionalidad;
    //Acciones
    public function imprimir(){}
}

class Alumno extends Persona {
    public $legajo;
    public $notaPortfolio;
    public $notaPhp;
    public $notaProyecto;
    public function __construct()
    {
        $this -> notaPortfolio = 0.0;
        $this -> notaPhp = 0.0;
        $this -> notaProyecto = 0.0;
    }
    //public function imprimir(){}
    public function calcularPromedio(){}
}

class Docente extends Persona {
    public $especialidad;
    //public function imprimir
    public function imprimirEspecialidadesHabilitadas(){}
}

$alumno1 = new Persona();
$alumno1 -> documento = "45204180";

$alumno2 = new Alumno();
$alumno2 -> legajo = "documentacion";

$alumno3 = new Docente();
$alumno3 -> especialidad = "Informatica";

print_r($alumno1);
print_r($alumno2);
print_r($alumno3);

?>