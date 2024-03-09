<?php

$servidor= "localhost";
$db= "veterinaria";
$user= "root";
$password= "";


$conexion= mysqli_connect($servidor,$user,$password,$db);


// if ($conexion) {

    //     echo "Estas conectado a la BD";
    // }else {
    
    //     echo "No estas conectad";
    // }
    
    
    try{
        $conexionPDO=new PDO("mysql:host=$servidor;dbname=$db",$user,$password);
        
        // echo"conexion existosa";
    }catch (Exception $e) {
        echo $e->getMessage();
    }

?>