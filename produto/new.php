<script type="text/javascript">
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('preview').src=e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<div class="ttl-conteudo">
    Inserir Produto
</div>
<form action="#" method="post" name="contato" enctype="multipart/form-data">
    <label for="categoria">Categoria</label>
    <select name="categoria">
    <?php
    require_once 'lib/entidade/Categoria.class.php';
    $categoria = new Categoria();
    foreach ($categoria->all() as $key) {
        echo '<option value='.$key->getId().'">'.$key->getNome()."</option>";
    }
    ?>
    </select><br>
    <label for="titulo">Titulo</label>
    <input type="text" name="titulo" /><br>
    <label for="descricao">Descrição</label>
    <textarea name="descricao"></textarea><br>
    <label for="preco">Preco</label>
    <input type="text" name="preco" /><br>
    <label for="ativo">Ativo</label>
    <input type="checkbox" name="ativo" checked="" value="on" /><br>
    <label for="imagem">Imagem</label>
    <input type="file" name="imagem" id="imagem" onchange="readURL(this)"/><br>
    <img id="preview" src="#" width="200px"/><br>
    <input type="submit" name="cadastrar"><br>
</form>

<?php
/*
 * caso haja o preencimento dos dados e a submissão do formulário, o
 * controlador, será chamado para interpretar a ação
 */
    if (isset($_POST["cadastrar"])){
        require_once 'lib/entidade/Produto.class.php';
        $produto = new Produto();
        $categoria->setId($_POST['categoria']);
        $produto->setCategoria($categoria);
        $produto->setDescricao($_POST['descricao']);
        $produto->setTitulo($_POST['titulo']);
        $produto->setPreco($_POST['preco']);
        $produto->setAtivo(isset($_POST['ativo']));
        
        /* Criando o upload da imagem */
        $raiz_imagem = "itens_produtos/";
        //  verifica se existe foto para salvar
        if (!empty($_FILES["imagem"]["name"])){
            
            if (!preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $_FILES["imagem"]["type"])){
                echo "O tipo selecionado não é permitido!";
            }
            
            $dimensoes = getimagesize($_FILES["imagem"]["tmp_name"]);
            
            $nome_imagem = $raiz_imagem.$_FILES["imagem"]["name"];
            $produto->setImg_url($nome_imagem);
            move_uploaded_file($_FILES["imagem"]["tmp_name"], "../".$raiz_imagem.$_FILES["imagem"]["name"]);
            
        }
        
        
        if ($produto->salvar()){
            echo "<hr>Produto '".$produto->getTitulo()."' foi adicionada!<br>";
            echo '<a href="index.php?pagina=produtos"><-Voltar</a>';
        } 
    } else {
        echo '<a href="index.php?pagina=produtos"><-Voltar</a>';
    }