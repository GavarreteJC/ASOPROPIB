<?php
// --------------------- LÓGICA PHP ---------------------
$nombre = $telefono = $email = $mensaje = "";
$mensaje_estado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = trim($_POST["nombre"] ?? '');
    $telefono = trim($_POST["telefono"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $mensaje = trim($_POST["mensaje"] ?? '');

    // Validación
    if (empty($nombre) || empty($email) || empty($mensaje)) {
        $mensaje_estado = [
            'texto' => "ERROR: Rellena los campos obligatorios.",
            'color' => 'red',
            'fondo' => '#ffe0e0'
        ];
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje_estado = [
            'texto' => "ERROR: Correo electrónico inválido.",
            'color' => 'red',
            'fondo' => '#ffe0e0'
        ];
    } else {
        $mensaje_estado = [
            'texto' => "Datos enviados correctamente.",
            'color' => 'green',
            'fondo' => '#e0ffe0'
        ];

        // Limpia campos tras envío
        $nombre = $telefono = $email = $mensaje = "";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASOPROPIB - Contacto</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>

    <header>
        <nav>
            <a href="index.html" class="logo-container">
                <img src="img/Logo.jpeg" alt="Logo ASOPROPIB" class="logo-img">
            </a> 
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="productos.html">Productos</a></li> 
                <li><a href="servicios.html">Servicios</a></li>
                <li><a href="contacto.php">Contacto</a></li> 
            </ul>
        </nav>
    </header>

    <main>
        
        <section class="content-section" style="padding-top: 60px;">
            <h2 class="main-color">Hablemos de tu Proyecto o Pedido</h2>
            <p style="max-width: 800px; margin: 0 auto 30px;">
                Utiliza el formulario a continuación para contactar directamente a nuestro equipo de ventas o asistencia técnica.
            </p>
        </section>

        <section class="form-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                <div class="form-group">
                    <label for="nombre">Nombre Completo:</label>
                    <input type="text" id="nombre" name="nombre" 
                        value="<?php echo htmlspecialchars($nombre); ?>" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono"
                        value="<?php echo htmlspecialchars($telefono); ?>">
                </div>
                
                <div class="form-group">
                    <label for="email">Correo Electrónico (Gmail u otro):</label>
                    <input type="email" id="email" name="email" 
                        value="<?php echo htmlspecialchars($email); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="mensaje">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" required 
                        placeholder="Describe tu consulta, pedido o interés en unirte a la asociación."><?php echo htmlspecialchars($mensaje); ?></textarea>
                </div>
                
                <button type="submit" class="submit-button">Enviar Mensaje</button>
            </form>

            <?php if (!empty($mensaje_estado)): ?>
            <div style="
                border: 1px solid <?php echo $mensaje_estado['color']; ?>;
                background-color: <?php echo $mensaje_estado['fondo']; ?>;
                color: <?php echo $mensaje_estado['color']; ?>;
                padding: 5px;
                margin-top: 10px;
                margin-bottom: 5px;
                border-radius: 4px;
                text-align: center;
                font-size: 0.9em;
                font-weight: bold;
            ">
                <?php echo htmlspecialchars($mensaje_estado['texto']); ?>
            </div>
            <?php endif; ?>

        </section>
        
        <section class="content-section" style="padding-bottom: 40px;">
            <h3 class="accent-color">Información de Contacto Directo</h3>
            <p><strong>Ventas y Pedidos:</strong> <a href="contacto.php">asopropib@gmail.com</a></p>
            <p><strong>Teléfono:</strong> +504 3158-9950</p>
            <p><strong>Ubicación:</strong> Saladito, San Francisco, Atlántida, Honduras.</p>
        </section>

    </main>

    <footer>
        <p>&copy; 2025 ASOPROPIB. Todos los derechos reservados. | Contacto: asopropib@gmail.com</p>
    </footer>

</body>
</html>
