<?php
// Datos para la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "registro_coaching";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("
    <html>
    <head>
        <link rel='stylesheet' href='styles.css'>
    </head>
    <body>
        <div class='container error'>
            <h2>Error de conexión</h2>
            <p>No se pudo conectar a la base de datos. Intenta más tarde.</p>
        </div>
    </body>
    </html>
    ");
}

// Verificar que los datos del formulario existen antes de procesarlos
if (isset($_POST['nombre']) && isset($_POST['carrera']) && isset($_POST['cuatrimestre'])) {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $carrera = $conn->real_escape_string($_POST['carrera']);
    $cuatrimestre = intval($_POST['cuatrimestre']);

    // Consulta para insertar datos
    $sql = "INSERT INTO estudiantes (nombre, carrera, cuatrimestre) VALUES ('$nombre', '$carrera', '$cuatrimestre')";

    // Mostrar mensaje solo si el registro fue exitoso
    if ($conn->query($sql) === TRUE) {
        echo "
        <html>
        <head>
            <link rel='stylesheet' href='styles.css'>
        </head>
        <body>
            <div class='container success'>
                <h2>Registro exitoso</h2>
                <p>Se ha sido registrado correctamente.</p>
            </div>
        </body>
        </html>
        ";
    } else {
        echo "
        <html>
        <head>
            <link rel='stylesheet' href='styles.css'>
        </head>
        <body>
            <div class='container error'>
                <h2>Error al registrar</h2>
                <p>Hubo un problema al guardar los datos: " . $conn->error . "</p>
            </div>
        </body>
        </html>
        ";
    }
} else {
    echo "
    <html>
    <head>
        <link rel='stylesheet' href='styles.css'>
    </head>
    <body>
        <div class='container warning'>
            <h2>Datos incompletos</h2>
            <p>Por favor, completa todos los campos del formulario.</p>
        </div>
    </body>
    </html>
    ";
}

// Cerrar conexión
$conn->close();
?>