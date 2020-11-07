<?php 
    session_start();
        if(!isset($_SESSION['usuario']))
        header ("location: index.php");

    include 'conexao.php';
    $pdo = Conexao::conectar();
    $sql = "SELECT * FROM clientes ORDER BY nome;";
    $listaClientes = $pdo->query($sql);
    Conexao::desconectar();

    require 'header.php';
    require 'nav.php';
?>

<div class="container grey lighten-3 col s8">
    <div class="green lighten-3 col s8">
        <h5>INCLUIR ORDEM DE SERVIÇO</h5>
    </div>
    <div class="row">
        <form action="insOrd.php" method="POST" id="frmInsOrd" name="frmInsOrd" class="col s8"> 
            <div class="input-field col s8">
                <label for="lblCliente"> Cliente </label>
                <br>
                <select name="txtClienteID" id="txtClienteID" class="form-control">
                <?php
                    $i=0;
                    foreach ($listaClientes as $cliente) {
                        if ($i==0) {?>
                            <option value="" disabled selected>Selecione sua opção</option>
                            <option value="<?php echo $cliente['idCli']; ?>" selected><?php echo $cliente['nome']; ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $cliente['idCli']; ?>"><?php echo $cliente['nome']; ?></option>
                    <?php }
                    $i++;
                }
                ?>  
                </select>
            </div>
            <div class="input-field col s8">
                <label for="lblData"> Data da Entrada </label>
                <input type="date" class="form-control" id="txtData" name="txtData" value="<?php echo (new \DateTime())->format('Y-m-d'); ?>">
            </div>
            <div class="input-field col s8">
                <label for="lblEquipamento"> Equipamento </label>
                <input type="text" class="form-control" id="txtEquipamento" name="txtEquipamento">
            </div>
            <div class="input-field col s8">
                <label for="lblDefeito"> Defeito </label>
                <input type="text" class="form-control" id="txtDefeito" name="txtDefeito">
            </div>
            <div class="input-field col s8">
                <label for="lblValor"> Valor </label>
                <input type="number" class="form-control" id="txtValor" name="txtValor">
            </div>
            <div class="input-field col s8">
                <label for="lblSituacao"> Situação </label>
                <br>
                <select name="txtSituacao" id="txtSituacao">
                    <option value="Pendente" selected>Pendente</option>
                    <option value="Concluído">Concluído</option>
                </select>
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

<script>
$(document).ready(function(){
    $('select').formSelect();
  });
</script>

<?php require 'footer.php';?>
