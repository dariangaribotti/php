<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
$aAgenda = array(); //
$aAgenda[0] = array(); //Dias-primera-fila
$aAgenda[1] = array(); //Estado-segunda-fila

$aAgenda[0][0] = "Lu";
$aAgenda[0][1] = "Mar";
$aAgenda[0][2] = "Mier";
$aAgenda[0][3] = "Jue";
$aAgenda[0][4] = "Vier";

$aAgenda[1][0] = "Curso";
$aAgenda[1][1] = "Libre";
$aAgenda[1][2] = "Curso";
$aAgenda[1][3] = "Libre";
$aAgenda[1][4] = "Curso";

print_r($aAgenda);

$aArray = array(
    array("Lunes", "Martes", "Miercoles", "Jueves"),
    array("Libre", "Ocupado", "Libre", "Ocupado")
);

print_r($aArray);

// El auto Ford del año 1908 es de color Negro y su precio es USD 800 a USD 1000
// Concatenacion [.]

$aAuto = array();
$aAuto["marca"] = "Ford";
$aAuto["color"] = array("Negro", "Verde"); 
$aAuto["anio"] = 1908;
$aAuto["precio"] = "USD 800 a USD 1000";

// echo "El auto " . $aAuto["marca"] . " del año " . $aAuto["anio"] . " es de color " . $aAuto["color"][1] . " y su precio es " . $aAuto["precio"];

$nombre = "juan";
$apellido = "gabriel";

// echo "Me llamo $nombre $apellido";

// Suma - Operadores

$num1 = 50;
$num2 = 10;
$resultado = $num1 + $num2;

echo $resultado;

// Caracteres escapados

$num1 = 50;
$num2 = 10;

echo "El numero de \$num1 es $num1"; // Contra barra => \\

// Operadores logicos

// Control de flujo => Condicional True or False

$bVariable = true;

if ( $bVariable == true ) {
    echo "Hola mundo!";
}

// Sentencias condicionales

$edad = 17;

if ( $edad >= 18 ) {

    echo "Es mayor de edad";

} else {
    echo "Es menor de edad";
}

// Booleanos

$stock = 800;
$venta = 1;

if ( $venta ) {
    $stock--;
}

echo $stock;

// Bucle

$stock  = 20;

while ( $stock > 0 ){
    echo "El stock es $stock <br>";
    $stock--;
}

echo "Stock agotado";

// funciones

function unir($cadena1, $cadena2){
    return "$cadena1 $cadena2"; 
}

$resultado = unir("El libro viejo", "El nuevo mundo");

echo $resultado;

function saludar($nombre, $apellido = ""){
    return "Hola mi nombre es $nombre $apellido";
}

echo saludar("Ricardo", "Moralez");

// Ámbito local y Ámbito global
// Mala practica

$bruto = 7000; // Ámbito global

function calcularNeto(){ //Aca no esta bien, seria mejor ponerlo como parámetro.
    global $bruto; // Ámbito local
    return $bruto - $bruto * 0.17;
}

echo calcularNeto();

// Buena practica

$bruto = 2000;

function calcularNeto($bruto){ // Lo puse como parámetros.
    return $bruto - $bruto * 0.17;
}

echo calcularNeto($bruto);

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

*/

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
    
</body>
</html>