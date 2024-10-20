<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_bella_vista";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $fecha_llegada = $_POST['fecha_llegada'];
    $fecha_salida = $_POST['fecha_salida'];
    $numero_personas = $_POST['numero_personas'];
    $tipo_habitacion = $_POST['tipo_habitacion'];
    $mensaje = $_POST['mensaje'];

    // Insertar los datos en la tabla
    $sql = "INSERT INTO reservas (nombre, email, fecha_llegada, fecha_salida, numero_personas, tipo_habitacion, mensaje)
            VALUES ('$nombre', '$email', '$fecha_llegada', '$fecha_salida', '$numero_personas', '$tipo_habitacion', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        echo "Reserva realizada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cierra la conexión
    $conn->close();
}
?>
