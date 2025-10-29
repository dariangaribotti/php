<?php 

//Clase => Plano
//Propiedades => Definición
//Funciones => Acciones

class Persona{ //Nombre de la clase
    //Propiedades
    public $nombre;
    public $documento;
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
    public function imprimir(){
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Documento: " . $this->documento . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Nota de Portfolio: " . $this->notaPortfolio . "<br>";
        echo "Nota de Php: " . $this->notaPhp . "<br>";
        echo "Nota de Proyecto: " . $this->notaProyecto . "<br>";
        echo "Promedio: " . number_format($this->calcularPromedio(), 2, ".", ",") . "<br><br>";
    }
    public function calcularPromedio(){
        return ($this->notaPortfolio + $this->notaPhp + $this->notaProyecto) / 3;
    }
}

class Docente extends Persona {
    public $especialidad;
    public function imprimir(){}
    public function imprimirEspecialidadesHabilitadas(){}
}

$alumno1 = new Alumno();
$alumno1 -> nombre = "Luca";
$alumno1 -> documento = "45200100";
$alumno1 -> edad = "18";
$alumno1 -> nacionalidad = "Argentina";
$alumno1 -> notaPortfolio = 8;
$alumno1 -> notaPhp = 9;
$alumno1 -> notaProyecto = 7;
$alumno1 -> calcularPromedio();
$alumno1 -> imprimir();

$alumno2 = new Alumno();
$alumno2 -> nombre = "Lara";
$alumno2 -> documento = "41100200";
$alumno2 -> edad = 20;
$alumno2 -> nacionalidad = "Colombia";
$alumno2 -> notaPortfolio = 7;
$alumno2 -> notaPhp = 6;
$alumno2 -> notaProyecto = 9;
$alumno2 -> calcularPromedio();
$alumno2 -> imprimir();

?>