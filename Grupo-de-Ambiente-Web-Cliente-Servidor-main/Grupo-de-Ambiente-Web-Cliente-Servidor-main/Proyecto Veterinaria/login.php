<?php
/*Inicializar variables de seccion*/
    session_start();
    include("conexion.php");

    /* creacion de variables*/
    $usuario = $_POST['user'];
    $password = $_POST['pass'];

    
  $sql = "SELECT * FROM usuarios WHERE user ='$usuario'" AND "password = '$password'";

  $resultado = mysqli_query($conexion,$sql);
   

   while ($row = mysqli_fetch_array($resultado)) {
    $usuDB = $row['user'];
    $passDB = $row['password'];
    $rol_db = $row['rol'];

   }
   
   if($usuario !=  $usuDB) {
    header('Location: index.php?error=Usuario o contraseña invalidos');
}

   if($resultado -> num_rows > 0) {
    $_SESSION['usuario'] = $usuario;
     $_SESSION['password'] = $password;
    $_SESSION['rol'] = $rol_db;
    header('Location: Principal.php');
   }
    
   


?>

