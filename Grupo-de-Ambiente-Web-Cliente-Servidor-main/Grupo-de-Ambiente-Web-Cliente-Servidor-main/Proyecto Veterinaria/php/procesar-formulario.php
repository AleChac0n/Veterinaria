<?php

require_once '../include/funciones/recogeRequests.php';

$nombre = recogePost("nombre-completo");
$correo = recogePost("correo");
$telefono = recogePost("telefono");

$nombreOk = false;
$correoOk = false;
$telefonoOk = false;

$errores = [];

//investigar expresiones regulares en php y completar las siguientes validaciones

if($nombre === ""){
    $errores[] = "No se digito el nombre de la persona";
}else{
    $nombreOk = true;
}

if($correo === ""){
    $errores[] = "No se digito el correo de la persona";
}else{
    $correoOk = true;
}

if($telefono === ""){
    $errores[] = "No se digito el teléfono de la persona";
}else{
    $telefonoOk = true;
}

if($nombreOk && $correoOk && $telefono){
    //ingresar datos de la cita
    require_once '../DAL/cita.php';
    if(IngresaCita($nombre, $correo, $telefono)){
        header("Location: ../php/consulta-datos.php");
    }
}

?>