<?php

class Trabajador {
    private $id;
    private $nombre;
    private $complejidad_acumulada;
    private $conexion;

    public function __construct($id, $nombre, $conexion) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->complejidad_acumulada = 0;
        $this->conexion = $conexion;
    }

    public function asignarSoporte($descripcion, $complejidad) {

        // Obtener el trabajador con menos carga de complejidad acumulada

        $query = "SELECT id, complejidad_acumulada FROM trabajadores ORDER BY complejidad_acumulada ASC LIMIT 1";
        $result = mysqli_query($this->conexion, $query);
        $trabajador = mysqli_fetch_assoc($result);

        // Asignar el soporte al trabajador encontrado

        $query = "INSERT INTO soportes (descripcion, complejidad, id_trabajador) VALUES ('$descripcion', $complejidad, {$trabajador['id']})";
        mysqli_query($this->conexion, $query);

        // Actualizar la carga de complejidad acumulada del trabajador

        $query = "UPDATE trabajadores SET complejidad_acumulada = complejidad_acumulada + $complejidad WHERE id = {$trabajador['id']}";
        mysqli_query($this->conexion, $query);

        // Actualizar la carga de complejidad acumulada del trabajador en la instancia de la clase

        $this->complejidad_acumulada += $complejidad;

        // Mostrar a qué trabajador se asignó el soporte
        
        echo "El soporte con descripción '$descripcion' y complejidad $complejidad fue asignado a {$trabajador['nombre']}.<br>";
    }

    public function mostrarTrabajoAcumulado() {
        echo "La carga de complejidad acumulada de {$this->nombre} es {$this->complejidad_acumulada}.<br>";
    }
}
   
?>
