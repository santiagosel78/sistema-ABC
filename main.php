<?php
session_start();
if (!$_SESSION['user_id']){
    header("location: index.php");
}

include 'template/head.php';
include 'template/body.php';
include 'template/content.php';

?>