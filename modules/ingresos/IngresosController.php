<?php
ob_start();
session_start();
if (!$_SESSION['user_id']){
    header("location: ../../index.php");
}

include_once('../../include/functions.php');

    $ingresosClass = new ingresosClass();
    $resultado = 0;
    $respuesta = array();

    $crearIngreso = (isset($_POST['crear_ingreso'])) ? $_POST['crear_ingreso'] : "0";
    $eliminarIngreso = (isset($_POST['eliminar_ingreso'])) ? $_POST['eliminar_ingreso'] : "0";
    $editar_ingreso = (isset($_POST['editar_ingreso'])) ? $_POST['editar_ingreso'] : "0";
    $confirmar_edit_ingreso = (isset($_POST['confirmar_modificacion'])) ? $_POST['confirmar_modificacion'] : "0";
    
    if($crearIngreso == 1){
        $idproveedor = (isset($_POST['idproveedor'])) ? $_POST['idproveedor'] : "0";//1
        $idusuario = (isset($_POST['idusuario'])) ? $_POST['idusuario'] : "0";//2
        $tipo_comprobante = (isset($_POST['tipo_comprobante'])) ? $_POST['tipo_comprobante'] : "0";//3
        $serie_comprobante = (isset($_POST['serie_comprobante'])) ? $_POST['serie_comprobante'] : "0";//4
        $num_comprobante = (isset($_POST['num_comprobante'])) ? $_POST['num_comprobante'] : "0";//5
        $fecha = (isset($_POST['fecha'])) ? $_POST[('fecha')] : "0";//6
        $impuesto = (isset($_POST['impuesto'])) ? $_POST['impuesto'] : "0";//7
        $total = (isset($_POST['total'])) ? $_POST['total'] : "0";//8
        $idarticulo = (isset($_POST['idarticulo'])) ?  $_POST['idartico'] : "0" ;//9
        $caja = (isset($_POST['caja'])) ? $_POST['caja'] : "0";//10
        $cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : "0";//11
        $total_c = (isset($_POST['total_c'])) ? $_POST['total_c'] : "0";//12
        $precio = (isset($_POST['precio'])) ? $_POST['precio'] : "0";//13
        
        
        $resultado = $ingresosClass -> createIngreso($idarticulo, $caja, $cantidad, $total_c, $precio, $idproveedor, $idusuario, $tipo_comprobante, $serie_comprobante, $num_comprobante, $fecha, $impuesto, $total);
        $respuesta['resultado'] = $resultado;
        echo json_encode($respuesta);
    }



ob_end_flush();
?>