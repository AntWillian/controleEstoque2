<?php



  class controllerMovimentacao{


    //CADASTRO DE PRODUTOS
    public function novo(){
        session_start();
        $movimentacao = new Movimentacao();
        $movimentacao ->idProduto = $_POST['slcProduto'];
        $movimentacao ->idTipoMovimentacao = $_POST['slcTipo'];
        $movimentacao ->quantidade = $_POST['txtQuantidade'];
        $movimentacao ->descricao = $_POST['txtDescricao'];
        if (isset($_SESSION['idUsuario'])) {
        $id = $_SESSION['idUsuario'];
      //  echo $id;
        $movimentacao ->idUsuario =$id;
        }





        $movimentacao::Insert($movimentacao);
      }


      public function SelecionarGrafico(){
        $movimentacao= new controllerGrafico();
        return $movimentacao::SelectGrafico();
      }

      public function Selecionar(){
        $movimentacao= new Movimentacoes();
        return $movimentacao::Select();
      }

      public function pesquisa(){
        $movimentacao= new Movimentacoes();

        @$selecao = $_POST['slcMes'];

        if ($selecao == "") {
          $movimentacao ->mes = "";
        }else {
          $movimentacao ->mes = $_POST['slcMes'];
        }




        return $movimentacao::pesquisa($movimentacao);
      }


      public function pesquisaGrafico(){
        $movimentacao= new controllerGrafico();

        @$selecao = $_POST['slcMes'];

        if ($selecao == "") {
          $movimentacao ->mes = "";
        }else {
          $movimentacao ->mes = $_POST['slcMes'];
        }




        return $movimentacao::pesquisa($movimentacao);
      }



  }



  ?>
