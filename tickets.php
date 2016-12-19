<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<div class="ttl-conteudo">
    Tickets
</div>
<table border="1" cellpadding="2">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>

<?php
/* Criando uma conexão ao mysql */
$host = "localhost";
$user = "root";
$password = "123";
$database = "test";
$port = 3306;
$socket = "/tmp/mysql.sock";

$mysqli = new mysqli($host, $user);
if ($mysqli->connect_errno){ //se conectar sem erro nenhum
   echo 'Falha na conexão ao Mysql: ('.$mysqli->connect_errno.") ".$mysqli->connect_error;
}
echo $mysqli->host_info."\n";

//inserindo
$select = "select * from test.pessoa";
$res = $mysqli->query($select);
$res->data_seek(0);
while ($row = $res->fetch_assoc()){
    $id = $row['id'];
    $nome = $row['nome'];
    echo " <tr>";
    echo "  <td>".$id."</td>";
    echo "  <td>".$nome."</td>";
    echo "  <td><a href='index.php?pagina=edit_ticket&ticket=".$id."'>Edit</a></td>
            <td><a href='index.php?pagina=delete_ticket&ticket=".$id."'>Delete</a></td>
        </tr>";
}//fim while
?>      
</tbody>
</table>