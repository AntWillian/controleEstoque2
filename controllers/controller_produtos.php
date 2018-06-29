<?php



  class controllerProduto{


    //CADASTRO DE PRODUTOS
    public function novo(){
        $produtos = new Produto();
        $produtos ->codigo = $_POST['txtCodigo'];
        $produtos ->descricao = $_POST['txtDescricao'];
        $produtos ->preco = $_POST['txtPreco'];
        $produtos ->idCategoria = $_POST['slccategoria'];
        $produtos ->quantidade = $_POST['txtQuantidade'];


        $produtos::Insert($produtos);
      }


      public function Selecionar(){
        $Produto= new Produto();
        return $Produto::Select();
      }

      // BUSCAR POR ID
    public function Buscar(){

      $idProduto=$_GET['idProduto'];

      $Produto= new Produto();

      $Produto->idProduto = $idProduto;

      return $Produto::selectById($Produto);

    }

    public function editar(){
        $produtos = new Produto();
        $idProduto=$_GET['idProduto'];
        $produtos ->codigo = $_POST['txtCodigo'];
        $produtos ->descricao = $_POST['txtDescricao'];
        $produtos ->preco = $_POST['txtPreco'];
        $produtos ->idCategoria = $_POST['slccategoria'];
        $produtos ->quantidade = $_POST['txtQuantidade'];
        $produtos ->idProduto = $idProduto;


        $produtos::update($produtos);
      }

      public function excluir(){
            $idProduto=$_GET['idProduto'];

            $produtos = new Produto();

            $produtos->idProduto = $idProduto;

            $produtos::Delete($produtos);
        }

  }



  ?>
