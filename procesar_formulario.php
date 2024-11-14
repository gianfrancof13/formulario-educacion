<?php
include 'includes/db-conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nivelEducacion = $_POST['nivelEducacion'];
    $grado = $_POST['grado'];
    $nombreAlumno = $_POST['nombreAlumno'];
    $apellidoAlumno = $_POST['apellidoAlumno'];
    $dniAlumno = $_POST['dniAlumno'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $escuela2024 = $_POST['escuela2024'];

    if (empty($nombreAlumno) || empty($apellidoAlumno) || empty($dniAlumno) || empty($fechaNacimiento) || empty($escuela2024)) {
        $mensaje = "Todos los campos son obligatorios.";
        $mensajeTipo = "error";
    } elseif (!preg_match("/^\d{7,8}$/", $dniAlumno)) {
        $mensaje = "DNI no válido. Debe tener 7 u 8 dígitos.";
        $mensajeTipo = "error";
    } else {
        $sql = "INSERT INTO alumnos (nivelEducacion, grado, nombreAlumno, apellidoAlumno, dniAlumno, fechaNacimiento, escuela2024)
                VALUES ('$nivelEducacion', '$grado', '$nombreAlumno', '$apellidoAlumno', '$dniAlumno', '$fechaNacimiento', '$escuela2024')";

        if ($conn->query($sql) === TRUE) {
            $mensaje = "Formulario enviado exitosamente y guardado en la base de datos.";
            $mensajeTipo = "exito";
        } else {
            $mensaje = "Error al guardar en la base de datos: " . $conn->error;
            $mensajeTipo = "error";
        }
    }
    

    $conn->close();

//Redirección
    header("Location: formulario.php?mensaje=" . urlencode($mensaje) . "&tipo=" . $mensajeTipo);
    exit();
}
?>
