<?php

class Tipoproducto {
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

        $mysqli->close();
    }

    public function actualizar(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        
        $sql = "UPDATE tipoproducto SET
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
                WHERE idproducto = $this->idproducto";
        if(!$resultado = $mysqli->query($sql)){
            printf("Error en query%s\n", $mysqli->error . " " . $sql);
        }

        while($fila = $resultado->fetch_assoc()){

        }
    }
    public function obtenerTodos(){}
}

?>