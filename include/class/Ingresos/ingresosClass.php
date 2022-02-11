<?php
    include_once(RAIZ_APLICACION."/functions.php");

    class ingresosClass{
        /**
         * Funcion para obtener el listado de Ingresos
         */
        function listadoIngresos(){
            $conexionClass = new Tool();
            $conexion = $conexionClass->conectar();

            mysqli_query($conexion, "SET NAMES 'utf8'");
            mysqli_set_charset($conexion, "utf8");

            if(!$conexion){
                die("Conexion fallida por: ".mysqli_connect_error());
            }
            else{
                
            }
            $sql = "SELECT a.idingreso,
                            b.nombre,
                            a.tipo_comprobante,
                            a.serie_comprobante,
                            a.num_comprobante,
                            c.nombre as nombre_usr,
                            e.nombre as nombre_art,
                            d.caja,
                            d.cantidad,
                            d.total_c,
                            d.precio,
                            a.impuesto,
                            a.total,
                            a.fecha

                from ingreso a, persona b, usuarios c, detalle_ingreso d, articulo e where b.tipo_persona = 'Proveedor' 
                And a.idproveedor = b.idpersona
                And a.idusuario = c.id
                And a.idingreso = d.id_ingreso 
                And d.id_articulo = e.idarticulo; ";
        
            return $resultado = mysqli_query($conexion, $sql);
        }

        function getArticulos(){
            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();

            $sql = "SELECT idarticulo, nombre FROM articulo;";

            $resultado = mysqli_query($conexion, $sql);
            $conexionClass -> desconectar($conexion);
            return $resultado;
        }

        function getProveedores(){
            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();

            $sql = "SELECT idpersona, nombre from persona where tipo_persona = 'Proveedor';  ";

            $resultado = mysqli_query($conexion, $sql);
            $conexionClass -> desconectar($conexion);
            return $resultado;
        }

        function createIngreso( $idarticulo, $caja, $cantidad, $total_c, $precio, 
                                 $idproveedor, $idusuario, $tipo_comprobante, $serie_comprobante, $num_comprobante, $fecha, $impuesto, $total){
            $conexionClass = new Tool();
            $conexionart = $conexionClass->conectar();
    
            $artsql = "insert into ventas.ingreso (idproveedor, idusuario, tipo_comprobante, serie_comprobante, num_comprobante, fecha, impuesto, total)
             values ($idproveedor,'$idusuario', '$tipo_comprobante', '$serie_comprobante', '$num_comprobante', '$fecha', $impuesto, $total);";
            $resultado = mysqli_query($conexionart, $artsql);
            
    
            if($resultado == 1){
                $lastiding = mysqli_insert_id($conexionart);
                $subconexion = $conexionClass->conectar();
    
                $sql = "insert into ventas.detalle_ingreso (id_ingreso, id_articulo, caja, cantidad, total_c, precio) 
                VALUES ($lastiding, $idarticulo, $caja, $cantidad, $total_c, $precio);";
    
                $param = mysqli_query($subconexion,$sql);
                            
            if($param){
                return 1;
                }
            }else{
                return 0;
            }
        }
    }
?>