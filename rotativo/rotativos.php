<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<div class="ttl-conteudo">
    Categorias
</div>
<a href="index.php?pagina=addcategoria">New</a>
<table class="w3-table-all">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
        </tr>
    </thead>
    <tbody>

<?php
echo $_SERVER['DOCUMENT_ROOT'];
require_once $_SERVER['DOCUMENT_ROOT'].'casabellabarretos/lib/entidade/categoria.php';

$categoria = new Categoria();
foreach ($categoria->all() as $key) {
    echo "<tr>";
    echo "<td>".$key->getId()."</td>";
    echo '<td><a href="index.php?pagina=editcategoria&id='.$key->getId().'">'.$key->getNome()."</a></td>";
    echo "</tr>";
}
?>      
</tbody>
</table>
<a href="index.php?pagina=addcategoria">New</a>