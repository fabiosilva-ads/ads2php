<?php
   include 'conexao.php'; 

   $id = trim($_POST['id']); 
   
   if (!empty($id)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "DELETE FROM clientes WHERE idCli=?;";
        $query = $pdo->prepare($sql); 
        $query->execute (array($id));
        Conexao::desconectar(); 
   }

   header("location:listarClientes.php"); 