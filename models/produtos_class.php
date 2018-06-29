<?php

  class Produto{


    public $idProduto;
    public $codigo;
    public $descricao;
    public $preco;
    public $quantidade;
    public $idCategoria;
    public $imagen;


    public  function __construct(){
      require_once('bd_class.php');
    }


    // CADASTRO DE NOVO PRODUTO
    public function Insert($dados){
      $sql="insert into tbl_produto ( codigo, descricao, preco, quantidade, idCategoria, imagen)
      values('".$dados->codigo."', '".$dados->descricao."', '".$dados->preco."', '".$dados->quantidade."', '".$dados->idCategoria."', 'nada')";

      echo $sql;


      $conex = new Mysql_db();

      $PDO_conex = $conex->Conectar();



        if ($PDO_conex->query($sql)) {
          //header("location:index.php?pag=carbook");
        }else{
          echo "erro";
        }

        $conex->Desconectar();
    }


    // SELECIONAR TODOS OS PRODUTOS
    public function Select(){

        $sql="select * from tbl_produto order by idProduto desc";

        $conex=new Mysql_db();
        //Faz a conexão com o banco
        $PDOconex = $conex->Conectar();

        //Executa o select no DB e guarda o retorno na variável select
        $select = $PDOconex->query($sql);

        $cont=0;

        while ($rs=$select->fetch(PDO::FETCH_ASSOC)) {
            $listProdutos[] = new Produto();

            $listProdutos[$cont]->idProduto=$rs['idProduto'];
            $listProdutos[$cont]->codigo=$rs['codigo'];
            $listProdutos[$cont]->descricao=$rs['descricao'];
            $listProdutos[$cont]->preco=$rs['preco'];
            $listProdutos[$cont]->quantidade=$rs['quantidade'];
            $listProdutos[$cont]->idCategoria=$rs['idCategoria'];
            $listProdutos[$cont]->imagen=$rs['imagen'];



            $cont+=1;
        }



        $conex->Desconectar();

        if (isset($listProdutos)) {
          return $listProdutos;
        }
      }


      // SELECIONAR TODOS OS PRODUTOS
      public function selectById($Produto){

          $sql="select * from tbl_produto where idProduto=".$Produto->idProduto;

          $conex=new Mysql_db();
          //Faz a conexão com o banco
          $PDOconex = $conex->Conectar();

          //Executa o select no DB e guarda o retorno na variável select
          $select = $PDOconex->query($sql);


          if ($rs=$select->fetch(PDO::FETCH_ASSOC)) {
              $listProdutos = new Produto();

              $listProdutos->idProduto=$rs['idProduto'];
              $listProdutos->codigo=$rs['codigo'];
              $listProdutos->descricao=$rs['descricao'];
              $listProdutos->preco=$rs['preco'];
              $listProdutos->quantidade=$rs['quantidade'];
              $listProdutos->idCategoria=$rs['idCategoria'];
              $listProdutos->imagen=$rs['imagen'];

          }



          $conex->Desconectar();

          if (isset($listProdutos)) {
            return $listProdutos;
          }
        }


        public function Update($dados){


              $sql = "UPDATE tbl_produto SET
                      codigo='".$dados->codigo."',
                      preco='".str_replace(",", ".", $dados->preco)."',
                      descricao='".$dados->descricao."',
                      quantidade='".$dados->quantidade."',
                      idCategoria='".$dados->idCategoria."'
                      WHERE idProduto=".$dados->idProduto;



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


          public function Delete($dados){
              $sql="Delete from tbl_movimentacao where idProduto=".$dados->idProduto;
              echo $sql;
              $conex = new Mysql_db();

              $PDO_conex = $conex->Conectar();



              if ($PDO_conex->query($sql)) {

                $sql="Delete from tbl_produto where idProduto=".$dados->idProduto;
                echo $sql;
                $conex = new Mysql_db();

                $PDO_conex = $conex->Conectar();



                if ($PDO_conex->query($sql)) {
                  //header("location:index.php?pag=gerenciamento");
                }


              }else{
                echo "erro ao deletar";
              }

              $conex->Desconectar();

            }



  }

 ?>
