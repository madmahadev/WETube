<?php
@session_start();
$_SESSION['id']='destroyed';
session_destroy();
header('location:index.php');

?>