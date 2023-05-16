<?php

class Soporte {
    private $id;
    private $descripcion;
    private $complejidad;
    private $id_trabajador;
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function guardar() {
        $query = "INSERT INTO soportes (descripcion, complejidad, id_trabajador) VALUES ('$this->descripcion', $this->complejidad, $this->id_trabajador)";
        mysqli_query($this->conexion, $query);
    }

    public function obtenerPorId($id) {
        $query = "SELECT * FROM soportes WHERE id = $id";
        $result = mysqli_query($this->conexion, $query);
        $soporte = mysqli_fetch_assoc($result);

        $this->id = $soporte['id'];
        $this->descripcion = $soporte['descripcion'];
        $this->complejidad = $soporte['complejidad'];
        $this->id_trabajador = $soporte['id_trabajador'];
    }
}

?>
