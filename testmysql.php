<?php 
$link = mysql_connect('localhost','root'); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
echo 'Connection OK'; mysql_close($link); 

mysql_select_db("test") or die(mysql_error());
//query SQL
$strSQL = "SELECT * FROM pessoa";

// Executa a query (o recordset $rs contém o resultado da query)
	$rs = mysql_query($strSQL);
	
	// Loop pelo recordset $rs
	// Cada linha vai para um array ($row) usando mysql_fetch_array
	while($row = mysql_fetch_array($rs)) {

	   // Escreve o valor da coluna FirstName (que está no array $row)
	  echo $row['nome'] . "<br />";

	  }

	// Encerra a conexão
	mysql_close();
?> 