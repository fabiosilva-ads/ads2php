<?php 
  session_start();
  if(!isset($_SESSION['usuario']))
    header ("location: index.php");

  require 'header.php';
  require 'nav.php';
?>

<div class="container grey lighten-3 col s12">
    <div class="green lighten-3 col s12">
        <h5>INCLUIR CLIENTE</h5>
    </div>
    <div class="row">
        <form action="insCli.php" method="POST" id="frmInsCli" name="frmInsCli" data-toggle="validator" class="col s12">
            <div class="input-field col s8">
                <label for="lblNome"> Informe o nome </label>
                <input type="text" class="form-control" id="txtNome" name="txtNome" class="validate">
            </div>            
            <div class="input-field col s8">
                <label for="lblEndereco"> Informe o endereço </label>
                <input type="text" class="form-control" id="txtEndereco" name="txtEndereco" class="validate">
            </div>
            <div class="input-field col s8">
                <label for="lblFone"> Informe o fone </label>
                <input type="text" class="form-control" id="txtFone" name="txtFone" class="validate">
            </div>             
            <div class="input-field col s8">
                <br>
                <button class="btn waves-effect waves-light" type="submit" id="btnSalvar"> Salvar </button>
                <button class="btn waves-effect waves-light orange" type="reset" id="btnLimpar"> Limpar </button>
                <button class="btn waves-effect waves-light indigo darken-3" type="button" id="btnVoltar" onclick="JavaScript:location.href='listarClientes.php'"> Voltar </button>
            </div>
        </form>
    </div>
</div>
<?php require 'footer.php';?>
