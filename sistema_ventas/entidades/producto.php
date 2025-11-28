<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Producto {
    private $idcliente;
    private $nombre;
    private $cantidad;
    private $precio;
    private $descripcion;
    private $imagen;
    private $fk_idtipoproducto;

    public function __set($name, $value){$this->$name = $value; return $this;}
    public function __get($name){return $this->$name;}

    public function cargarFormulario(){}

    public function insertar(){
        //Primer paso: Instancia la clase mysqli con el constructor parametrizado
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        //Segundo paso: Arma la query
        $sql = "INSERT INTO productos (
                    nombre,
                    cantidad,
                    precio,
                    descripcion,
                    imagen,
                    fk_idtipoproducto
                ) VALUES (
                    '$this->nombre',
                    '$this->cantidad',
                    '$this->precio',
                    '$this->descripcion',
                    '$this->imagen',
                    '$this->fk_idtipoproducto'
                );";
        //Tercer paso: Ejecuta la query
        if (!$mysqli->query($sql)){
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        //Cuarto Paso: Obtener el id generado por la inserción
        $this->idcliente = $mysqli->insert_id;
        //Quinto Paso: Cerrar la conexión
        $mysqli->close();
    }

    public function actualizar(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        
        $sql = "UPDATE productos SET
                nombre = '$this->nombre',
                cantidad = '$this->cantidad',
                precio = '$this->precio',
                descripcion = '$this->descripcion',
                imagen = '$this->imagen',
                fk_idtipoproducto = '$this->fk_idtipoproducto',
                WHERE idproducto = $this->idproducto";

        if(!$mysqli->query($sql)){
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function eliminar(){}

    public function obtenerPorId(){}

    public function obtenerTodos(){}

}

?>