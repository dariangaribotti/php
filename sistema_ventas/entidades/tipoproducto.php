<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class TipoProducto {
    private $idtipoproducto;
    private $nombre;

    public function __set($name, $value){$this->$name = $value; return $this;}
    public function __get($name){return $this->$name;}

    public function cargarFormulario(){}
    public function insertar(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);

        $sql = "INSERT INTO tipoproductos (
                    nombre
                ) VALUES (
                    '$this->nombre'    
                )";

        if(!$mysqli->query($sql)){
            printf("Error en query%s\n", $mysqli->error . " " . $sql);
        }

        $this->idtipoproducto = $mysqli->insert_id;

        $mysqli->close();
    }

    public function actualizar(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        
        $sql = "UPDATE tipoproductos SET
                nombre = '$this->nombre'
                WHERE idproducto = " . $this->idproducto;
        
        if(!$mysqli->query($sql)){
            printf("Error en query%s\n", $mysqli->error . " " . $sql);
        }

        $mysqli->close();
                    
    }
    public function eliminar(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        
        $sql = "DELETE FROM tipoproductos where idproducto = " . $this->idproducto;

        if(!$mysqli->query($sql)){
            printf("Error en query%s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }
    public function obtenerPorId(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);

        $sql = "SELECT idproducto,
                        nombre
                FROM tipoproductos
                WHERE idproductos = $this->idproducto";
        if(!$resultado = $mysqli->query($sql)){
            printf("Error en query%s\n", $mysqli->error . " " . $sql);
        }

        if($fila = $resultado->fetch_assoc()){
            $this->idtipoproducto = $fila["idtipoproducto"];
            $this->nombre = $fila["nombre"];
        }
        $mysqli->close();
    }
    public function obtenerTodos(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);

        $sql = "SELECT
                    idtipoproducto,
                    nombre
                FROM tipoproductos";
        
        if(!$resultado = $mysqli->query($sql)){
            printf("Error en query%s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();
        if($resultado){
            while($fila = $resultado->fetch_assoc()){
                $entidadAux = new TipoProducto();
                $entidadAux->idtipoproducto = $fila["idtipoproducto"];
                $entidadAux->nombre = $fila["nombre"];
                $aResultado[] = $entidadAux;
            }
        }
        return $aResultado;
    }
}

?>