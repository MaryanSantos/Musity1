<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "musity";

$correo = null;
$contra = null;
$rol = null;
$formularioCargado = null;

if (isset($_GET["correo"])) {
    $correo = $_GET["correo"];
}
if (isset($_GET["id_rol"])) {
    $rol = $_GET["id_rol"];
}
if (isset($_GET["contrasena"])) {
    $contra = $_GET["contrasena"];
}

if (isset($_GET["formulario"])) {
    $formularioCargado = $_GET["formulario"];
}

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT u.usuario, u.id_roles, r.rol FROM usuarios as u, roles as r WHERE u.correo='$correo' AND u.contrasena='$contra' AND u.id_roles=r.id_r";

$result2 = mysqli_query($conn, $sql);
session_start();

if ($formularioCargado == "login") {
    if (mysqli_num_rows($result2) > 0) {
        echo "Usuario localizado";
        $row = mysqli_fetch_assoc($result2);
        $_SESSION["usuarioAutenticado"] = $row["usuario"];
        $_SESSION["rolUsuario"] = $row["rol"];
        $_SESSION["id_roles"] = $row["id_roles"];

        if ($_SESSION['id_roles'] == 1) { // Administrador
            header("Location: admin.html");
        } else if ($_SESSION['id_roles'] == 2) { // Musico
            header("Location: musico.html");
        } else if ($_SESSION['id_roles'] == 3) { // Contratante
            header("Location: contratante.html");
        }
    } else {
        echo "Usuario inexistente";
        header("Location: login.php?errorusuario=si");
    }
}
?>

