<?php

class Movimentacao{


  public $idMovimentacao;
  public $idProduto;
  public $idTipoMovimentacao;
  public $idUsuario;
  public $descricao;
  public $quantidade;

  public  function __construct(){
    require_once('bd_class.php');
  }

  // NOVA MOVIMENTACAO
  public function Insert($dados){
    $sql="insert into tbl_movimentacao (idProduto, idTipoMovimentacao, idUsuario, descricao, quantidade,data)
    values('".$dados->idProduto."', '".$dados->idTipoMovimentacao."', '".$dados->idUsuario."', '".$dados->descricao."', '".$dados->quantidade."',CURDATE())";

    echo $sql;


    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();



      if ($PDO_conex->query($sql)) {
        header("location:index.php?pag=gerenciamento");
      }else{
        echo "erro";
      }

      $conex->Desconectar();
  }

}



 ?>
