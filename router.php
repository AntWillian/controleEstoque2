<?php
echo "string";
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

      }

    }
 ?>
