<?php
include_once '/lib/persistencia/categoriaBO.php';
/*
 * Este software foi desenvolvido e criado por Rodrigo Attique Santana,
 * todos os algoritimos presentes aqui são de altoria do desenvolvedor, não sendo permitido
 * cópia ou distribuição sem o consentimento do mesmo.
 * É proibido vender, modificar, distribuir sem autorização.
 * copyright Attique Tecnologia.
 */

/**
 /**
 * Classe categoria.
 * Esta classe é usada para gerenciar as categoria de produtos.
 * @author Rodrigo
 */
class Categoria {
    private $id;
    private $nome;
    private $produto;


    //construtor
    function __construct() {
        $this->id = 1;
        $this->nome = "Padrão";
    }

    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function getProduto() {
        return $this->produto;
    }

    function setProduto($produto) {
        $this->produto = $produto;
    }

    /**
     * Função salvar categoria
     */
    function salvar(){
        $categoriaBO = new CategoriaBO();
        return $categoriaBO->insert($this);
    }//fim salvar
    
    /**
     * Função atualizar categoria
     */
    function editar(){
        $categoriaBO = new CategoriaBO();
        return $categoriaBO->update($this);
    }//fim salvar
    
    /**
     * Função atualizar categoria
     */
    function delete(){
        $categoriaBO = new CategoriaBO();
        return $categoriaBO->delete($this);
    }//fim salvar
    
    /**
     * Retorna todas as categorias
     */
    function all(){
        $categoriaBO = new CategoriaBO();
        return $categoriaBO->select();
    }
    
    /**
     * Através do ID desta categoria ele retorna os dados no banco
     */
    function find($id){
        $categoriaBO = new CategoriaBO();
        $aux = $categoriaBO->find($id);
        $this->id = $aux->getId();
        $this->nome = $aux->getNome();
    }
}//fim classe