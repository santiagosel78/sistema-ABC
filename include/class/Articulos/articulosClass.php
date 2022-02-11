<?php
    include_once(RAIZ_APLICACION."/functions.php");

    class articulosClass{
        function listadoArticulos(){
            $conexionClass = new Tool();
            $conexion = $conexionClass->conectar();

            mysqli_query($conexion, "SET NAMES 'utf8'");
            mysqli_set_charset($conexion, "utf8");

            if(!$conexion){
                die("Conexion fallida por: ".mysqli_connect_error());
            }
            else{
                
            }
        
            $sql = "select  a.idarticulo,
            b.nombre as nombre_cat,
            a.codigo,
            a.nombre as nombre_art,
            a.precio_venta,
            a.stock,
            a.descripcion,
            a.imagen,
            a.estado 
            
            from articulo a, categoria b where a.id_categoria = b.idcategoria;";
        
            return $resultado = mysqli_query($conexion, $sql);
        }

        function getCategorias(){
            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();

            $sql = "SELECT idcategoria,
                           nombre
                    FROM categoria;";

            $resultado = mysqli_query($conexion, $sql);
            $conexionClass -> desconectar($conexion);
            return $resultado;

        }


        function createArt($id_categoria, $codigo, $nombre, $precio_venta, $stock, $descripcion, $imagen, $estado){
            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();

            $sql = "insert into ventas.articulo (id_categoria, codigo, nombre, precio_venta, stock, descripcion, imagen, estado)
            values ($id_categoria, '$codigo', '$nombre', $precio_venta, $stock, '$descripcion', '$imagen', $estado);";
            

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

        function deleteArt($art_id){
            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();

            $sql = "DELETE FROM ventas.articulo WHERE idarticulo = $art_id";

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