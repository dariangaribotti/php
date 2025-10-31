<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Persona{ //Plano o el molde
    //Propiedades
    protected $nombre;
    protected $documento;
    protected $edad;
    protected $nacionalidad;
    //Acciones o métodos
    public function __destruct()
    {
        echo "Destruyendo el objeto de " . $this->nombre;
    }
    public function imprimir(){}

    public function setNombre($nombre){$this->nombre = $nombre;}
    public function getNombre(){return $this->nombre;}

    public function setDocumento($documento){$this->documento = $documento;}
    public function getDocumento(){return $this->documento;}

    public function setEdad($edad){$this->edad = $edad;}
    public function getEdad(){ return $this->edad;}

    //public function setNacionalidad($nacionalidad){$this->nacionalidad = $nacionalidad;} 
    //public function getNacionalidad(){return $this->nacionalidad;}
    // No pasa nada si no esta, como los hijos contienen __set y _get tambien se le aplica, entonces no es util en php tener las funciones anteriores.
}

//Public = Acceso desde cualquier lugar (Clase, Hijos, Objeto)
//Private = Acceso SÓLO desde la misma Clase (Persona).
//Protected = Acceso desde la Clase y sus Hijos

class Alumno extends Persona { //Herencia, sirve para reutilizar el codigo
    private $legajo;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;

    public function __construct()
    {
        $this -> notaPortfolio = 0.0;
        $this -> notaPhp = 0.0;
        $this -> notaProyecto = 0.0;
    }

    public function __set($name, $value){$this->$name = $value;} // Al usar la function __set y __get -> mas cómodo y no repetís a cada rato funciones.
    public function __get($name){return $this->$name;}

    public function setPortfolio($nota){$this-> notaPortfolio = $nota;} // Menos comodo, hay que repetir continuamente. En otros lenguajes si o si se usa asi, pero en este caso, no es necesario.
    public function getPortfolio(){ return $this->notaPortfolio;}

    public function setPhp($nota){$this-> notaPhp = $nota;}
    public function getPhp(){ return $this->notaPhp;}

    public function setProyecto($nota){$this-> notaProyecto = $nota;}
    public function getProyecto(){return $this->notaProyecto;}
    /*
    public function __construct($pais) //Parametrizado, sirve para predefinir un valor o atributo.
    {
        $this->nacionalidad = $pais;
    }
    */

    public function __destruct()
    {
        echo "Destruyendo el objeto de " . $this->nombre . "<br>"; //Se destruye a lo inverso
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
    private $especialidad;
    const ESPECIALIDAD_WP = "Wordpress"; //Sirve para almacenar y aplicarlo como valor o atributo, es util para la ortografía.
    const ESPECIALIDAD_ECO = "Economía Aplicada";
    const ESPECIALIDAD_BBDD = "Base de datos";

    public function __set($name, $value){$this->$name = $value;}
    public function __get($name){return $this->$name;}

    public function setEspecialidad($especialidad){$this->especialidad = $especialidad;}
    public function getEspecialidad(){return $this->especialidad;}

    public function __destruct()
    {
        echo "Destruyendo el objeto de " . $this->nombre . "<br>";
    }

    public function imprimir(){
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Especialidad: " . $this->especialidad . "<br><br>";
    }

    public function imprimirEspecialidadesHabilitadas(){
        echo "Un docente puede tener las siguiente especialidades: <br>";
        echo "Especialidad 1: " . self::ESPECIALIDAD_WP . "<br>";
        echo "Especialidad 2: " . self::ESPECIALIDAD_ECO . "<br>";
        echo "Especialidad 3: " . self::ESPECIALIDAD_BBDD . "<br><br>";
    }
}

//Programa
//Objeto 1
$alumno1/*Objeto 1*/ = new Alumno/*Creación del Objeto 1*/(/*"Argentina" */); //Parametrizado
$alumno1/*Objeto 1*/ -> setNombre("Luca");
$alumno1/*Objeto 1*/ -> setDocumento("45200100");
$alumno1 -> setEdad(18);
$alumno1 -> nacionalidad = "Argentina"; // Al usar la function __set y __get -> mas cómodo y no repetís a cada rato funciones
$alumno1 -> setPortfolio(8); 
$alumno1 -> setPhp(9);
$alumno1 -> setProyecto(7);
$alumno1 -> calcularPromedio();
$alumno1 -> imprimir();


//Objeto 2
$alumno2/*Objeto 2*/ = new Alumno(); /*Creación del Objeto 2*/
$alumno2 -> setNombre("Lara");
$alumno2 -> documento = "41500200";
$alumno2 -> setEdad(20);
$alumno2 -> nacionalidad = "Colombia";
$alumno2 -> setPortfolio(7);
$alumno2 -> setPhp(6);
$alumno2 -> setProyecto(9);
$alumno2 -> calcularPromedio();
$alumno2 -> imprimir();

$docente1 = new Docente();
$docente1 -> nombre = "Juan";
$docente1 -> setEspecialidad("Informática");
$docente1 -> imprimir();
$docente1 -> imprimirEspecialidadesHabilitadas();

?>