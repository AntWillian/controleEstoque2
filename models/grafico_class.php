<?php

class controllerGrafico{



  public $mes;
  public $idTipoMovimentacao;
  public $data;
  public $movimentos;
  public $quantidade;


  public  function __construct(){
    require_once('bd_class.php');
  }



  // SELECT PARA MONTAR O GRAFICO
  public function SelectGrafico(){

      $sql="select mes,idTipoMovimentacao,data, SUM(quantidade) as movimentos,COUNT(quantidade) as quantidade from tbl_movimentacao GROUP BY data,idTipoMovimentacao;";

      $conex=new Mysql_db();
      //Faz a conexão com o banco
      $PDOconex = $conex->Conectar();

      //Executa o select no DB e guarda o retorno na variável select
      $select = $PDOconex->query($sql);

      $cont=0;

      while ($rs=$select->fetch(PDO::FETCH_ASSOC)) {
          $listProdutos[] = new controllerGrafico();

          $listProdutos[$cont]->mes=$rs['mes'];
          $listProdutos[$cont]->idTipoMovimentacao=$rs['idTipoMovimentacao'];
          $listProdutos[$cont]->data=implode("/",array_reverse(explode("-",$rs['data'])));
          $listProdutos[$cont]->movimentos=$rs['movimentos'];
          $listProdutos[$cont]->quantidade=$rs['quantidade'];



          $cont+=1;
      }



      $conex->Desconectar();

      if (isset($listProdutos)) {
        return $listProdutos;
      }
    }


    // SELECIONAR por filtro
    public function pesquisa($dados){

      $mesSelecionado = $dados->mes;

      if ($mesSelecionado == 13 || $mesSelecionado == '') {
        $sql="select mes,idTipoMovimentacao,data, SUM(quantidade) as movimentos,COUNT(quantidade) as quantidade from tbl_movimentacao GROUP BY data,idTipoMovimentacao;";

        $conex=new Mysql_db();
        //Faz a conexão com o banco
        $PDOconex = $conex->Conectar();

        //Executa o select no DB e guarda o retorno na variável select
        $select = $PDOconex->query($sql);

        $cont=0;

        while ($rs=$select->fetch(PDO::FETCH_ASSOC)) {
            $listProdutos[] = new controllerGrafico();

            $listProdutos[$cont]->mes=$rs['mes'];
            $listProdutos[$cont]->idTipoMovimentacao=$rs['idTipoMovimentacao'];
            $listProdutos[$cont]->data=implode("/",array_reverse(explode("-",$rs['data'])));
            $listProdutos[$cont]->movimentos=$rs['movimentos'];
            $listProdutos[$cont]->quantidade=$rs['quantidade'];



            $cont+=1;
        }

      }else {
        $sql="select mes,idTipoMovimentacao,data, SUM(quantidade) as movimentos,COUNT(quantidade) as quantidade from tbl_movimentacao where mes=".$mesSelecionado." GROUP BY data,idTipoMovimentacao;";

        //echo $sql;
        $conex=new Mysql_db();
        //Faz a conexão com o banco
        $PDOconex = $conex->Conectar();

        //Executa o select no DB e guarda o retorno na variável select
        $select = $PDOconex->query($sql);

        $cont=0;

        while ($rs=$select->fetch(PDO::FETCH_ASSOC)) {
            $listProdutos[] = new controllerGrafico();

            $listProdutos[$cont]->mes=$rs['mes'];
            $listProdutos[$cont]->idTipoMovimentacao=$rs['idTipoMovimentacao'];
            $listProdutos[$cont]->data=implode("/",array_reverse(explode("-",$rs['data'])));
            $listProdutos[$cont]->movimentos=$rs['movimentos'];
            $listProdutos[$cont]->quantidade=$rs['quantidade'];



            $cont+=1;
        }

      }

        $conex->Desconectar();

        if (isset($listProdutos)) {

          //header("location:index.php?pag=estoque");
          return $listProdutos;
        }
      }


}



 ?>
