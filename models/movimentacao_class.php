<?php

class Movimentacao{


  public $idMovimentacao;
  public $idProduto;
  public $idTipoMovimentacao;
  public $idUsuario;
  public $descricao;
  public $quantidade;

  public $quantidadeProduto;

  public  function __construct(){
    require_once('bd_class.php');
  }

  // NOVA MOVIMENTACAO
  public function Insert($dados){
    $sql="insert into tbl_movimentacao (idProduto, idTipoMovimentacao, idUsuario, descricao, quantidade,data)
    values('".$dados->idProduto."', '".$dados->idTipoMovimentacao."', '".$dados->idUsuario."', '".$dados->descricao."', '".$dados->quantidade."',CURDATE())";

    echo $sql."</br>";


    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();



      if ($PDO_conex->query($sql)) {

        $sql="select * from tbl_produto where idProduto=".$dados->idProduto;

        $conex=new Mysql_db();
        //Faz a conexão com o banco
        $PDOconex = $conex->Conectar();

        //Executa o select no DB e guarda o retorno na variável select
        $select = $PDOconex->query($sql);


        if ($rs=$select->fetch(PDO::FETCH_ASSOC)) {
            $listProdutos = new Movimentacao();

            $totalQuantidade=$listProdutos->quantidadeProduto=$rs['quantidade'];

            if ($dados->idTipoMovimentacao == 1) {

              $totalMovimentacao=$dados->quantidade;

              $saidaTotal = $totalQuantidade - $totalMovimentacao;

              $sql = "UPDATE tbl_produto SET
                  quantidade='".$saidaTotal."'
                  WHERE idProduto=".$dados->idProduto;
                  echo $sql."</br>";


              $conex = new Mysql_db();

              $PDO_conex = $conex->Conectar();



                if ($PDO_conex->query($sql)) {
                  header("location:index.php?pag=estoque");
                }

        }else {
          $totalMovimentacao=$dados->quantidade;

          $saidaTotal = $totalQuantidade + $totalMovimentacao;

          $sql = "UPDATE tbl_produto SET
              quantidade='".$saidaTotal."'
              WHERE idProduto=".$dados->idProduto;
              echo $sql."</br>";


          $conex = new Mysql_db();

          $PDO_conex = $conex->Conectar();



            if ($PDO_conex->query($sql)) {
              header("location:index.php?pag=estoque");
            }
        }


        }
        //header("location:index.php?pag=estoque");
      }else{
        echo "erro";
      }

      $conex->Desconectar();
  }

}



 ?>
