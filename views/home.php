<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Controle de estoque</title>
    <link rel="stylesheet" href="css/layout.css">
    <script src="js/jquery-3.3.1.min.js'"></script>
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>

  <header>
      <div class="imagem">
        <img src="images/house.png" alt="">
      </div>

      <div class="espaco">

      </div>

      <div class="dadosUser">
          <div class="nome">
            <div class="imgUser">
                <img src="images/user.png" alt="">
            </div>

            <div class="nomeUser">
                <p>Antonio willian</p>
            </div>
          </div>
      </div>
  </header>


    <!-- Principal -->

    <div class="Principal">
        <div class="menu">

          <div class="titulo_menu">
              <p>Produtos</p>
          </div>
          <div class="item_menu">
            <p><a href="?pag=gerenciamento">Gerenciamento</a></p>
          </div>

          <div class="item_menu">
            <p><a href="?pag=estoque">Estoque</a></p>
          </div>


        </div>

        <div class="conteudo_produtos">
            <?php
            $pag = $_GET['pag'];
            switch ($pag) {
              case 'gerenciamento':
                    require_once 'gerenciamento_view.php';
                break;


              }


          ?>


        </div>
    </div>


  </body>
</html>
