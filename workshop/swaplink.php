<?php
session_start();
$categid = $_POST['id'];
$_SESSION['categid'] = $categid;
?>