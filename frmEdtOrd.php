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
    $valor= $dados['valor'];    
    Conexao::desconectar();

    require 'header.php';
    require 'nav.php';
?>

<div class="container grey lighten-3 col s8">
    <div class="amber lighten-3 col s12">
        <h5>EDITAR ORDEM DE SERVIÇO</h5>
    </div>
    <div class="row">
        <form action="edtOrd.php" method="POST" id="frmEdtOrd" name="frmEdtOrd" class="col s8"> 
            <div class="input-field col s8">
                <div class="input-field col s8">
                    <h6> <label for="lblID"><b>Id: </b> <?php echo $id;?> </label></h6>
                    <input type="hidden" name="id" id="id" value=" <?php echo $id;?> ">
                </div>
                <div class="input-field col s8">
                    <h6> <label for="lblCliente"><b>Cliente: </b> <?php echo $cliente;?> </label></h6>
                    <input type="hidden" name="txtCliente" id="txtCliente" value=" <?php echo $cliente;?> ">
                </div>
                <div class="input-field col s8">
                    <label for="lblEquipamento"> Equipamento: </label>
                    <input type="text" class="form-control" id="txtEquipamento" name="txtEquipamento" value=" <?php echo $equipamento;?>">
                </div>
                <div class="input-field col s8">
                    <label for="lblDefeito"> Defeito: </label>
                    <input type="text" class="form-control" id="txtDefeito" name="txtDefeito" value=" <?php echo $defeito;?>">
                </div>
                <div class="input-field col s8">
                    <label for="lblValor"> Valor: </label>
                    <input type="text" class="form-control" id="txtValor" name="txtValor" value=" <?php echo $valor;?>">
                </div>   
                <div class="input-field col s8">
                <br>
                <button class="btn waves-effect waves-light" type="submit" id="btnSalvar"> Salvar </button>
                <button class="btn waves-effect waves-light indigo darken-3" type="button" id="btnVoltar" onclick="JavaScript:location.href='listarOrdens.php'"> Voltar </button>
            </div>
        </form>
    </div>
</div>
<?php require 'footer.php';?>
