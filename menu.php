<?php 
  session_start();
  if(!isset($_SESSION['usuario']))
    header ("location: index.php");

  require 'header.php';
  require 'nav.php';
  require 'footer.php';
?>