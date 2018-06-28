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

  }



  ?>
