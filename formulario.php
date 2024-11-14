<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Inscripción</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="caja-titulo">
        <h1>INSCRIPCIÓN EPA N°18 LEGADO COMECHINGON CICLO LECTIVO 2025</h1>
    </div>

    <?php
    // Mostrar el mensaje si existe
    if (isset($_GET['mensaje']) && isset($_GET['tipo'])) {
        $mensaje = urldecode($_GET['mensaje']);
        $tipo = $_GET['tipo'];

        if ($tipo == 'exito') {
            echo "<p style='color: green; background-color: #e0f2f1; padding: 10px; border-radius: 4px; border: 1px solid #2e7d32;'>$mensaje</p>";
        } else {
            echo "<p style='color: red; background-color: #ffebee; padding: 10px; border-radius: 4px; border: 1px solid #c62828;'>$mensaje</p>";
        }
    }
    ?>
    <form action="procesar-formulario.php" method="POST">
        
        <!-- Nivel Educación -->
        <label for="nivelEducacion">Nivel de Educación:</label>
        <select id="nivelEducacion" name="nivelEducacion" required onchange="updateOptions()">
            <option value="">Seleccione una opción</option>
            <option value="inicial">Nivel inicial turno mañana 2025</option>
            <option value="primaria">Primaria turno mañana 2025</option>
            <option value="secundaria">Secundaria turno tarde 2025</option>
        </select>
        
        <!-- Sala / Grado / Año -->
        <label for="grado">Sala / Grado / Año:</label>
        <select id="grado" name="grado" required>
            <option value="">Seleccione una opción</option>
        </select>
        
        <!-- Nombre Alumno -->
        <label for="nombreAlumno">Nombre del Alumno:</label>
        <input type="text" id="nombreAlumno" name="nombreAlumno" required>
        
        <!-- Apellido Alumno -->
        <label for="apellidoAlumno">Apellido del Alumno:</label>
        <input type="text" id="apellidoAlumno" name="apellidoAlumno" required>
        
        <!-- DNI Alumno -->
        <label for="dniAlumno">DNI del Alumno:</label>
        <input type="text" id="dniAlumno" name="dniAlumno" required pattern="\d{7,8}" title="Ingrese un DNI válido de 7 u 8 dígitos">
        
        <!-- Fecha de Nacimiento -->
        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" required>
        
        <!-- Escuela Asistida en 2024 -->
        <label for="escuela2024">Escuela a la que asistió en 2024:</label>
        <input type="text" id="escuela2024" name="escuela2024" required>
        
        <button type="submit">Enviar</button>
    </form>
    
    <script>
        function updateOptions() {
            const nivel = document.getElementById('nivelEducacion').value;
            const gradoSelect = document.getElementById('grado');
            
            // Limpiar opciones anteriores
            gradoSelect.innerHTML = '<option value="">Seleccione una opción</option>';
            
            // Añadir opciones en función del nivel seleccionado
            if (nivel === 'inicial') {
                gradoSelect.innerHTML += `
                    <option value="sala1">Sala 1 (3 años)</option>
                    <option value="sala2">Sala 2 (4 años)</option>
                    <option value="sala3">Sala 3 (5 años)</option>
                `;
            } else if (nivel === 'primaria') {
                for (let i = 1; i <= 6; i++) {
                    gradoSelect.innerHTML += `<option value="grado${i}">${i}° Grado</option>`;
                }
            } else if (nivel === 'secundaria') {
                for (let i = 1; i <= 6; i++) {
                    gradoSelect.innerHTML += `<option value="año${i}">${i}° Año</option>`;
                }
            }
        }
    </script>
</body>
</html>
