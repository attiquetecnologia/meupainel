<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
<?php
    include_once 'lib/entidade/Categoria.class.php';
    include_once 'lib/entidade/Produto.class.php';
    $categoria = new Categoria();
    $produto = new Produto();
    $produto->find($_GET['id']);
    
echo '
<div class="ttl-conteudo">
    Editar produto : '. $produto->getTitulo().
'</div>';
?>
<form action="" method="post" name="contato" enctype="multipart/form-data">
    
    <label for="categoria">Categoria</label>
    <select name="categoria">
    <?php
    
    foreach ($categoria->all() as $key) {
        if ($produto->getCategoria()->getId() == $key->getId()){
            echo '<option  selected="" value='.$key->getId().'">'.$key->getNome()."</option> \n";
        } else {
            echo '<option value='.$key->getId().'">'.$key->getNome()."</option> \n";
        }
    }
    ?>
    </select><br>
    <label for="titulo">Titulo</label>
    <input type="text" name="titulo" value="<?php echo $produto->getTitulo()?>"/><br>
    <label for="descricao">Descrição</label>
    <textarea name="descricao"><?php echo $produto->getDescricao()?></textarea><br>
    <label for="preco">Preco</label>
    <input type="text" name="preco" value="<?php echo $produto->getPreco()?>"/><br>
    <label for="ativo">Ativo</label>
    <input type="checkbox" name="ativo" <?php if ($produto->getAtivo()){echo 'checked=""';}?> value="on" /><br>
    <label for="imagem">Imagem</label>
    <input type="file" name="imagem" id="imagem" onchange="readURL(this)"/><br>
    <img id="preview" src="../<?php echo $produto->getImg_url()?>" width="200px"/><br>
    <label for="apagar">Marque para apagar</label>
    <input type="checkbox" name="apagar" value="on" /><br>
    <input type="submit" name="cadastrar"><br>
</form>

<?php
/*
 * caso haja o preencimento dos dados e a submissão do formulário, o
 * controlador, será chamado para interpretar a ação
 */
    if (isset($_POST["cadastrar"])){
        require_once 'lib/entidade/Produto.class.php';
        
        $categoria->setId($_POST['categoria']);
        $produto->setCategoria($categoria);
        $produto->setDescricao($_POST['descricao']);
        $produto->setTitulo($_POST['titulo']);
        $produto->setPreco($_POST['preco']);
        $produto->setAtivo(isset($_POST['ativo']));
        
        //apagar
        if (isset($_POST["apagar"])){
            if ($produto->apagar()) {
                echo "<hr>Produto '".$produto->getTitulo()."' foi apagado!<br>";
                echo '<a href="index.php?pagina=produtos"><-Voltar</a>';
                return;
            }
        }
        
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
        
        if ($produto->editar()){
            echo "<hr>Produto '".$produto->getTitulo()."' foi atualizado!<br>";
            echo '<a href="index.php?pagina=produtos"><-Voltar</a>';
        } 
    } else {
        echo '<a href="index.php?pagina=produtos"><-Voltar</a>';
    }
    