<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Argentina/Buenos_Aires');

class Tarjeta {
    private $nombreTitular;
    private $numero;
    private $fechaEmision;
    private $fechaVto;
    private $tipo;
    private $cvv;

    public function __get($name){return $this->$name;}
    public function __set($name, $value){$this->$name = $value;}

    public function __construct($tipo, $numero, $fechaEmision, $fechaVto, $cvv){
        $this->tipo = $tipo;
        $this->numero = $numero;
        $this->fechaEmision = $fechaEmision;
        $this->fechaVto = $fechaVto;
        $this->cvv = $cvv;
    }

    const TIPO_VISA = "VISA";
    const TIPO_MC = "Mastercard";
    const TIPO_AMEX = "American Express";
}

abstract class Persona {
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __get($name){return $this->$name;}
    public function __set($name, $value){$this->$name = $value;}

    abstract public function imprimir(); //Al usar este metodo, obliga a la clase hija a que use el metodo imprimir.
}

class Socio extends Persona {
    private $aTarjetas;
    private $bActivo;
    private $fechaAlta;
    private $fechaBaja;

    public function __construct(){
        $this->aTarjetas = array();
        $this->bActivo = true;
        $this->fechaAlta = date("d/m/Y");
    }

    public function agregarTarjeta($tarjeta){
        $this->aTarjetas[] = $tarjeta;
    }
    public function darDeBaja($fechaVto){

        $timestamp = time();

        $fechaVencimiento = "last day of " . $fechaVto;

        $timestampVto = strtotime($fechaVencimiento);

        if($timestamp > $timestampVto){
            return "<span class='badge bg-danger'>VENCIDA</span>";
        } else {
            return "<span class='badge bg-success'>ACTIVA</span>";
        }

    }
    public function imprimir(){ //Si en la clase padre, se usa un abstract en el metodo imprimir, si no hay nada, se ejecuta igual, pero si esta borrado el metodo, causa un error.
        echo "<table class='table table-striped table-hover table-bordered border' style='width:1300px;'>";
        echo "<thead>
                    <tr class='text-start table-dark'>
                        <th colspan='10'>Socios</th>
                    </tr>
                    <tr>
                        <th>Nombre: </th>
                        <th>Documento: </th>
                        <th>Correo: </th>
                        <th>Celular: </th>
                        <th>Tipo: </th>
                        <th>Numero: </th>
                        <th>Fecha Emision: </th>
                        <th>Fecha Vto: </th>
                        <th>CVV: </th>
                        <th>Estado: </th>
                    </tr>
                </thead>
                <tbody>";
                    foreach($this->aTarjetas as $tarjeta){
                    echo "<tr>
                            <td>" . $this->nombre . "</td>
                            <td>" . $this->dni . "</td>
                            <td>" . $this->correo . "</td>
                            <td>" . $this->celular . "</td>
                            <td>" . $tarjeta->tipo . "</td>
                            <td>" . $tarjeta->numero . "</td>
                            <td>" . $tarjeta->fechaEmision . "</td>
                            <td>" . $tarjeta->fechaVto . "</td>
                            <td>" . $tarjeta->cvv . "</td>
                            <td>". $this->darDeBaja($tarjeta->fechaVto) . "</td>
                        </tr>";
                        }
        echo "</tbody>
            </table>";
    }
}

$tarjeta1 = new Tarjeta(Tarjeta::TIPO_VISA, "4301861302107407", "10/08/2025", "10/08/2026", "760");
$tarjeta2 = new Tarjeta(Tarjeta::TIPO_MC, "5234004863672316", "14/08/2024", "14/08/2020", "455");
$tarjeta3 = new Tarjeta(Tarjeta::TIPO_AMEX, "370715463688713", "09/03/2025", "09/03/2030", "531");

$socio1 = new Socio();
$socio1->dni = "45200100";
$socio1->nombre = "Ana Valle";
$socio1->correo = "ana@correo.com";
$socio1->celular = "1145403040";
$socio1->agregarTarjeta($tarjeta1);
$socio1->agregarTarjeta($tarjeta2);
$socio1->agregarTarjeta($tarjeta3);

$socio2 = new Socio();
$socio2->dni = "45100200";
$socio2->nombre = "Bernabbe Paz";
$socio2->correo = "bernabe@correo.com";
$socio2->celular = "1145504050";
$socio2->agregarTarjeta(new Tarjeta(Tarjeta::TIPO_VISA, "4209233088505639", "13/04/2024", "07/04/2026", "747"));
$socio2->agregarTarjeta(new Tarjeta(Tarjeta::TIPO_AMEX, "5153968253168084", "15/07/2024", "11/08/2020", "667"));

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Socios</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-6 pt-5">
                <?php $socio1->imprimir(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-6 py-5">
                <?php $socio2->imprimir(); ?>
            </div>
        </div>
    </main>
</body>
</html>