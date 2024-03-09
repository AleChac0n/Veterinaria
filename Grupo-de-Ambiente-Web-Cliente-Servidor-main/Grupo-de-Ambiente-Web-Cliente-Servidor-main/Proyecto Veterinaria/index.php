<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

     <!--Contruccion de Login-->
   <div class="container">
        <div class="mt-5 text-primary text-center">
            <div class="container">
                <img src="images/welcome.jpg" width="30%" alt="no display">
            </div>
            
            <h1>Login</h1>
            
        </div>

        <div>
            <?php 
            if(isset($_GET['error'])) {
                echo '<div class="alert alert-danger">'.$_GET['error'].'</div>';
            }
            ?>

        </div>

    <form action="login.php " method="post">

        <div>
            <input type="text" class="form-control" name="user"placeholder="Usuario" required>
        </div>
        <br>
        <div>
            <input type="password" class="form-control" name="pass"placeholder="Contrasena" required >
        </div>
       
        <div>
            <button type="submit" class=" btn btn-primary w-100 mt-3">Ingresar</button>
        </div>

       <a class="nav-link Sombreado Sombreado-Dos Tipo-Letra-Tamaño" href="registrologin.php">Registrar</a>


       


    </form>

    

   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>