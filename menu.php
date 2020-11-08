<<<<<<< HEAD
<?php 
  session_start();
  if(!isset($_SESSION['usuario']))
    header ("location: index.php");

  require 'header.php';
  require 'nav.php';
  require 'footer.php';
=======
<?php 
  session_start();
  if(!isset($_SESSION['usuario']))
    header ("location: index.php");

  require 'header.php';
  require 'nav.php';
  require 'footer.php';
>>>>>>> 358c3cbe7b6091ce8038435039589c06e0d95052
?>