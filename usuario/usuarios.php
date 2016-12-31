<div class="container-fluid" id="usuarios">
    <div class="navbar nav">
        <a class="btn btn-default btn-primary" href="index.php?pagina=newusuario">New</a>
    </div>
    <div class="row">
        <?php
        require_once 'lib/entidade/Usuario.class.php';
        $usuario = new Usuario();
        foreach ($usuario->all() as $key) {
            echo "<div class=\"col-md-3 item\">";
            echo "<ul class=\"list-group-item\">";
            echo "<li>ID:".(string)$key->getId()."</li>";
            echo "<li>Nome:<a href=\"index.php?pagina=editusuario&id=".$key->getId()."\">".(string)$key->getNome()."</a></li>";
            echo "<li>E-mail:".(string)$key->getEmail()."</li>";
            echo "</ul>";
            echo "</div> <!--/col-md-3-->";
        }
        ?> 
    </div><!-- /row -->
</div><!-- /usuarios -->