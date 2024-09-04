<?php
// Configuración de la base de datos
$servername = "154.12.254.242";
$username = "ratiosof74bo_uv_bd_user";
$password = "Estudiantes@2024";
$dbname = "ratiosof74bo_uv_bd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener las coordenadas
$sql = "SELECT latitud, longitud, hora FROM ubiCast ORDER BY hora DESC LIMIT 1";
$result = $conn->query($sql);

// Verificar y obtener los datos
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(["error" => "No se encontraron datos"]);
}

$conn->close();
?>
