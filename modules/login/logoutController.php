<?php
ob_start();
session_start();
if (!$_SESSION['user_id']){
    header("location: index.php");
}
include_once("../../include/functions.php");
$loginClass = new loginClass();

$loginClass->cerrar_sesion();




ob_end_flush();

?>