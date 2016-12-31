<form class="pure-form pure-form-stacked" method="post">
    <center>
    <fieldset>
        <legend>Faça login para usar o sistema!</legend>

        <label for="email">Email</label>
        <input id="email" name="email" type="email" placeholder="Email">

        <label for="Senha">Password</label>
        <input id="password" name="senha" type="password" placeholder="Senha">

        <label for="remember" class="pure-checkbox">
            <input id="remember" type="checkbox"> Lembre-me
        </label>

        <button type="submit" name="entrar" class="pure-button pure-button-primary">Entrar</button>
    </fieldset>
</center>
</form>
<?php

    if (isset($_POST["entrar"])){
        
        require_once 'lib/entidade/Usuario.class.php';
        $usuario = new Usuario();
        if ($usuario->login($_POST["email"],$_POST["senha"])){
            setcookie("login",$usuario->getEmail());
            setcookie("login_nome",$usuario->getNome());
        } else {
            echo "<H1> Usuário ou senha incorretos</H1>";
        }
    }
?>