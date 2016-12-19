<?php
    /**
     * Este arquivo vai fazer um switch e redirecionar para as páginas selecionadas no menu
     */
   
    switch ($_GET['pagina']){
        case "tickets" :
            include 'tickets.php';
            break;
        case "contato" :
            include 'contato.php';
            break;
        case "categorias" : 
            include '/categoria/categorias.php'; 
            break;
        case "addcategoria" : 
            include '/categoria/addcategoria.php'; 
            break;
        case "editcategoria" : 
            include '/categoria/editcategoria.php'; 
            break;
        default : include 'home.php';
    }
    
?>