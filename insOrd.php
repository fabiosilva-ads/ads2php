<?php
   include 'conexao.php'; 

   $entrada = trim($_POST['txtData']); 
   $equipamento = trim($_POST['txtEquipamento']);
   $defeito = trim($_POST['txtDefeito']);
   $valor = trim($_POST['txtValor']);
   $situacao = trim($_POST['txtSituacao']);
   $clienteId = trim($_POST['txtClienteID']);
   
   /*
   var_dump($entrada);
   var_dump($equipamento);
   var_dump($defeito);
   var_dump($valor);
   var_dump($situacao);
   var_dump($clienteId);
   */
   
   if (!empty($clienteId) && !empty($equipamento) && !empty($defeito)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "INSERT INTO ordens (entrada, equipamento, defeito, valor, situacao, clienteID) VALUES (?, ?, ?, ?, ?, ?)";
        $query = $pdo->prepare($sql); 
        $query->execute(array($entrada, $equipamento, $defeito, $valor, $situacao, $clienteId));
        Conexao::desconectar(); 
   }

   header("location:listarOrdens.php"); 

?> 