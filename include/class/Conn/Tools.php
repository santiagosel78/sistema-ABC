<?php 
    class Tool{
        function conectar(){
            
            $conexion = mysqli_connect(SERVER, USER, PASS, DB);

            if($conexion){
                
            }
            else{
                echo 'Ha sucedio un error inesperado debido al siguiente <br>'.mysqli_connect_error();
            }
            mysqli_query($conexion, "SET NAME 'utf8'");
            mysqli_set_charset($conexion, "utf8");
            return $conexion;
        }
        function desconectar($conexion){
            $close = mysqli_close($conexion);
            if($close){
                
            }else{
                echo 'ha sucedido un error tratando de desconectarse <br>';
            }
            return $close;
        }
    }

?>