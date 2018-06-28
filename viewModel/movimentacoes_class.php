<?php

class Movimentacoes{

  public $idMovimentacao;
  public $descricao;
  public $quantidadeMovimentacao;
  public $idUsuario;
  public $nome;
  public $idProduto;
  public $codigo;
  public $descricaoProduto;
  public $preco;
  public $quantidade;
  public $idCategoria;
  public $imagen;
  public $idTipoMovimentacao;
  public $tipo;
  public $data;
  public $mes;

  public  function __construct(){
    require_once('models/bd_class.php');
  }


  // SELECIONAR TODOS OS PRODUTOS
  public function Select(){

      $sql="select * from view_movimentacoes order by idMovimentacao desc";

      $conex=new Mysql_db();
      //Faz a conexão com o banco
      $PDOconex = $conex->Conectar();

      //Executa o select no DB e guarda o retorno na variável select
      $select = $PDOconex->query($sql);

      $cont=0;

      while ($rs=$select->fetch(PDO::FETCH_ASSOC)) {
          $listProdutos[] = new Movimentacoes();

          $listProdutos[$cont]->idMovimentacao=$rs['idMovimentacao'];
          $listProdutos[$cont]->descricao=$rs['descricao'];
          $listProdutos[$cont]->quantidadeMovimentacao=$rs['quantidadeMovimentacao'];
          $listProdutos[$cont]->idUsuario=$rs['idUsuario'];
          $listProdutos[$cont]->nome=$rs['nome'];
          $listProdutos[$cont]->idProduto=$rs['idProduto'];
          $listProdutos[$cont]->codigo=$rs['codigo'];
          $listProdutos[$cont]->descricaoProduto=$rs['descricaoProduto'];
          $listProdutos[$cont]->preco=$rs['preco'];
          $listProdutos[$cont]->quantidade=$rs['quantidade'];
          $listProdutos[$cont]->idCategoria=$rs['idCategoria'];
          $listProdutos[$cont]->imagen=$rs['imagen'];
          $listProdutos[$cont]->idTipoMovimentacao=$rs['idTipoMovimentacao'];
          $listProdutos[$cont]->tipo=$rs['tipo'];
          $listProdutos[$cont]->data=implode("/",array_reverse(explode("-",$rs['data'])));
          $listProdutos[$cont]->mes=$rs['mes'];



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
        $sql="select * from view_movimentacoes order by idMovimentacao desc";

        //echo $sql;
        $conex=new Mysql_db();
        //Faz a conexão com o banco
        $PDOconex = $conex->Conectar();

        //Executa o select no DB e guarda o retorno na variável select
        $select = $PDOconex->query($sql);

        $cont=0;

        while ($rs=$select->fetch(PDO::FETCH_ASSOC)) {
            $listProdutos[] = new Movimentacoes();

            $listProdutos[$cont]->idMovimentacao=$rs['idMovimentacao'];
            $listProdutos[$cont]->descricao=$rs['descricao'];
            $listProdutos[$cont]->quantidadeMovimentacao=$rs['quantidadeMovimentacao'];
            $listProdutos[$cont]->idUsuario=$rs['idUsuario'];
            $listProdutos[$cont]->nome=$rs['nome'];
            $listProdutos[$cont]->idProduto=$rs['idProduto'];
            $listProdutos[$cont]->codigo=$rs['codigo'];
            $listProdutos[$cont]->descricaoProduto=$rs['descricaoProduto'];
            $listProdutos[$cont]->preco=$rs['preco'];
            $listProdutos[$cont]->quantidade=$rs['quantidade'];
            $listProdutos[$cont]->idCategoria=$rs['idCategoria'];
            $listProdutos[$cont]->imagen=$rs['imagen'];
            $listProdutos[$cont]->idTipoMovimentacao=$rs['idTipoMovimentacao'];
            $listProdutos[$cont]->tipo=$rs['tipo'];
            $listProdutos[$cont]->data=implode("/",array_reverse(explode("-",$rs['data'])));
            $listProdutos[$cont]->mes=$rs['mes'];



            $cont+=1;
        }
      }else {
        $sql="select * from view_movimentacoes where mes=".$mesSelecionado." order by idMovimentacao desc";
        //  echo $sql;
        $conex=new Mysql_db();
        //Faz a conexão com o banco
        $PDOconex = $conex->Conectar();

        //Executa o select no DB e guarda o retorno na variável select
        $select = $PDOconex->query($sql);

        $cont=0;

        while ($rs=$select->fetch(PDO::FETCH_ASSOC)) {
            $listProdutos[] = new Movimentacoes();

            $listProdutos[$cont]->idMovimentacao=$rs['idMovimentacao'];
            $listProdutos[$cont]->descricao=$rs['descricao'];
            $listProdutos[$cont]->quantidadeMovimentacao=$rs['quantidadeMovimentacao'];
            $listProdutos[$cont]->idUsuario=$rs['idUsuario'];
            $listProdutos[$cont]->nome=$rs['nome'];
            $listProdutos[$cont]->idProduto=$rs['idProduto'];
            $listProdutos[$cont]->codigo=$rs['codigo'];
            $listProdutos[$cont]->descricaoProduto=$rs['descricaoProduto'];
            $listProdutos[$cont]->preco=$rs['preco'];
            $listProdutos[$cont]->quantidade=$rs['quantidade'];
            $listProdutos[$cont]->idCategoria=$rs['idCategoria'];
            $listProdutos[$cont]->imagen=$rs['imagen'];
            $listProdutos[$cont]->idTipoMovimentacao=$rs['idTipoMovimentacao'];
            $listProdutos[$cont]->tipo=$rs['tipo'];
            $listProdutos[$cont]->data=implode("/",array_reverse(explode("-",$rs['data'])));
            $listProdutos[$cont]->mes=$rs['mes'];

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
