<?php
// Conexión a la base de datos (reemplaza los valores con tus propios datos de conexión).
$servername = "localhost";
$username = "root";
$password = "";
$database = "musity";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión.
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario y realizar la inserción en la tabla "contratantes".
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoagrupacion = $conn->real_escape_string($_POST['tipoagrupacion']);
    $equipo = $conn->real_escape_string($_POST['equipo']);
    $cantidad = $conn->real_escape_string($_POST['cantidad']);
    $costo = $conn->real_escape_string($_POST['costo']);


    // Consulta SQL para la inserción de datos en la tabla "contratantes".
    $sql = "INSERT INTO servicios (tipoagrupacion, equipo, cantidad, costo)
            VALUES ('$tipoagrupacion', '$equipo', '$cantidad', '$costo' )";

    // Consulta SQL para la inserción de datos en la tabla "usuarios".
   

    // Ejecuta las dos consultas y verifica si se ejecutaron correctamente.
    if ($conn->query($sql) === TRUE ) {
        header("Location: genero.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos.
$conn->close();
?>
