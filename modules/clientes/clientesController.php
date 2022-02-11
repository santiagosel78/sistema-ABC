<?php
ob_start();
session_start();
if (!$_SESSION['user_id']){
    header("location: ../../index.php");
}

include_once('../../include/functions.php');

    $clientesClass = new clientesClass();
    $resultado = 0;
    $respuesta = array();

    $crearCliente = (isset($_POST['crear_cliente'])) ? $_POST['crear_cliente'] : "0";
    $eliminarCliente = (isset($_POST['eliminar_cliente'])) ? $_POST['eliminar_cliente'] : "0";
    $editar_cliente = (isset($_POST['editar_cliente'])) ? $_POST['editar_cliente'] : "0";
    $confirmar_edit_cliente = (isset($_POST['confirmar_modificacion'])) ? $_POST['confirmar_modificacion'] : "0";
    
    if($crearCliente == 1){
        $tipo = (isset($_POST['tipo_persona'])) ? $_POST['tipo_persona'] : "0";
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
        $documento = (isset($_POST['tipo_documento'])) ? $_POST['tipo_documento'] : "0";
        $numero = (isset($_POST['num_documento'])) ? $_POST['num_documento'] : "0";
        $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "0";
        $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "0";
        $correo = (isset($_POST['email'])) ? $_POST['email'] : "0";
        
        $resultado = $clientesClass -> createCli($tipo, $nombre, $documento, $numero, $direccion, $telefono, $correo);
        $respuesta['resultado'] = $resultado;
        echo json_encode($respuesta);
    }

    if ($eliminarCliente == 1){
        $cli_id = (isset($_POST['cli_id'])) ? $_POST['cli_id'] : "0";
        $resultado = $clientesClass -> deleteCli($cli_id);
        $respuesta['resultado'] = $resultado;
        echo json_encode($respuesta);
    }

    if($editar_cliente == 1){
        $cli_id = (isset($_POST['cli_id'])) ? $_POST['cli_id'] : "0";
        $result = $clientesClass -> cargarCliente($cli_id);

        $data[] = array(

            "idpersona" =>$result[0]['idpersona'],
            "tipo_persona" =>$result[0]['tipo_persona'],
            "nombre" =>$result[0]['nombre'],
            "tipo_documento" =>$result[0]['tipo_documento'],
            "num_documento" =>$result[0]['num_documento'],
            "direccion" =>$result[0]['direccion'],
            "telefono" =>$result[0]['telefono'],
            "email" =>$result[0]['email']
        );
        echo json_encode($data);
    }

    if($confirmar_edit_cliente == 1){
        $idpersona = (isset($_POST['idpersona'])) ? $_POST['idpersona'] : "0";
        $tipo_persona = (isset($_POST['tipo_persona'])) ? $_POST['tipo_persona'] : "0";
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
        $tipo_documento = (isset($_POST['tipo_documento'])) ? $_POST['tipo_documento'] : "0";
        $num_documento = (isset($_POST['num_documento'])) ? $_POST['num_documento'] : "0";
        $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "0";
        $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "0";
        $correo = (isset($_POST['email'])) ? $_POST['email'] : "0";
    
        $resultado = $clientesClass -> modificarCliente($idpersona, $tipo_persona, $nombre, $tipo_documento, $num_documento, $direccion, $telefono, $correo);
        $respuestaconfirmarcambios['resultado'] = $resultado;
        echo json_encode($respuestaconfirmarcambios);
    }


ob_end_flush();
?>