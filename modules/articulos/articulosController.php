<?php
ob_start();
session_start();
if (!$_SESSION['user_id']){
    header("location: ../../index.php");
}

include_once('../../include/functions.php');

    $articulosClass = new articulosClass();
    $resultado = 0;
    $respuesta = array();

    $crearArticulo = (isset($_POST['crear_articulo'])) ? $_POST['crear_articulo'] : "0";
    $eliminararticulo = (isset($_POST['eliminar_articulo'])) ? $_POST['eliminar_articulo'] : "0";
    $editar_articulo = (isset($_POST['editar_articulo'])) ? $_POST['editar_articulo'] : "0";
    $confirmar_edit_articulo = (isset($_POST['confirmar_modificacion'])) ? $_POST['confirmar_modificacion'] : "0";
    
    if($crearArticulo == 1){
        $id_categoria = (isset($_POST['id_categoria'])) ? $_POST['id_categoria'] : "0";
        $codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : "0";
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
        $precio_venta = (isset($_POST['precio_venta'])) ? $_POST['precio_venta'] : "0";
        $stock = (isset($_POST['stock'])) ? $_POST['stock'] : "0";
        $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "0";
        $imagen = (isset($_POST['imagen'])) ? $_POST['imagen'] : "0";
        $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "0";
    
    
        $resultado = $articulosClass -> createArt($id_categoria, $codigo, $nombre, $precio_venta, $stock, $descripcion, $imagen, $estado);
        $respuesta['resultado'] = $resultado;
        echo json_encode($respuesta);
    }

    if ($eliminararticulo == 1){
        $art_id = (isset($_POST['art_id'])) ? $_POST['art_id'] : "0";
        $resultado = $articulosClass -> deleteArt($art_id);
        $respuesta['resultado'] = $resultado;
        echo json_encode($respuesta);
    }




ob_end_flush();
?>