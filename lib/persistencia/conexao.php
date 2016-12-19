<?php

/* 
 * Este software foi desenvolvido e criado por Rodrigo Attique Santana,
 * todos os algoritimos presentes aqui são de altoria do desenvolvedor, não sendo permitido
 * cópia ou distribuição sem o consentimento do mesmo.
 * É proibido vender, modificar, distribuir sem autorização.
 * copyright Attique Tecnologia.
 */

class Conexao {
    /* Criando uma conexão ao mysql */
    private $host = "localhost";
    private $user = "root";
    private $password = "123";
    private $database = "casabella_db";
    private $port = 3306;
    private $socket = "/tmp/mysql.sock";
    
    
    function criar_conexao(){
        /* @var $host type */
        /* @var $user type */
        /* @var $password type */
        /* @var $database type */
        /* @var $port type */
        /* @var $socket type */
        $conexao = new mysqli($this->host
                , $this->user
                , $this->password
                , $this->database
//                , $this->port
//                , $this->socket
                );
        
        if (mysqli_connect_errno()){
            die('Não foi possível conectar-se ao banco de dados: ' . mysqli_connect_error());
            return NULL;
        } else {
            return $conexao;
        }//fim se
    }//fim criar_conexao

}//fim classe