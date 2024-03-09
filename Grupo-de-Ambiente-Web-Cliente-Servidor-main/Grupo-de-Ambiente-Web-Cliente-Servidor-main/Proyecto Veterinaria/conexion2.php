<?php 

//Cambiar nombre de la conexion para evitar discrepancia en el codigo
//-------------------------------------------------------------------//


$servidor="localhost";
$db="phpcrud2";//este es de prueba, cambiar a la base qeu se vaya a utlizar 
$username="root";
$password="";


try {
    $conexion=new PDO("mysql:host=$servidor;dbname=$db",$username,$password);
    
} catch (Exception $e) {
    echo $e->getMessage();
} 


?>