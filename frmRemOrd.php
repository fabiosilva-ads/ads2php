<?php
    session_start();
        if(!isset($_SESSION['usuario']))
    header ("location: index.php");

    include 'conexao.php';

    $id = $_GET['id'];

    $pdo = Conexao::conectar();
    $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT ordens.idOrd, clientes.nome, ordens.entrada, ordens.equipamento, ordens.defeito, ordens.valor, ordens.situacao, ordens.saida, ordens.clienteID FROM ordens INNER JOIN clientes ON ordens.clienteID = clientes.idCli WHERE idOrd=?;";
    $query = $pdo->prepare($sql);
    $query->execute (array($id));
    $dados = $query->fetch(PDO::FETCH_ASSOC);
    $cliente= $dados['nome'];
    $entrada = $dados['entrada'];
    $equipamento = $dados['equipamento'];
    $defeito= $dados['defeito'];
    Conexao::desconectar();

    require 'header.php';
    require 'nav.php';
?>

<div class="container grey lighten-3">
    <div class="red lighten-2">
        <h5>REMOVER ORDEM DE SERVIÇO</h5>
    </div>
    <div class="row">
        <form action="remOrd.php" method="POST" id="frmRemOrd" name="frmRemOrd" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <label for="lblID"><b>Id: </b> <?php echo $id;?> </label>
                    <input type="hidden" name="id" id="id" value=" <?php echo $id;?> ">
                </div>
            </div>
            <div class="row">            
                <div class="input-field col s6">
                    <label for="lblCliente"><b>Cliente: </b> <?php echo $cliente;?> </label>
                </div>
            </div>
            <div class="row">            
                <div class="input-field col s6">
                    <label for="lblEquipamento"><b>Endereço: </b> <?php echo $equipamento;?> </label>
                </div>
            </div>
            <div class="row">            
                <div class="input-field col s6">
                    <label for="lblDefeito"><b>Defeito: </b> <?php echo $defeito;?> </label>
                </div>
            </div>                      
            <div class="input-field col s6">
                <br>
                <button class="btn waves-effect waves-light red" type="submit" id="btnRemover"> Remover </button>
                <button class="btn waves-effect waves-light indigo darken-3" type="button" id="btnVoltar" onclick="JavaScript:location.href='listarOrdens.php'"> Voltar </button>
            </div>
        </form>
    </div>
</div>

<?php require 'footer.php';?>