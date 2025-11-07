<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Clase {
    private $nombre;
    private $entrenador;
    private $aAlumnos;

    public function __get($name){ $this->$name;}
    public function __set($name, $value){$this->$name = $value;}

    public function __construct()
    {
        $this->aAlumnos = array();
    }
    public function asignarEntrenador(){}
    public function inscribirAlumno(){}
    public function imprimirListado(){}
}

class Persona {
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;
}

class Alumno extends Persona{
    private $fechaNac;
    private $peso;
    private $altura;
    private $aptoFisico;
    private $presentismo;

    public function __get($name){ $this->$name;}
    public function __set($name, $value){$this->$name = $value;}

    public function __construct($dni, $nombre, $correo, $celular)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->celular = $celular;
    }
    public function setFichaMedica(){}
}

class Entrenador extends Persona {
    private $aClases;

    public function __get($name){ $this->$name;}
    public function __set($name, $value){$this->$name = $value;}

    public function __construct($dni, $nombre, $correo, $celular)
    {
        $this->aClases = array();
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->celular = $celular;
    }
}

$entrenador1 = new Entrenador("340200300", "Miguel Ocampo", "miguel@mail.com", "11445522");
$entrenador2 = new Entrenador("259569459", "Andrea Zarate", "andrea@mail.com", "11490954");

$alumno1 = new Alumno("205400300", "Dante Montera", "dante@mail.com", "1143553323");
$alumno1 ->setFichaMedica();
$alumno1 ->presentismo = 78;

$alumno2 = new Alumno("203123423", "Dario Turchi", "dario@mail.com", "115345343");
$alumno2 ->setFichaMedica();
$alumno2 ->presentismo = 67;

$alumno3 = new Alumno("264340034", "Facundo Fagnano", "facundo@mail.com", "1155534344");
$alumno3 ->setFichaMedica();
$alumno3 ->presentismo = 34;

$alumno4 = new Alumno("45343400", "Gaston Aguilar", "gaston@mail.com", "117756568");
$alumno4 ->setFichaMedica();
$alumno4 ->presentismo = 54;

$clase1 = new Clase();
$clase1->nombre = "Funcional";
$clase1->asignarEntrenador($entrenador1);
$clase1->inscribirAlumno($alumno1);
$clase1->inscribirAlumno($alumno3);
$clase1->inscribirAlumno($alumno4);

$clase2 = new Clase();
$clase2->nombre = "Zumba";
$clase2->asignarEntrenador($entrenador2);
$clase2->inscribirAlumno($alumno1);
$clase2->inscribirAlumno($alumno2);
$clase2->inscribirAlumno($alumno3);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gimnasio</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <?php $clase1->imprimirListado(); 
                      $clase2->imprimirListado(); ?>
            </div>
        </div>
    </main>
</body>
</html>