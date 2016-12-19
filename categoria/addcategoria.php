<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<div class="ttl-conteudo">
    Inserir Categoria
</div>
<form action="" method="post" name="contato">
    <label for="nome">Nome</label>
    <input type="text" name="nome" />
    <input type="submit">
</form>

<?php
/*
 * caso haja o preencimento dos dados e a submissão do formulário, o
 * controlador, será chamado para interpretar a ação
 */
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once '/lib/entidade/categoria.php';
        $categoria = new Categoria();
        $categoria->setNome($_POST['nome']);
        if ($categoria->salvar()){
            echo "<hr>Categoria '".$categoria->getNome()."' foi adicionada!<br>";
            echo '<a href="index.php?pagina=categorias"><-Voltar</a>';
        } 
    } else {
        echo '<a href="index.php?pagina=categorias"><-Voltar</a>';
    }
?>