<?php
    include_once(RAIZ_APLICACION."/functions.php");

    class proveedoresClass{
        /**
         * Funcion para obtener el listado de proveedores
         */
        function listadoProveedores(){
            $conexionClass = new Tool();
            $conexion = $conexionClass->conectar();

            mysqli_query($conexion, "SET NAMES 'utf8'");
            mysqli_set_charset($conexion, "utf8");

            if(!$conexion){
                die("Conexion fallida por: ".mysqli_connect_error());
            }
            else{
                
            }
        
            $sql = "SELECT idpersona, 
                        tipo_persona, 
                        nombre, 
                        tipo_documento, 
                        num_documento, 
                        direccion, 
                        telefono,
                        email
            from persona where tipo_persona = 'Proveedor';";
        
            return $resultado = mysqli_query($conexion, $sql);
        }

            function createPro($tipo, $nombre, $documento, $numero, $direccion, $telefono, $correo){
            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();

            $sql = "INSERT into ventas.persona (tipo_persona, nombre, tipo_documento, num_documento, direccion, telefono, email) 
                    values ('$tipo', '$nombre', '$documento', '$numero', '$direccion', '$telefono', '$correo');";

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

        function deletePro($pro_id){
            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();

            $sql = "DELETE FROM ventas.persona WHERE idpersona = $pro_id";

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

        function cargarProveedor($user_id_text){

            $pro_id = intval($user_id_text);

            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();

            $sql = "SELECT idpersona, 
            tipo_persona, 
            nombre, 
            tipo_documento, 
            num_documento, 
            direccion, 
            telefono,
            email
            from persona where tipo_persona = 'Proveedor' AND idpersona = $pro_id ;";
            
            $resultado = mysqli_query($conexion, $sql);

            $conexionClass -> desconectar($conexion);
            while( $fila = mysqli_fetch_array( $resultado )){
                $nuevo_array[] = $fila;
            }
           
            return $nuevo_array;
        }

        function modificarProveedor($idpersona, $tipo_persona, $nombre, $tipo_documento, $num_documento, $direccion, $telefono, $correo){
            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();

            $sql = "UPDATE persona SET 
                    tipo_persona = '$tipo_persona', 
                    nombre = '$nombre', 
                    tipo_documento = '$tipo_documento',
                    num_documento = '$num_documento', 
                    direccion = '$direccion', 
                    telefono = '$telefono', 
                    email = '$correo'
                    where idpersona = '$idpersona';";

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