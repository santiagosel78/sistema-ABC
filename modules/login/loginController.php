<?php
ob_start();
session_start();

include_once('../../include/functions.php');
$usuario = $_POST['user'];
$clave = $_POST['clave'];

$loginClass = new loginClass();

$resultado = $loginClass->valida_login($usuario, $clave);

if($fila = mysqli_fetch_array($resultado)){
   $_SESSION['user_id']= $fila["id"];
   $_SESSION['nombre_usuario']= $fila["nombre"];
   $_SESSION['apellido_usuario']= $fila["apellido"];
   $_SESSION['user']= $fila["usuario"];
   $_SESSION['email_usuario']= $fila["email"];
   $_SESSION['user_role_id']= $fila["role_id"];
   

    header("location: ../../main.php");
}
else{
    echo "<script>  alert('PARECE QUE TUS CREDENCIALES SON INCORRECTAS');
    history.back();
    </script>";
    exit(-1);
}

ob_end_flush();
?>
