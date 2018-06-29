<?php

session_start();
if (isset($_GET['out'])) {
 session_destroy();
 header('location:index.php');
} else if (isset($_SESSION['idUsuario'])){
   require_once("views/home.php");
   // header("location:home.php?pag=home");
 }else {
   require_once("views/autentica_view.php");
 }
  //require_once("views/home.php");
?>
