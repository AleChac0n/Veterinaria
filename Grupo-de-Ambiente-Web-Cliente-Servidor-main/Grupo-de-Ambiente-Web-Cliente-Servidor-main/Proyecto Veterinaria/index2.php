


<?php

// este index es para mostrar en donde se encuentra el crud se puede cambiar el nombre 
//------------------------------------------------------------//

include("conexion2.php");

$stm=$conexion->prepare("SELECT * FROM citas");//aqui se cabia la base si es necesesario 
$stm->execute();
$citas=$stm->fetchAll(PDO :: FETCH_ASSOC);




if(isset($_GET['id'])){
    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("DELETE FROM citas WHERE id = :txtid"); // Usar :txtid en la consulta
    $stm->bindParam(":txtid", $txtid); // Usar :txtid aquí
    $stm->execute();
    header("location:index2.php");

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</head>
<body>



    <header>
        <div class="container-fluid bcontent">
            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="images/logovete.jpg" width="90" height="90" />
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

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
  Nuevo
</button>

<div class="table-responsive">
    <table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach($citas as $cita){ ?>
            <tr class="">
                <td scope="row"><?php echo $cita['id']; ?></td>
                <td><?php echo $cita['nombre']; ?></td>
                <td><?php echo $cita['correo']; ?></td>
                <td><?php echo $cita['telefono']; ?></td>
                <td>
                <a href="edit2.php?id=<?php echo $cita['id']; ?>" class="btn btn-success">Editar</a>
                <a href="index2.php?id=<?php echo $cita['id']; ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include("create.php"); ?>



        <!-- Footer -->
        <footer class="text-center text-white"  style="background-color: #45637d">
            <div class="container p-4">
                <section class="mb-4">
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