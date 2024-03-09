<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria San Martin</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="container-fluid bcontent">
            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="images\logovete.jpg" width="90" height="90" /></a>
                <div class = "ms-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link Sombreado Sombreado-Dos Tipo-Letra-Tamaño" href="Principal.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link Sombreado Sombreado-Dos Tipo-Letra-Tamaño" href="productos.html">Productos</a></li>
                        <li class="nav-item"><a class="nav-link Sombreado Sombreado-Dos Tipo-Letra-Tamaño" href="servicios.html">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link Sombreado Sombreado-Dos Tipo-Letra-Tamaño" href="nosotros.html">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link Sombreado Sombreado-Dos Tipo-Letra-Tamaño" href="contacto.html">Contáctenos</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="contenedor">

        <div class="contendor-estetica">

            <div>
            <h3>Datos de la RESEÑA</h3>
            <p>RESEÑA: <?= $_POST['nombre-completo'] ?> </p>
            <?php
            $date = new DateTime($_POST['fecha']);
            echo "<p>Fecha seleccionada: " . $date->format('d-m-Y ') . "</p>";

            function AgregarDatosArchivo($nombre)
                {
                    try {
                        $archivo = fopen('datosComentario.txt', 'a');
                        $datos = "$nombre\n";
                        fwrite($archivo,$datos);
                    } catch (\Throwable $th) {
                        echo "<h4>Ocurrió un error inesperado, contacte a 4000-1365: $th</h4>"; 
                    } finally{
                        fclose($archivo);
                    }
                }

                function LeerArchivo($nombreArchivo)
                {
                    try {
                        $archivo = fopen($nombreArchivo, 'r');
                        echo "<ul>"; 
                        while (($linea = fgets($archivo)) != null) {
                            echo "<li>$linea</li>";
                        }
                        echo "</ul>";
                    } catch (\Throwable $th) {
                        echo "<h4>Ocurrió un error inesperado, contacte a XXX: $th</h4>"; 
    
                    } finally{
                        fclose($archivo);
                    }
                }

                try{
    
                    AgregarDatosArchivo($_POST['nombre-completo'] ,$_POST['fecha']);
                    LeerArchivo('datosComentario.txt');
                } catch (\Throwable $th) {
                    echo "<h4>Ocurrió un error inesperado, contacte a 4000-1365</h4>"; 
                }

            
            ?>
            </div>

        </div>

    </main>


    <!-- Footer -->
 <footer class="text-center text-white"  style="background-color: #45637d">
    <div class="container p-4">
        <section class="mb-4">
            <h1> </h1>
            <img src="images/veterinario.png" width="80" height="80"/>
            <h2>El mejor cuidado es nuestra misión</h2>
            <p> 24/7 SERVICE. SAME DAY APPOINTMENTS ARE AVAILABLE.</p>
        </section>

        <section class="mb-4">
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/VeteSanMartindePorres/" role="button">
                <img src="images/facebook.png" width="35" height="35"/>
                <i class="fab fa-facebook-f"></i>
            </a>
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/vetesanmartindeporres/" role="button">
                <img src="images/instagram.png" width="35" height="35"/>
                <i class="fab fa-instagram"></i>
            </a>
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.youtube.com/channel/UCcbKBeDd7_EJENLKG4fRqnQ" role="button">
                <img src="images/youtube.png" width="35" height="35"/>
                <i class="fab fa-youtube"></i>
            </a>
            <a class="btn btn-outline-light btn-floating m-1" href="https://ul.waze.com/ul?ll=9.89783365%2C-84.08613682&navigate=yes&zoom=17" role="button">
                <img src="images/map.png" width="35" height="35"/>
                <i class="fab fa-direccion"></i>
            </a>
            <a class="btn btn-outline-light btn-floating m-1" href="tel:+50640001365" role="button">
                <img src="images/phone.png" width="35" height="35"/>
                <i class="fab fa-phone"></i>
            </a>
        </section>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright
    </div>
</footer>

    <script src="js/app.js"></script>
</body>

</html>