<?php
	session_start();
	if(!isset($_SESSION['usuario']) )
	   header("location: index.php");

    include 'conexao.php';
    $pdo = Conexao::conectar();
    $sql = 'SELECT ordens.idOrd, clientes.nome, ordens.entrada, ordens.equipamento, ordens.defeito, ordens.defeito, ordens.valor, ordens.situacao, ordens.saida, ordens.clienteID FROM ordens INNER JOIN clientes ON ordens.clienteID = clientes.idCli;';
    $listaOrdens = $pdo->query($sql);

    require 'header.php';
    require 'nav.php';
?>
 <h5>LISTAR ORDEM DE SERVIÇO</h5>
 
<table class="striped" class="responsive-table">
    <Thead>
        <tr class = "grey lighten-2" class="blue-text text-darken-2">
            <th>ID</th>
            <th>CLIENTE</th>
            <th>DATA/ENTRADA</th>            
            <th>EQUIPAMENTO</th>
            <th>DEFEITO</th>
            <th>VALOR</th>
            <th>SITUAÇÃO</th>
            <th>DATA/SAÍDA</th>            
            <th colspan="3"></th>
            <th><a class="btn-floating btn-medium waves-effect waves-light green"
            onclick="JavaScript:location.href='frmInsOrd.php'"><i class="material-icons">add</i></a></th>
        </tr>
    </Thead>
    <?php foreach ($listaOrdens as $ordem) {?>
        <tbody>
            <tr class="blue-text text-light-blue accent-4"  >
                <td><?php echo $ordem['idOrd']; ?></td>
                <td><?php echo $ordem['nome']; ?></td>
                <td><?php echo (new DateTime($ordem['entrada']))->format("d-m-Y");?></td>                
                <td><?php echo $ordem['equipamento']; ?></td>
                <td><?php echo $ordem['defeito']; ?></td>
                <td><?php echo number_format($ordem['valor'], 2, ',', '.') ?></td>
                <td><?php echo $ordem['situacao']; ?></td>
                <td><?php echo $ordem['saida']; ?></td>
                <td><a class="btn-floating btn-small waves-effect waves-light orange" 
                    onclick="JavaScript:location.href='frmEdtOrd.php?id=' +
                    <?php echo $ordem['idOrd'];?>"><i class="material-icons">edit</i></a></td>
                <td><a class="btn-floating btn-small waves-effect waves-light blue" 
                    onclick="JavaScript:location.href='frmBxrOrd.php?id=' +
                    <?php echo $ordem['idOrd'];?>"><i class="material-icons">check</i></a></td>
                <td> <a class="btn-floating btn-small waves-effect waves-light red"
                    onclick="JavaScript:location.href='frmRemOrd.php?id=' +
                    <?php echo $ordem['idOrd'];?>"><i class="material-icons">delete</i></a></td>
            </tr>
        </tbody>
    <?php } ?>
</table>

<?php require 'footer.php';?>