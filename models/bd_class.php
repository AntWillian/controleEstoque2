<?php

  class Mysql_db{
    private $serve;
    private $user;
    private $password;
    private $dataBaseName;


    public function __construct(){

       $this->server = "localhost";
       $this->user = "root";
       $this->password = "bcd127";
       $this->dataBaseName = "db_estoque";


    }
    public function Conectar(){
      try {
        $conexao = new PDO('mysql:host='.$this->server.';dbname='.$this->dataBaseName,
                            $this->user,$this->password);

                            return $conexao;
      } catch (PDOException $Error) {
          echo "erro ao conectar-se no banco de dados. <br>
                Linha do erro".$Error->getLine()."<br>
                mensagen do erro:".$Error->getMessage();
      }


    }

    public function Desconectar(){
        $conexao = null;
    }
  }

 ?>
