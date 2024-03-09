<?php
include('conexion.php');

$user = $_POST['user'];
$password = $_POST['pass'];
$password_confirmation = $_POST['pass_confirmation'];

if($password != $password_confirmation) {
    header('Location: registrologin.php?error=Las contraseñas no coninciden');
}

$query = "INSERT INTO usuarios(user,password,rol) VALUES ('$user','$password','user')";

mysqli_query($conexion,$query);


if($password != "" && $password_confirmation != "" && $user != "") {
    header('Location: registrologin.php?error=User registrado');
    
}



?>

