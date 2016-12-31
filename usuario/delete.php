<?php
    include_once '/lib/entidade/categoria.php';
    $categoria = new Categoria();
    $categoria->find($_GET['id']);
echo '
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<div class="ttl-conteudo">
    Deletar Categoria

</div>
<form action="" method="post" name="contato">
    <label for="nome">Nome</label>
    <input type="text" name="nome" value="'.$categoria->getNome().'"/>
    <input type="hidden" name="id" value="'.$categoria->getId().'"/>
    <input type="submit">
</form>
';
/*
 * caso haja o preencimento dos dados e a submissão do formulário, o
 * controlador, será chamado para interpretar a ação
 */
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once '/lib/entidade/categoria.php';
        $categoria = new Categoria();
        $categoria->setNome($_POST['nome']);
        $categoria->setId($_POST['id']);
        if ($categoria->editar()){
            echo '<hr>Categoria '.$categoria->getNome().' foi atualizada!<br>';
            echo '<a href="index.php?pagina=categorias"><-Voltar</a>';
        }

    } else {
        echo '<a href="index.php?pagina=categorias"><-Voltar</a>';
    }
?>

<input type=""