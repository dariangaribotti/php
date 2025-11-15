<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Clase {
    private $nombre;
    private $entrenador;
    private $aAlumnos;

    public function __set($name, $value){$this->$name = $value;}
    public function __get($name){return $this->$name;}

    public function __construct()
    {
        $this->aAlumnos = array();
    }
    public function asignarEntrenador($entrenador){
        $this->entrenador = $entrenador;
    }
    public function inscribirAlumno($alumno){
        $this->aAlumnos[] = $alumno;
    }
    public function imprimirListado(){
        echo "<table class='table table-bordered table-hover table-striped'>
                <thead class='table-dark'>
                    <tr class='text-center'>
                        <th colspan='4'>Clase: " . $this->nombre . "</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th colspan='2'>Entrenador: </th>
                        <td colspan='2'>" . $this->entrenador->nombre . "</td>
                    </tr>
                    <tr>
                        <th colspan='4'>Alumnos inscriptos: </th>
                    </tr>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Celular</th>
                    </tr>";
                    foreach($this->aAlumnos as $alumno){
                        echo "<tr>
                                <td>" . number_format($alumno->dni, 0, ".", ".") . "</td>
                                <td>" . $alumno->nombre . "</td>
                                <td>" . $alumno->correo . "</td>
                                <td>" . $alumno->celular . "</td>
                            </tr>";
                    }
            echo "</tbody>
            </table>";
    }
}

abstract class Persona {
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __set($name, $value){$this->$name = $value;}
    public function __get($name){return $this->$name;}

    public function __construct($dni, $nombre, $correo, $celular) 
    {
    $this->dni = $dni;
    $this->nombre = $nombre;
    $this->correo = $correo;
    $this->celular = $celular;
    }
}


class Alumno extends Persona{
    private $fechaNac;
    private $peso;
    private $altura;
    private $aptoFisico;
    private $presentismo;

    public function __set($name, $value){$this->$name = $value;}
    public function __get($name){return $this->$name;}

    public function __construct($dni, $nombre, $correo, $celular, $fechaNac)
    {
        parent::__construct($dni, $nombre, $correo, $celular); //Parent Permite usarlo desde la clase Padre, no se repite codigo

        $this->peso = 0.0;
        $this->altura = 0.0;
        $this->aptoFisico = false;
        $this->presentismo = 0.0;

        $this->fechaNac = $fechaNac;
    }
    public function setFichaMedica($peso, $altura, $aptoFisico){
        $this->peso = $peso;
        $this->altura = $altura;
        $this->aptoFisico = $aptoFisico;
    }
}

class Entrenador extends Persona {
    private $aClases;

    public function __get($name){return $this->$name;}
    public function __set($name, $value){$this->$name = $value;}

    public function __construct($dni, $nombre, $correo, $celular)
    {
        parent::__construct($dni, $nombre, $correo, $celular); //Parent Permite usarlo desde la clase Padre, no se repite codigo

        $this->aClases = array();
    }
    public function asignarClase($clase){
        $this->aClases = $clase;
    }
}

$entrenador1 = new Entrenador("34200300", "Miguel Ocampo", "miguel@mail.com", "114455 22");
$entrenador2 = new Entrenador("25569459", "Andrea Zarate", "andrea@mail.com", "11490954");

$alumno1 = new Alumno("20400300", "Dante Montera", "dante@mail.com", "1143553323", "1997-04-26");
$alumno1->setFichaMedica(90, 160, true);
$alumno1->presentismo = 78;

$alumno2 = new Alumno("20123423", "Dario Turchi", "dario@mail.com", "115345343", "1997-04-26");
$alumno2->setFichaMedica(73, 168, false);
$alumno2->presentismo = 67;

$alumno3 = new Alumno("24340034", "Facundo Fagnano", "facundo@mail.com", "1155534344", "1997-04-26");
$alumno3->setFichaMedica(90, 187, true);
$alumno3->presentismo = 96;

$alumno4 = new Alumno("45343400", "Gaston Aguilar", "gaston@mail.com", "117756568", "1997-04-26");
$alumno4->setFichaMedica(70, 169, false);
$alumno4->presentismo = 98;

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Gimnasio</title>
</head>
<body>
    <main class="container">
        <div class="row text-center py-4">
            <h1>Gimnasio</h1>
        </div>
        <div class="row">
            <div class="col-12 py-4">
                <?php $clase1->imprimirListado(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12 py-5">
                <?php $clase2->imprimirListado(); ?>
            </div>
        </div>
    </main>
</body>
</html>