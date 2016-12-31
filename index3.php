<?php
    include 'config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        
        <link rel="stylesheet" type="text/css" href="static/css/layout.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../css/pure-min.css" media="all" />
        <meta http-equiv="content-langague" content="pt-br" /> 
        <meta name="description" content="MEU PAINEL DE CONTROLE." /> 
        <meta name="keywords" content="php, primeiro, firts">

        <meta name="author" content="Rodrigo Attique" /> 
        <meta name="copyright" content="2015 rodrigoatique.com.br" /> 

        <title>Meu painel</title>
        <link rel="shortcut icon" href="" />
    </head>
    <body>
        <div class="pagina">
            
            <?php 
                
                if (!isset($_COOKIE["login"])){
                    //include_once 'login.php';
					include_once 'principal.php';
                } else {
                    include_once 'principal.php';
                }
            ?>
            
        </div><!-- fim pagina -->
    </body>
</html>