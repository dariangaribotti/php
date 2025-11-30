<?php 

class Venta {
    private $idventa;
    private $fk_idcliente;
    private $fk_idproducto;
    private $fecha;
    private $cantidad;
    private $preciounitario;
    private $total;

    public function __set($name, $value){$this->$name = $value; return $this;}
    public function __get($name){return $this->$name;}

    public function insertar(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);

        $sql = "INSERT INTO ventas (
                    fk_idcliente,
                    fk_idproducto,
                    fecha,
                    cantidad,
                    preciounitario,
                    total
                    ) VALUES (
                    '$this->fk_idcliente',
                    '$this->fk_idproducto',
                    '$this->fecha',
                    '$this->cantidad',
                    '$this->preciounitario',
                    '$this->total'
                    )";

        if(!$mysqli->query($sql)){
            printf("Error en query%s\n", $mysqli->error . " " . $sql);
        }

        $mysqli->close();
    }
    public function actualizar(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_NOMBRE, Config::BBDD_CLAVE, Config::BBDD_PORT);

        $sql = "UPDATE ventas SET
                    fk_idcliente = '$this->fk_idcliente',
                    fk_idproducto = '$this->fk_idproducto',
                    fecha = '$this->fecha',
                    cantidad = '$this->cantidad',
                    preciounitario = '$this->preciounitario',
                    total = '$this->total'
                WHERE idventa = " . $this->idventa;
            
        if(!$mysqli->query($sql)){
            printf("Error en query%s\n", $mysqli->error . " " . $sql);
        }

        $mysqli->close();
    }
    public function eliminar(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_NOMBRE, Config::BBDD_CLAVE, Config::BBDD_PORT);

        $sql = "DELETE FROM venta
                WHERE idventa = '$this->idventa'
                ";

        if($mysqli->query($sql)){
            printf("Error en query%s\n", $mysqli->error . " " . $sql);
        }
    }
    public function obtenerPorId(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_NOMBRE, Config::BBDD_CLAVE, Config::BBDD_PORT);

        $sql = "SELECT idventa,
                        fk_idcliente,
                        fk_idproducto,
                        fecha,
                        cantidad,
                        preciounitario,
                        total
                FROM ventas
                WHERE idventa = $this->idventa";
        
        if(!$resultado = $mysqli->query($sql)){
            printf("Error en query%s\n", $mysqli->error . " " . $sql);
        }

        if($fila = $resultado->fetch_assoc()){
            $this->idventa = $fila["idventa"];
            $this->fk_idcliente = $fila["fk_idcliente"];
            $this->fk_idproducto = $fila["fk_idproducto"];
            $this->fecha = $fila["fecha"];
            $this->cantidad = $fila["cantidad"];
            $this->preciounitario = $fila["preciounitario"];
            $this->total = $fila["total"];
        }

        $mysqli->close();
    }
        
    public function obtenerTodos(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_NOMBRE, Config::BBDD_CLAVE, Config::BBDD_PORT);

        $sql = "SELECT idventa,
                        fk_idcliente,
                        fk_idproducto,
                        fecha,
                        cantidad,
                        preciounitario,
                        total
                FROM ventas";
        
        if(!$resultado = $mysqli->query($sql)){
            printf("Error en query%s\n", $mysqli->error . " " . $sql);
        }
        $aResultado = array();

        if($resultado){
            while($fila = $resultado->fetch_assoc()){
                    $entidadAux = new Venta();
                    $entidadAux->idventa = $fila["idventa"];
                    $entidadAux->fk_idcliente = $fila["fk_idcliente"];
                    $entidadAux->fk_idproducto = $fila["fk_idproducto"];
                    $entidadAux->fecha = $fila["fecha"];
                    $entidadAux->cantidad = $fila["cantidad"];
                    $entidadAux->preciounitario = $fila["preciounitario"];
                    $entidadAux->total = $fila["total"];
                    $aResultado[] = $entidadAux;
            }
        }
        $mysqli->close();
    }
}

?>