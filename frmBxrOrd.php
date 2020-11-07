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
    $equipamento = $dados['equipamento'];
    $defeito= $dados['defeito'];
    $situacao= $dados['situacao'];
    $saida= $dados['saida'];   
    Conexao::desconectar();

    require 'header.php';
    require 'nav.php';
?>

<div class="container grey lighten-3 col s8">
    <div class="blue lighten-3 col s12">
        <h5>BAIXAR ORDEM DE SERVIÇO</h5>
    </div>
    <div class="row">
        <form action="bxrOrd.php" method="GET" id="frmBxrOrd" name="frmBxrOrd" class="col s8"> 
            <div class="input-field col s8">
                <div class="input-field col s8">
                    <h6><label for="lblID"><b>Id: </b> <?php echo $id;?> </label></h6>
                    <input type="hidden" name="id" id="id" value=" <?php echo $id;?> ">
                </div>
                <div class="input-field col s8">
                    <h6><label for="lblCliente"><b>Cliente: </b> <?php echo $cliente;?> </label></h6>
                    <input type="hidden" name="txtCliente" id="txtCliente" value=" <?php echo $cliente;?> ">
                </div>
                <div class="input-field col s8">
                    <h6><label for="lblEquipamento"><b>Equipamento: </b><?php echo $equipamento;?></label></h6>
                    <input type="hidden" name="txtEquipamento" id="txtEquipamento" value=" <?php echo $equipamento;?>">
                </div>               
                <div class="input-field col s8">
                    <h6><label for="lblSituacao"> <b>Situação: </b></label></h6>
                    <input type="text" class="form-control" id="txtSituacao" name="txtSituacao" value="Concluído">                    
                </div>
                <div class="input-field col s8">
                    <h6><label for="lblData"> <b>Data da Saída: </b></label></h6>
                    <input type="date" class="form-control" id="txtData" name="txtData" value="<?php echo (new \DateTime())->format('Y-m-d'); ?>">
                </div>
                <div class="input-field col s8">
                <br>
                <button class="btn waves-effect waves-light" type="submit" id="btnSalvar"> Salvar </button>
                <button class="btn waves-effect waves-light indigo darken-3" type="button" id="btnVoltar" onclick="JavaScript:location.href='listarOrdens.php'"> Voltar </button>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function(){
    $('select').formSelect();
  });
</script>

<?php require 'footer.php';?>
