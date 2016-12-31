<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
        <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport"  content="width=device-width, initial-scale=1" />
        <!--<link rel="stylesheet" type="text/css" href="static/css/layout.css" media="all" />-->
        <link rel="stylesheet" type="text/css" href="static/css/bootstrap.css" media="all" />
        <link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="static/css/main.css" media="all" />

		<script src="static/js/bootstrap.js"> </script>
		<script src="static/js/jquery.js"> </script>
		<script src="static/js/bootstrap.js"> </script>
        
        <meta http-equiv="content-langague" content="pt-br" /> 
        <meta name="description" content="MEU PAINEL DE CONTROLE." /> 
        <meta name="keywords" content="php, primeiro, firts">
        <meta name="author" content="Rodrigo Attique" /> 
        <meta name="copyright" content="2016 rodrigoatique.com.br" /> 

        <title>Teste PHP</title>
        <link rel="shortcut icon" href="" />
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php?pagina=home">Meu Painel</a>
                    <button class="navbar-toggle" type="button"
                        data-target=".navbar-collapse" data-toggle="collapse">
                      Menu
                    </button>
                </div><!-- /navbar-header -->
                <ul class="nav navbar-nav collapse navbar-collapse">
                    <li class="active"><a href="index.php?pagina=home">Home</a></li>
                    <li><a href="index.php?pagina=usuarios">Usuarios</a></li>
                    <li><a href="index.php?pagina=rotativos">Rotativos</a></li>
                    <li><a href="index.php?pagina=categorias">Categorias</a></li>
                    <li><a href="index.php?pagina=produtos">Produtos</a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div><!-- /container-fluid -->
        </nav><!-- /nav-->
        
        <div id="home" class="jumbotron">
            <h2>Este é o meu painel versão bootstrap</h2>
        </div><!-- /container -->
        <div class="clearfix"></div>
    
        <?php 
            include 'config.php';
            include_once 'principal.php';
//            if (!isset($_COOKIE["login"])){
//                include_once 'login.php';
//                include_once 'principal.php';
//            } else {
//                
//            }
        ?>
        
        <div class="jumbotron" id="rodape">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-sm-2">
                        <ul class="list-inline">
                            <li><a href="#home">Home</a>
                            <li><a href="#home">Usuarios</a>
                            <li><a href="#home">Produtos</a>
                            <li><a href="#home">Banner</a>
                        </ul>
                    </div><!-- /col-->
                </div><!-- /row-->
            </div><!-- /container-fluid-->
        </div><!-- /rodape -->
    </body>
</html>