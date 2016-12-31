<div class="container">
    <h2>Inserir Usuario</h2>
    <form action="" method="post" name="contato">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" /><br>
        <label for="email">Email:</label>
        <input type="text" name="email" /><br>
        <label for="senha1">Senha:</label>
        <input type="password" name="senha1" /><br>
        <label for="senha2">Redigite a senha:</label>
        <input type="password" name="senha2" /><br>
        <label for="permissao">Permissao:</label>
        <input type="text" name="permissao" /><br>
        <label for="ativo">Ativo:</label>
        <input type="checkbox" name="ativo" checked="" value="on" /><br>
        <input class="btn btn-default btn-primary" type="submit"><br>
        <a class="btn btn-default btn-danger" href="index.php?pagina=usuarios"><-Voltar</a>
    </form>
</div>

<?php
/*
 * caso haja o preencimento dos dados e a submissão do formulário, o
 * controlador, será chamado para interpretar a ação
 */
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once 'lib/entidade/Usuario.class.php';
        $usuario = new Usuario();
        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha1']);
        $senha2 = ($_POST['senha2']);
        $usuario->setPermissao($_POST['permissao']);
        $usuario->setAtivo(isset($_POST['ativo']));
        
        //  AS SENHAS SÃO IGUAIS
        if ($senha2 != $usuario->getSenha()){
            echo "<br>A senhas não são iguais!";
        }
        
        // COMPRIMENTO DA SENHA
        if (strlen($usuario->getSenha()) < 5){
            echo "<br>A senha informada deve ter mais de 5 caracteres!";
        }
        
        
        if ($usuario->salvar()){
            echo "<hr>Usuario '".$usuario->getNome()."' foi adicionada!<br>";
            echo '<a class=\"btn btn-default btn-danger\" href="index.php?pagina=usuarios"><-Voltar</a>';
        } 
    } else {
        echo '<a class=\"btn btn-default btn-danger\" href="index.php?pagina=usuarios"><-Voltar</a>';
    }