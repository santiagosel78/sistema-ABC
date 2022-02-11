<?php
ob_start();
session_start();
if (!$_SESSION['user_id']){
    header("location: ../../index.php");
}

include_once('../../include/functions.php');

    $usuariosClass = new usuariosClass();
    $resultado = 0;
    $respuesta = array();

    $crearUsuario = (isset($_POST['crear_usuario'])) ? $_POST['crear_usuario'] : "0";
    
    if($crearUsuario == 1){
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
        $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : "0";
        $edad = (isset($_POST['edad'])) ? $_POST['edad'] : "0";
        $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "0";
        $clave = (isset($_POST['clave'])) ? $_POST['clave'] : "0";
        $dpi = (isset($_POST['dpi'])) ? $_POST['dpi'] : "0";
        $correo = (isset($_POST['email'])) ? $_POST['email'] : "0";
        $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "0";
        $role_id = (isset($_POST['role_id'])) ? $_POST['role_id'] : "0";
    
    
        $resultado = $usuariosClass -> createUser($nombre, $apellido, $edad, $usuario, $clave, $dpi, $correo, $telefono, $role_id);
        $respuesta['resultado'] = $resultado;
        echo json_encode($respuesta);
    }


ob_end_flush();
?>