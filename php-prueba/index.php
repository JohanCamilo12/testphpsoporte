<?php 

//crear la conexión a la base de datos y pasarla como parámetro
//al crear las instancias de las clases Trabajador y Soporte

// Establecer la conexión a la base de datos
$host = "localhost";
$user = "nombre_de_usuario";
$password = "contraseña";
$database = "php_mibd_asignacion";

$conexion = mysqli_connect($host, $user, $password, $database);

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

// Crear instancias de la clase Trabajador y la clase Soporte
$carolina = new Trabajador(1, "Carolina", $conexion);
$felipe = new Trabajador(2, "Felipe", $conexion);
$camila = new Trabajador(3, "Camila", $conexion);

$soporte = new Soporte($conexion);

// Asignar soportes a los trabajadores
$carolina->asignarSoporte("Asignar soporte x", 20);
$felipe->asignarSoporte("Asignar soporte y", 30);
$camila->asignarSoporte("Asignar soporte z", 10);

// Mostrar la carga de complejidad acumulada de los trabajadores
$carolina->mostrarTrabajoAcumulado();
$felipe->mostrarTrabajoAcumulado();
$camila->mostrarTrabajoAcumulado();


?>
        