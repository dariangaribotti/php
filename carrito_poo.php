<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definición de clases

class Cliente {

    private $documento;
    private $nombre;
    private $correo;
    private $telefono;  
    private $descuento;
    
    public function __set($name, $value){$this->$name = $value;}
    public function __get($name){return $this->$name;}

    public function  __construct()
    {
        $this->descuento = 0.0;
    }
    public function imprimir(){}
}

class Producto {

    private $cod;
    private $nombre;
    private $precio;
    private $descripcion;
    private $iva;
    
    public function __set($name, $value){$this->$name = $value;}
    public function __get($name){return $this->$name;}

    public function __construct()
    {
        $this->precio = 0.0;
        $this->iva = 0.0;
    }
    public function imprimir(){
        
    }
}

class Carrito {

    private $cliente;
    private $aProductos;
    private $subTotal;
    private $total;

    public function __set($name, $value){$this->$name = $value;}
    public function __get($name){return $this->$name;}

    public function __construct( )
    {
        $this->aProductos = array();
        $this->subTotal = 0.0;
        $this->total = 0.0;
    }
    public function cargarProducto(){}
    public function imprimirTicket(){}
}

//Programa

$cliente1 = new Cliente();
$cliente1 -> documento = "45100200";
$cliente1 -> nombre = "Juan";
$cliente1 -> correo = "correo@gmail.com";
$cliente1 -> telefono = "+541143430099";
$cliente1 -> descuento = 0.1;
$cliente1 -> imprimir();

$producto1 = new Producto();
$producto1 -> cod = "AB7667";
$producto1 -> nombre = "Notebook Samsung Np300e";
$producto1 -> precio = 30800;
$producto1 -> descripcion = "Esto es una computadora Samsung";
$producto1 -> iva = 10.5;
$producto1 -> imprimir();

$producto2 = new Producto();
$producto2 -> cod = "QWR230";
$producto2 -> nombre = "Motorola G85 5G";
$producto2 -> precio = 20200;
$producto2 -> descripcion = "Esto es un telefono Motorola";
$producto2 -> iva = 21;
$producto2 -> imprimir();

$carrito = new Carrito();
$carrito -> cliente = $cliente1;
$carrito -> cargarProducto($producto1);
$carrito -> cargarProducto($producto2);
$carrito -> imprimirTicket(); //Imprime el ticket de la compra

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Carrito</title>
</head>
<body>
    <main class="container-fluid">
        <div class="row">
            <div class="col-3 mt-5 ms-5">
                <table class="table table-hover border">
                    <thead class="text-center">
                        <tr>
                            <th colspan="2">ECO MARKET</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Fecha</th>
                            <td>Hola</td>
                        </tr>
                        <tr>
                            <th>DNI</th>
                            <td>Hola</td>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Productos:</th>
                            <td>Hola</td>
                        </tr>
                        <tr>
                            <th>Descripcion:</th>
                            <td>Hola</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>Hola</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-3 mt-5 ms-5">
                <table class="table table-hover border">
                    <thead class="text-center">
                        <tr>
                            <th colspan="2">ECO MARKET</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Fecha</th>
                            <td>Hola</td>
                        </tr>
                        <tr>
                            <th>DNI</th>
                            <td>Hola</td>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <td>Hola</td>
                        </tr>
                        <tr>
                            <th>Productos:</th>
                            <td>Hola</td>
                        </tr>
                        <tr>
                            <th>Descripcion:</th>
                            <td>Hola</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>Hola</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>