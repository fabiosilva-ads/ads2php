<?php require 'header.php';?>
    <div class="container">
        <div class="row">
            <main>
                <div class="container center-align">
                    <div class="z-depth-3 y-depth-3 x-depth-3 grey green-text lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px; margin-top: 100px; solid #EEE;">
                        <form action="login.php" method="POST" name="index">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input class="validate" type="email" name="usuario" id="usuario" required />
                                    <label for="e-mail">E-mail do usuário</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m12">
                                    <input class="validate" type="password" name="senha" id="senha" required />
                                    <label for="password">Senha</label>
                                </div>                
                            </div>
                            <br/>
                            <div class="row">
                                <button style="margin-left:65px;"  type="submit" name="btnLogin" class="col s6 btn btn-small white black-text waves-effect z-depth-1 y-depth-1">Acessar</button>
                            </div>
                        </form>
                    </div>
                </div>     
            </main>
        </div>
    </div>
<?php require 'footer.php';?>