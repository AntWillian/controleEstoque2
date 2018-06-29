<?php
    switch ($_GET["controller"]) {


      case 'produtos':
    //  $contr = $_GET["controller"];
      //echo $contr;

      require_once("controllers/controller_produtos.php");
      require_once("models/produtos_class.php");


      switch ($_GET['modo']) {

        case 'novo':
              $controller_Produto= new controllerProduto();
              $controller_Produto::novo();
               //echo "string";
            break;

        case 'editar':
              $controller_Produto= new controllerProduto();
              $controller_Produto::editar();
               //echo "string";
            break;

      case 'excluir':
            $controller_Produto= new controllerProduto();
            $controller_Produto::excluir();
             //echo "string";
          break;


      }


      // movimentacao
      case 'movimentacao':

      require_once("controllers/controller_movimentacao.php");
      require_once("models/movimentacao_class.php");


      switch ($_GET['modo']) {

        case 'novo':
              $controller_movimentacao= new controllerMovimentacao();
              $controller_movimentacao::novo();
               //echo "string";
            break;

      case 'pesquisa':
            $controller_movimentacao= new controllerMovimentacao();
            $controller_movimentacao::pesquisa();
             //echo "string";
          break;


      }


      // movimentacao
      case 'movimentacaoPesquisa':

      require_once("controllers/controller_movimentacao.php");
      require_once("viewModel/movimentacoes_class.php");

      switch ($_GET['modo']) {

      case 'pesquisa':
            $controller_movimentacao= new controllerMovimentacao();
            $controller_movimentacao::pesquisa();
             //echo "string";
          break;


      }


      // graficos
      case 'graficoPesquisa':

      //Inclui as classes
      require_once("controllers/controller_movimentacao.php");
      require_once("models/grafico_class.php");

      switch ($_GET['modo']) {

      case 'pesquisa':
            $controller_movimentacao= new controllerMovimentacao();
            $controller_movimentacao::pesquisaGrafico();
             //echo "string";
          break;


      }

      // graficos
      case 'usuario':

      //Inclui as classes
      require_once("controllers/controller_usuario.php");
      require_once("models/usuario_class.php");

      switch ($_GET['modo']) {

      case 'novo':
            $controller_usuario= new controllerUsuario();
            $controller_usuario::novo();
             //echo "string";
          break;

      case 'login':
            $controller_usuario= new controllerUsuario();
            $controller_usuario::login();
             //echo "string";
          break;


      }

    }
 ?>
