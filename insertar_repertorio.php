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
    $cantidad = $conn->real_escape_string($_POST['cantidad']);
    $c1 = $conn->real_escape_string($_POST['c1']);
    $autor1 = $conn->real_escape_string($_POST['autor1']);
    $c2 = $conn->real_escape_string($_POST['c2']);
    $autor2 = $conn->real_escape_string($_POST['autor2']);
    $c3 = $conn->real_escape_string($_POST['c3']);
    $autor3 = $conn->real_escape_string($_POST['autor3']);


    // Consulta SQL para la inserción de datos en la tabla "contratantes".
    $sql = "INSERT INTO repertorio (cantidad_canciones, cancion1, autor1, cancion2, autor2, cancion3, autor3)
            VALUES ('$cantidad', '$c1', '$autor1', '$c2', '$autor2', '$c3', '$autor3' )";

    // Consulta SQL para la inserción de datos en la tabla "usuarios".
   

    // Ejecuta las dos consultas y verifica si se ejecutaron correctamente.
    if ($conn->query($sql) === TRUE ) {
        header("Location: trayectoria.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos.
$conn->close();
?>
