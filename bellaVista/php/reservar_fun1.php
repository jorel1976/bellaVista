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
    $fecha_llegada = $_POST['fecha-llegada'];
    $fecha_salida = $_POST['fecha-salida'];
    $numero_personas = $_POST['personas'];
    $preferencias_habitacion = $_POST['habitacion'];

    // Insertar los datos en la tabla
    $sql = "INSERT INTO reservas (nombre, fecha_llegada, fecha_salida, numero_personas, tipo_habitacion)
            VALUES ('$nombre', '$fecha_llegada', '$fecha_salida', '$numero_personas', '$preferencias_habitacion')";

    if ($conn->query($sql) === TRUE) {
        echo "Reserva realizada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cierra la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas - Hotel Bella Vista</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Reservas y Formas de Pago</h1>
        <nav>
            <ul>
                <li><a href="../index.html">Inicio</a></li>
                <li><a href="../galeria.html">Galería</a></li>
                <li><a href="../reservas.html">Reservas</a></li>
                <li><a href="../contacto.html">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="formulario-reserva">
            <h2>Realiza tu Reserva</h2>
            <form action="reservar.php" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="fecha-llegada">Fecha de Llegada:</label>
                <input type="date" id="fecha-llegada" name="fecha-llegada" required>

                <label for="fecha-salida">Fecha de Salida:</label>
                <input type="date" id="fecha-salida" name="fecha-salida" required>

                <label for="personas">Número de Personas:</label>
                <input type="number" id="personas" name="personas" min="1" required>

                <label for="habitacion">Preferencias de Habitación:</label>
                <input type="text" id="habitacion" name="habitacion">

                <button type="submit" class="btn">Reservar</button>
            </form>
        </section>

        <section id="formas-pago">
            <h2>Formas de Pago</h2>
            <ul>
                <li><strong>Transferencia Bancaria:</strong> Realiza tu pago directamente a nuestra cuenta bancaria y envíanos el comprobante.</li>
                <li><strong>Pagos en Línea:</strong> Aceptamos pagos mediante tarjetas de crédito y débito.</li>
                <li><strong>Pagos al Llegar:</strong> Puedes pagar directamente en el hotel al momento de tu llegada.</li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Hotel Bella Vista. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
