<?php
    session_start();
        if(!isset($_SESSION['usuario']))
    header ("location: index.php");

    include 'conexao.php';

    $id = $_GET['id'];

    $pdo = Conexao::conectar();
    $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM clientes WHERE idCli=?;";
    $query = $pdo->prepare($sql);
    $query->execute (array($id));
    $dados = $query->fetch(PDO::FETCH_ASSOC);
    $nome = $dados['nome'];
    $endereco = $dados['endereco'];
    $fone= $dados['fone'];
    Conexao::desconectar();

    require 'header.php';
    require 'nav.php';
?>

<div class="container grey lighten-3">
    <div class="red lighten-2">
        <h5>REMOVER CLIENTE</h5>
    </div>
    <div class="row">
        <form action="remCli.php" method="POST" id="frmRemCli" name="frmRemCli" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <label for="lblID"><b>Id: </b> <?php echo $id;?> </label>
                    <input type="hidden" name="id" id="id" value=" <?php echo $id;?> ">
                </div>
            </div>
            <div class="row">            
                <div class="input-field col s6">
                    <label for="lblNome"><b>Nome: </b> <?php echo $nome;?> </label>
                </div>
            </div>
            <div class="row">            
                <div class="input-field col s6">
                    <label for="lblEndereco"><b>Endereço: </b> <?php echo $endereco;?> </label>
                </div>
            </div>
            <div class="row">            
                <div class="input-field col s6">
                    <label for="lblFone"><b>Fone: </b> <?php echo $fone;?> </label>
                </div>
            </div>                      
            <div class="input-field col s6">
                <br>
                <button class="btn waves-effect waves-light red" type="submit" id="btnRemover"> Remover </button>
                <button class="btn waves-effect waves-light indigo darken-3" type="button" id="btnVoltar" onclick="JavaScript:location.href='listarClientes.php'"> Voltar </button>
            </div>
        </form>
    </div>
</div>

<?php require 'footer.php';?>