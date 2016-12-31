<?php
    /**
     * Este arquivo vai fazer um switch e redirecionar para as páginas selecionadas no menu
     */
    switch ($_GET['pagina']){
        /* INCLUDE USUARIOS */
        case "usuarios" :
            include_once './usuario/usuarios.php';
            break;
        case "newusuario" :
            include_once './usuario/new.php';
            break;
        case "delusuario" :
            include_once './usuario/delete.php';
            break;
        case "editusuario" :
            include_once './usuario/edit.php';
            break;
        /* INCLUDE CATEGORIAS */
        case "categorias" : 
            include_once './categoria/categorias.php';
            break;
        case "addcategoria" : 
            include_once './categoria/new.php'; 
            break;
        case "delcategoria" : 
            include_once './categoria/delete.php'; 
            break;
        case "editcategoria" : 
            include_once './categoria/edit.php'; 
            break;
        /* INCLUDE PRODUTOS */
        case "produtos" : 
            include_once './produto/produtos.php';
            break;
        case "addproduto" : 
            include_once './produto/new.php'; 
            break;
        case "delproduto" : 
            include_once './produto/delete.php'; 
            break;
        case "editproduto" : 
            include_once './produto/edit.php'; 
            break;
        /* INCLUDE ROTATIVOS */
        case "rotativos" : 
            include_once './rotativo/rotativos.php';
            break;
        case "addrotativo" : 
            include_once './rotativo/new.php'; 
            break;
        case "delrotativo" : 
            include_once './rotativo/delete.php'; 
            break;
        case "editrotativo" : 
            include_once './rotativo/edit.php'; 
            break;
        default : include 'home.php';
    }