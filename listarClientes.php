<?php
	session_start();
	if(!isset($_SESSION['usuario']) )
	   header("location: index.php");

    include 'conexao.php';
    $pdo = Conexao::conectar();
    $sql = 'SELECT * FROM clientes ORDER BY nome;';
    $listaClientes = $pdo->query($sql);

    require 'header.php';
    require 'nav.php';
?>
 <h5>LISTAR CLIENTES</h5>
 
<table class="striped" class="responsive-table">
    <Thead>
        <tr class = "grey lighten-2" class="blue-text text-darken-2">
            <th>ID</th>
            <th>NOME</th>
            <th>ENDEREÇO</th>
            <th>FONE</th>
            <th colspan="2"></th>
            <th><a class="btn-floating btn-medium waves-effect waves-light green"
            onclick="JavaScript:location.href='frmInsCli.php'"><i class="material-icons">add</i></a></th>
        </tr>
    </Thead>
    <?php foreach ($listaClientes as $cliente) {?>
        <tbody>
            <tr class="blue-text text-light-blue accent-4"  >
                <td><?php echo $cliente['idCli']; ?></td>
                <td><?php echo $cliente['nome']; ?></td>
                <td><?php echo $cliente['endereco']; ?></td>
                <td><?php echo $cliente['fone']; ?></td>
                <td><a class="btn-floating btn-small waves-effect waves-light orange" 
                    onclick="JavaScript:location.href='frmEdtCli.php?id=' +
                    <?php echo $cliente['idCli'];?>"><i class="material-icons">edit</i></a></td>
                <td> <a class="btn-floating btn-small waves-effect waves-light red"
                    onclick="JavaScript:location.href='frmRemCli.php?id=' +
                    <?php echo $cliente['idCli'];?>"><i class="material-icons">delete</i></a></td>
            </tr>
        </tbody>
    <?php } ?>
</table>

<?php require 'footer.php';?>