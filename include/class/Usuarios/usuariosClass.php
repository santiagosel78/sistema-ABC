<?php
    include_once(RAIZ_APLICACION."/functions.php");

    class usuariosClass{
        function listadoUsuarios(){
            $conexionClass = new Tool();
            $conexion = $conexionClass->conectar();

            mysqli_query($conexion, "SET NAMES 'utf8'");
            mysqli_set_charset($conexion, "utf8");

            if(!$conexion){
                die("Conexion fallida por: ".mysqli_connect_error());
            }
            else{
                
            }
        
            $sql = "SELECT a.id, a.nombre, a.apellido, a.edad, a.usuario, a.clave, a.dpi, a.email, a.telefono, b.nombre as nombre_rol, a.estado from usuarios a, role b WHERE a.role_id = b.id;";
        
            return $resultado = mysqli_query($conexion, $sql);
        }

        function getRoles(){
            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();

            $sql = "SELECT id, nombre, estado FROM role";

            $resultado = mysqli_query($conexion, $sql);
            $conexionClass -> desconectar($conexion);
            return $resultado;

        }

        function createUser($nombre, $apellido, $edad, $usuario, $clave, $dpi, $correo, $telefono, $role_id){
            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();

            $sql = "INSERT into id18436704_ventas.usuarios (nombre, apellido, edad, usuario, clave, dpi, email, telefono, estado, role_id) 
                    values ('$nombre', '$apellido', '$edad', '$usuario', '$clave', '$dpi', '$correo', '$telefono', 'A', '$role_id');";

            $resultado = mysqli_query($conexion, $sql);
            if($resultado){
                $conexionClass -> desconectar($conexion);
                return 1;
            }
            else{
                $conexionClass -> desconectar($conexion);
                return 0;
            }
           
        }

    }
?>