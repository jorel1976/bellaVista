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
        echo '<div class="alert alert-success" role="alert">
                Reserva realizada exitosamente.
              </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Error: ' . $sql . '<br>' . $conn->error . '
              </div>';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <header>
        <h1 class="text-center my-4">Reservas y Formas de Pago</h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                 <!--logo-->
                 <a class="navbar-brand" href="#">
                    <img src="../img/logo.png" alt="Logo Hotel Bella Vista" style="width: 50px; height: 50px;"> 
                    Hotel Bella Vista
                </a>
                <!--logo-->
                <!--<a class="navbar-brand" href="../index.html">Hotel Bella Vista</a>-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.html">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../galeria.html">Galería</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../reservas.html">Reservas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../contacto.html">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-4">
        <section id="formulario-reserva">
            <h2 class="mb-4">Realiza tu Reserva</h2>
            <form action="reservar.php" method="post" class="row g-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="fecha-llegada" class="form-label">Fecha de Llegada:</label>
                    <input type="date" id="fecha-llegada" name="fecha-llegada" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="fecha-salida" class="form-label">Fecha de Salida:</label>
                    <input type="date" id="fecha-salida" name="fecha-salida" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="personas" class="form-label">Número de Personas:</label>
                    <input type="number" id="personas" name="personas" class="form-control" min="1" required>
                </div>
                <div class="col-md-12">
                    <label for="habitacion" class="form-label">Preferencias de Habitación:</label>
                    <input type="text" id="habitacion" name="habitacion" class="form-control">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Reservar</button>
                </div>
            </form>
        </section>

        <section id="formas-pago" class="mt-5">
            <h2>Formas de Pago</h2>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Transferencia Bancaria:</strong> Realiza tu pago directamente a nuestra cuenta bancaria y envíanos el comprobante.
                </li>
                <li class="list-group-item">
                    <strong>Pagos en Línea:</strong> Aceptamos pagos mediante tarjetas de crédito y débito.
                </li>
                <li class="list-group-item">
                    <strong>Pagos al Llegar:</strong> Puedes pagar directamente en el hotel al momento de tu llegada.
                </li>
            </ul>
        </section>
    </main>

    <footer class="text-center mt-5">
        <p>&copy; 2024 Hotel Bella Vista. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

