<script type="text/javacript">
    function aumenta(obj){
        obj.height=obj.height*3;
        obj.width=obj.width*3;
    }
    
    function diminui(obj){
        obj.height=obj.height/3;
        obj.width=obj.width/3;
    }
</script>
<div class="container-fluid">
    <div class="container">
		<form method="get" class="" role="form">
			<div class="dropdown">
			<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Categorias
				<span class="caret"></span></button>
				<ul class="dropdown-menu">
					<?php
						require_once 'lib/entidade/Categoria.class.php';
						$categoria = new Categoria();
							
						foreach ($categoria->all() as $value) {
							echo '<li><a href="index.php?pagina=produtos&pesquisar=produto&pesquisa='.$value->getNome().'">'.$value->getNome().'</a></li>'."\n";
						}//fim for
					?>
				</ul>
				
			</div>
            <input type="hidden" name="pagina" value="produtos"/>
            <input class="inputtext" type="text" name="pesquisa" placeholder="Pesquisar"/>
            <button type="submit" name="pesquisar" value="produto" class="btn btn-info">Procurar</button>
            <a class="btn btn-primary" href="index.php?pagina=addproduto">New</a>
        </form>
    </div>
	
    <div class="row">
        
<?php
require_once 'lib/entidade/Produto.class.php';
    $produto = new Produto();
    // VERIFICA PARA APAGAR UM PRODUTS
    if (isset($_GET['apagar'])){
        $produto->setId($_GET['apagar']);
        $produto->apagar();
    }
    /**
    * Verifica se o formulário de pesquisa foi enviado.
    * CAso não lista apenas o padrão, se não busca pelo que está
    * no formulário de pesquisa
    */
    
    if (isset($_GET["pesquisar"])){
        
        $produtos = $produto->like($_GET["pesquisa"]);
        if ($produtos == NULL){
            echo "<h1>Nada encontrado....</h1>";
            return;
        }
        foreach ($produtos as $key) {
            echo "<div class=\"col-md-2 col-sm-4 list-group-item\">";
            echo "<div class=\"item-thumb\">";
            echo "<img src='../".$key->getImg_url()."' alt='".$key->getTitulo()."'width='100px' height=\"100px\"onMouseOver='aumenta(this)' onMouseOut='diminui(this)'/>";
            echo "</div><!--/thumbnail-->";
            echo "<span><a href=\"index.php?pagina=editproduto&id="
					.$key->getId()."\">".$key->getTitulo()."</a></span>";
			echo "</div><!-- /col-md-2-->";
        }//fim foreach
        
    } else {
        echo '';
        foreach ($produto->all() as $key) {
            echo "<div class=\"col-md-2 col-sm-4 list-group-item\">";
            echo "<div class=\"item-thumb\">";
            echo "<img src='../".$key->getImg_url()."' alt='".$key->getTitulo()."'width='100px' height=\"100px\"onMouseOver='aumenta(this)' onMouseOut='diminui(this)'/>";
            echo "</div><!--/thumbnail-->";
            echo "<span><a href=\"index.php?pagina=editproduto&id="
					.$key->getId()."\">".$key->getTitulo()."</a></span>";
			echo "</div><!-- /col-md-3-->";
        }
    }//fim else

?>      
    </div><!-- /row-->
<a href="index.php?pagina=addproduto">New</a>
</div><!-- /container-->    