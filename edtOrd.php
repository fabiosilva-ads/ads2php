<<<<<<< HEAD
<?php
   include 'conexao.php'; 

   $id = trim($_POST['id']); 
   $equipamento = trim($_POST['txtEquipamento']);
   $defeito = trim($_POST['txtDefeito']); 
   $valor = trim($_POST['txtValor']); 
   
   if (!empty($id) && !empty($equipamento) && !empty($defeito) && !empty($valor)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "UPDATE ordens SET equipamento=?, defeito=?, valor=? WHERE idOrd=?;";
        $query = $pdo->prepare($sql); 
        $query->execute (array($equipamento, $defeito, $valor, $id));
        Conexao::desconectar(); 
   }

   header("location:listarOrdens.php"); 
=======
<?php
   include 'conexao.php'; 

   $id = trim($_POST['id']); 
   $equipamento = trim($_POST['txtEquipamento']);
   $defeito = trim($_POST['txtDefeito']); 
   $valor = trim($_POST['txtValor']); 
   
   if (!empty($id) && !empty($equipamento) && !empty($defeito) && !empty($valor)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "UPDATE ordens SET equipamento=?, defeito=?, valor=? WHERE idOrd=?;";
        $query = $pdo->prepare($sql); 
        $query->execute (array($equipamento, $defeito, $valor, $id));
        Conexao::desconectar(); 
   }

   header("location:listarOrdens.php"); 
>>>>>>> 358c3cbe7b6091ce8038435039589c06e0d95052
?> 