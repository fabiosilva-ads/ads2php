<?php
	$usuario = trim($_POST['usuario']);
	$senha = md5(trim($_POST['senha']));

	if (!empty($usuario) && !empty($senha)){
		include 'conexao.php';
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM usuarios WHERE usuario LIKE ?;";
        $query = $pdo->prepare($sql);
		$query->execute (array($usuario));
		$dados = $query->fetch(PDO::FETCH_ASSOC);
        Conexao::desconectar();
   }

   if ($senha == $dados['senha'])
   {
		session_start();
		$_SESSION['usuario'] = $usuario;
		$_SESSION['nome'] = $dados['nome'];		

		header("location: menu.php");
   }
   else header("location: index.php");
?>