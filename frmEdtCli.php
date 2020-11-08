<<<<<<< HEAD
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

<div class="container grey lighten-3 col s12">
    <div class="amber lighten-3 col s12">
        <h5>EDITAR CLIENTE</h5>
    </div>
    <div class="row">
        <form action="edtCli.php" method="POST" id="frmEdtCli" name="frmEdtCli" class="col s12">
            <div class="input-field col s8">
                <h5> <label for="lblID"><b>Id: </b> <?php echo $id;?> </label></h5>
                <input type="hidden" name="id" id="id" value=" <?php echo $id;?> ">
            </div>
            <div class="input-field col s8">
                <label for="lblNome"> Informe o nome: </label>
                <input type="text" class="form-control" id="txtNome" name="txtNome" value=" <?php echo $nome;?>">
            </div>            
            <div class="input-field col s8">
                <label for="lblEndereco"> Informe o endereço: </label>
                <input type="text" class="form-control" id="txtEndereco" name="txtEndereco" value=" <?php echo $endereco;?>">
            </div>
            <div class="input-field col s8">
                <label for="lblFone"> Informe o fone: </label>
                <input type="text" class="form-control" id="txtFone" name="txtFone" value=" <?php echo $fone;?>"> 
            </div>             
            <div class="input-field col s8">
                <br>
                <button class="btn waves-effect waves-light" type="submit" id="btnSalvar"> Salvar </button>
                <button class="btn waves-effect waves-light indigo darken-3" type="button" id="btnVoltar" onclick="JavaScript:location.href='listarClientes.php'"> Voltar </button>
            </div>
        </form>
    </div>
</div>

<?php require 'footer.php';?>

=======
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

<div class="container grey lighten-3 col s12">
    <div class="amber lighten-3 col s12">
        <h5>EDITAR CLIENTE</h5>
    </div>
    <div class="row">
        <form action="edtCli.php" method="POST" id="frmEdtCli" name="frmEdtCli" class="col s12">
            <div class="input-field col s8">
                <h5> <label for="lblID"><b>Id: </b> <?php echo $id;?> </label></h5>
                <input type="hidden" name="id" id="id" value=" <?php echo $id;?> ">
            </div>
            <div class="input-field col s8">
                <label for="lblNome"> Informe o nome: </label>
                <input type="text" class="form-control" id="txtNome" name="txtNome" value=" <?php echo $nome;?>">
            </div>            
            <div class="input-field col s8">
                <label for="lblEndereco"> Informe o endereço: </label>
                <input type="text" class="form-control" id="txtEndereco" name="txtEndereco" value=" <?php echo $endereco;?>">
            </div>
            <div class="input-field col s8">
                <label for="lblFone"> Informe o fone: </label>
                <input type="text" class="form-control" id="txtFone" name="txtFone" value=" <?php echo $fone;?>"> 
            </div>             
            <div class="input-field col s8">
                <br>
                <button class="btn waves-effect waves-light" type="submit" id="btnSalvar"> Salvar </button>
                <button class="btn waves-effect waves-light indigo darken-3" type="button" id="btnVoltar" onclick="JavaScript:location.href='listarClientes.php'"> Voltar </button>
            </div>
        </form>
    </div>
</div>

<?php require 'footer.php';?>

>>>>>>> 358c3cbe7b6091ce8038435039589c06e0d95052
