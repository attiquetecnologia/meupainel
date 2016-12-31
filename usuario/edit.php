<?php
    include_once 'lib/entidade/Usuario.class.php';
    $usuario = new Usuario();
    $usuario->find($_GET['id']);
echo '
<div class="container">
    Editar Usuario : '.$usuario->getNome().'

<form action="" method="post" name="contato">
    <label for="nome">Nome</label>
    <input type="text" name="nome" value="'.$usuario->getNome().'"/><br>
    <label for="email">Email</label>
    <input type="text" name="email" value="'.$usuario->getEmail().'" /><br>
    <label for="permissao">Permissao</label>
    <input type="text" name="permissao" value="'.$usuario->getPermissao().'"/><br>
    <label for="ativo">Ativo</label>
    <input type="checkbox" name="ativo" '; 
if ($usuario->getAtivo() == 1) { echo 'checked=""'; }
echo ' value="on" /><br>
    <label for="apagar">Marque para apagar</label>
    <input type="checkbox" name="apagar" value="on" /><br>
    <input type="hidden" name="id" value="'.$usuario->getId().'"/>
    <input class="btn btn-default btn-primary" type="submit"><br>
</form>
</div>
';
/*
 * caso haja o preencimento dos dados e a submissão do formulário, o
 * controlador, será chamado para interpretar a ação
 */
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once 'lib/entidade/Usuario.class.php';
        $usuario = new Usuario();
        $usuario->setId($_POST['id']);
        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setPermissao($_POST['permissao']);
        $usuario->setAtivo(isset($_POST['ativo']));
        
        if (isset($_POST['apagar'])){
            if ($usuario->delete()){
                echo '<hr>Usuario '.$usuario->getNome().' foi apagada!<br>';
                echo '<a class="btn btn-default btn-danger" href="index.php?pagina=usuarios"><-Voltar</a>';
            }
        } else {
        
            if ($usuario->editar()){
                echo '<hr>Usuario '.$usuario->getNome().' foi atualizada!<br>';
                echo '<a class="btn btn-default btn-danger" href="index.php?pagina=usuarios"><-Voltar</a>';
            }
        }//fim se for apagar

    } else {
        echo '<a class="btn btn-default btn-danger" href="index.php?pagina=usuarios"><-Voltar</a>';
    }
?>