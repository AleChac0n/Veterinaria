
    <?php
    session_start();
    $name = $_SESSION['usuario'];

    echo "<h1> Bienvenido(a)  $name</h1>";

    /* Delimitar acceso a panel por URL, revisando si hay sessiones abiertas*/
    if(!isset($_SESSION['usuario'])) {

        header('Location: index.php');
        exit();
    }

    if($_SESSION['rol'] != 'user') {
        header('Location: edit_user.php');
        exit();
    }

   
        ?>


 <!DOCTYPE html>


    <!--
    Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
    Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
    -->
    <html>
    <head>
        <title>Veterinaria San Martin de Porras</title>
        <link rel="stylesheet" href="css/index.css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/estilos.css" as="style">
        <link rel="stylesheet" href="css/estilos.css">


        <!--Link que hace que se cargue primero los estilos colocados por nosotros a la página web.-->

        

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</head>
<body>



    <header>
        <div class="container-fluid bcontent">
            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="images\logovete.jpg" width="90" height="90" />
                </a>
                <div class="ms-auto">
                    <ul class="navbar-nav">
                        
                        <li class="nav-item"><a class="nav-link Sombreado Sombreado-Dos Tipo-Letra-Tamaño" href="Principal.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link Sombreado Sombreado-Dos Tipo-Letra-Tamaño" href="productos.html">Productos</a></li>
                        <li class="nav-item"><a class="nav-link Sombreado Sombreado-Dos Tipo-Letra-Tamaño" href="servicios.html">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link Sombreado Sombreado-Dos Tipo-Letra-Tamaño" href="index2.php">Citas</a></li>
                        <li class="nav-item"><a class="nav-link Sombreado Sombreado-Dos Tipo-Letra-Tamaño" href="nosotros.html">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link Sombreado Sombreado-Dos Tipo-Letra-Tamaño" href="contacto.html">Contáctenos</a></li>                        
                        <li class="nav-item"><a class="nav-link Sombreado Sombreado-Dos Tipo-Letra-Tamaño" href="logout.php">logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/fondo1.webp" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Bienvenido a la Veterinaria San Martìn De Porras</h1>
                        <p>Respetar a los animales es una obligación, amarlos es un privilegio.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/fondo3.webp" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Bienvenido a la Veterinaria San Martìn De Porras</h1>
                        <p>Respetar a los animales es una obligación, amarlos es un privilegio.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/fondo2.webp" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Bienvenido a la Veterinaria San Martìn De Porras</h1>
                        <p>Respetar a los animales es una obligación, amarlos es un privilegio.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

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
        </body>
        </html>