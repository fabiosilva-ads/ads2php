<<<<<<< HEAD
<?php
   include 'conexao.php'; 

   $id = trim($_GET['id']); 
   $situacao = trim($_GET['txtSituacao']);
   $saida = trim($_GET['txtData']); 
   
   if ($situacao=='Concluído'){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "UPDATE ordens SET situacao=?, saida=? WHERE idOrd=?;";
        $query = $pdo->prepare($sql); 
        $query->execute (array($situacao, $saida, $id));
        Conexao::desconectar(); 
   }

   header("location:listarOrdens.php"); 
=======
<?php
   include 'conexao.php'; 

   $id = trim($_GET['id']); 
   $situacao = trim($_GET['txtSituacao']);
   $saida = trim($_GET['txtData']); 
   
   if ($situacao=='Concluído'){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "UPDATE ordens SET situacao=?, saida=? WHERE idOrd=?;";
        $query = $pdo->prepare($sql); 
        $query->execute (array($situacao, $saida, $id));
        Conexao::desconectar(); 
   }

   header("location:listarOrdens.php"); 
>>>>>>> 358c3cbe7b6091ce8038435039589c06e0d95052
?> 