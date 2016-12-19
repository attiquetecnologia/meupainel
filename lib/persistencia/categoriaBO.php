<?php

require_once '/lib/persistencia/conexao.php';
require_once '/lib/entidade/categoria.php';

/* 
 * Este software foi desenvolvido e criado por Rodrigo Attique Santana,
 * todos os algoritimos presentes aqui são de altoria do desenvolvedor, não sendo permitido
 * cópia ou distribuição sem o consentimento do mesmo.
 * É proibido vender, modificar, distribuir sem autorização.
 * copyright Attique Tecnologia.
 */

class CategoriaBO {

    function __construct() {
        
    }

    function insert(Categoria $categoria){
        $conexao = new Conexao();   //variável local para conexão
        try {
            $nome = $categoria->getNome();
            $insert = "insert into casabella_db.categoria(nome) values ('$nome')";    //string de inserção
            if ($conexao->criar_conexao()->query($insert)){
                $conexao->criar_conexao()->close();
                return TRUE;
            } else {
                $conexao->criar_conexao()->close();
                return FALSE;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }//fim insert
    
    function update(Categoria $categoria){
        $conexao = new Conexao();   //variável local para conexão
        try {
            $nome = $categoria->getNome();
            $id = $categoria->getId();
            $update = "update casabella_db.categoria set nome ='$nome' where id =$id";    //string update
            if ($conexao->criar_conexao()->query($update)){
                $conexao->criar_conexao()->close();
                return TRUE;
            } else {
                $conexao->criar_conexao()->close();
                return FALSE;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }//fim update
    
    
    function delete(Categoria $categoria){
        $conexao = new Conexao();   //variável local para conexão
        try {
            $id = $categoria->getId();
            $delete = "delete from casabella_db.categoria where id =$id";    //string update
            if ($conexao->criar_conexao()->query($delete)){
                $conexao->criar_conexao()->close();
                return TRUE;
            } else {
                $conexao->criar_conexao()->close();
                return FALSE;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }//fim insert
    
    function select(){
        $conexao = new Conexao(); //variável com mysqli conection
        $sql = "select * from casabella_db.categoria ct order by ct.nome asc"; //query de consulta
        $rs = $conexao->criar_conexao()->query($sql); //resultset
        $categorias = array();
        
        $rs->data_seek(0);
        while($row = $rs->fetch_assoc()){
            $categoria = new Categoria();
            $categoria->setId($row['id']);
            $categoria->setNome($row['nome']);
            $categorias[] = $categoria;
        }//fim while
        return $categorias;
    }//fim select
    
    function find($id){
        $conexao = new Conexao(); //variável com mysqli conection
        $sql = "select * from casabella_db.categoria ct where id =$id"; //query de consulta
        $rs = $conexao->criar_conexao()->query($sql); //resultset
        $rs->data_seek(0);
        while($row = $rs->fetch_assoc()){
            $categoria = new Categoria();
            $categoria->setId($row['id']);
            $categoria->setNome($row['nome']);
        }//fim while
        return $categoria;
    }//fim select
}//fim classe