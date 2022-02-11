<?php
include_once(RAIZ_APLICACION."/functions.php");
class loginClass{
    function valida_login($usuario, $clave){
        $conexionClass = new Tool();
        $conexion = $conexionClass->conectar();

        $sql = "select * from usuarios where usuario = '$usuario' and clave = '$clave'";
        $resultado = mysqli_query($conexion, $sql);
        return $resultado;
    }


    function cerrar_sesion (){
        session_start();
        session_destroy();
        header("location: ../../index.php");
        exit;
    }
}
?>