<meta charset="utf-8" content="text/html" />
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

/* 
 * Este software foi desenvolvido e criado por Rodrigo Attique Santana,
 * todos os algoritimos presentes aqui são de altoria do desenvolvedor, não sendo permitido
 * cópia ou distribuição sem o consentimento do mesmo.
 * É proibido vender, modificar, distribuir sem autorização.
 * copyright Attique Tecnologia.
 */


//inserindo
$insert = "insert into test.pessoa (nome) values ('".$_POST['nome']."')";
if (!$mysqli->query($insert)){
    echo '<h3>Cara não deu certo!</h3>';
    echo '<h3>'.$mysqli->errno.'</h3>';
    echo '<h3>'.$mysqli->error.'</h3>';
    echo '<h3>'.$insert.'</h3>';
} else {
    echo '<h1> Obrigado '.$_POST['nome'].'!</h1>';
    echo '<h2> Em breve estaremos respondendo sua mensagem!</h2>';
    echo '<p>'.$_POST["mensagem"].'</p>';
}
echo '<a href="index.php?pagina"><- Voltar</a>';


?>
