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
              $controller_cadUser= new controllerProduto();
              $controller_cadUser::novo();
               //echo "string";
            break;

      }

    }
 ?>
