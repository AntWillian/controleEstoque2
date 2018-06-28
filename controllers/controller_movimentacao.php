<?php



  class controllerMovimentacao{


    //CADASTRO DE PRODUTOS
    public function novo(){
        $movimentacao = new Movimentacao();
        $movimentacao ->idProduto = $_POST['slcProduto'];
        $movimentacao ->idTipoMovimentacao = $_POST['slcTipo'];
        $movimentacao ->quantidade = $_POST['txtQuantidade'];
        $movimentacao ->descricao = $_POST['txtDescricao'];

        $movimentacao ->idUsuario =1;



        $movimentacao::Insert($movimentacao);
      }


      public function Selecionar(){
        $movimentacao= new Movimentacoes();
        return $movimentacao::Select();
      }

  }



  ?>
