<?php
    include_once 'lib/entidade/Categoria.class.php';
    $categoria = new Categoria();
    $categoria->find($_GET['id']);
echo '
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<div class="ttl-conteudo">
    Editar Categoria : '.$categoria->getNome().'

</div>
<form action="" method="post" name="contato">
    <label for="nome">Nome</label>
    <input type="text" name="nome" value="'.$categoria->getNome().'"/><br>
    <label for="apagar">Marque para apagar</label>
    <input type="checkbox" name="apagar" value="on" /><br>
    <input type="hidden" name="id" value="'.$categoria->getId().'"/>
    <input type="submit">
</form>
';
/*
 * caso haja o preencimento dos dados e a submissão do formulário, o
 * controlador, será chamado para interpretar a ação
 */
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once 'lib/entidade/Categoria.class.php';
        $categoria = new Categoria();
        $categoria->setNome($_POST['nome']);
        $categoria->setId($_POST['id']);
        
        if (isset($_POST['apagar'])){
            if ($categoria->delete()){
                echo '<hr>Categoria '.$categoria->getNome().' foi apagada!<br>';
                echo '<a href="index.php?pagina=categorias"><-Voltar</a>';
            }
        } else {
        
            if ($categoria->editar()){
                echo '<hr>Categoria '.$categoria->getNome().' foi atualizada!<br>';
                echo '<a href="index.php?pagina=categorias"><-Voltar</a>';
            }
        }//fim se for apagar

    } else {
        echo '<a href="index.php?pagina=categorias"><-Voltar</a>';
    }
?>