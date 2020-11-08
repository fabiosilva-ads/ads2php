<<<<<<< HEAD
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

=======
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

>>>>>>> 358c3cbe7b6091ce8038435039589c06e0d95052
   header("location:listarClientes.php"); 