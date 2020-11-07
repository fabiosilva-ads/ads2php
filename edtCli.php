<?php
   include 'conexao.php'; 

   $id = trim($_POST['id']); 
   $nome = trim($_POST['txtNome']);
   $endereco = trim($_POST['txtEndereco']); 
   $fone = trim($_POST['txtFone']); 
   
   if (!empty($id) && !empty($nome) && !empty($endereco) && !empty($fone)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "UPDATE clientes SET nome=?, endereco=?, fone=? WHERE idCli=?;";
        $query = $pdo->prepare($sql); 
        $query->execute (array($nome, $endereco, $fone, $id));
        Conexao::desconectar(); 
   }

   header("location:listarClientes.php"); 
?> 