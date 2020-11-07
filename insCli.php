<?php
   include 'conexao.php'; 

   $nome = trim($_POST['txtNome']);
   $endereco = trim($_POST['txtEndereco']); 
   $fone = trim($_POST['txtFone']); 
   
   if (!empty($nome) && !empty($endereco) && !empty($fone)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "INSERT INTO clientes (nome, endereco, fone) VALUES (?, ?, ?)";
        $query = $pdo->prepare($sql); 
        $query->execute (array($nome, $endereco, $fone));
        Conexao::desconectar(); 
   }

   header("location:listarClientes.php"); 

?> 