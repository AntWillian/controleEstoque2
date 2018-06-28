<div class="conteudo_produtos2">
  <h1>Produtos</h1>

  <div class="botoes">
    <div class="novoProduto" data-toggle="modal" data-target="#exampleModal">

    </div>

    <div class="novoProduto" data-toggle="modal" data-target="#exampleModalMovimentacao">

    </div>

    <div class="dados">

        <table class="table ls-table">
          <thead>
            <tr>

              <th class="hidden-xs">Nome</th>
              <th class="hidden-xs">Cpf
              <th class="hidden-xs">Usuario</th>
              <th class="ls-table-actions">Data nasc.</th>
              <th class="hidden-xs">Ações</th>

            </tr>
          </thead>
          <tbody>

            <?php
            //Inclui as classes
            require_once("controllers/controller_produtos.php");
            require_once("models/produtos_class.php");


            $controller_cadUser= new controllerProduto();
            $list = $controller_cadUser::Selecionar();
            $cont = 0;

            while ($cont <count($list)) {

              if ($cont%2==0) {
                 $cor='cor1';
               }else {
                 $cor='cor2';
               }

           ?>
            <tr class="<?php echo $cor ?>">
              <td><?php echo (utf8_decode("# ".$list[$cont]->codigo)) ?></td>
              <td><?php echo (utf8_decode($list[$cont]->descricao)) ?></td>
              <td><?php
               echo (utf8_decode("R$ ".str_replace(".", ",", $list[$cont]->preco)))
               ?></td>
              <td><?php echo (utf8_decode($list[$cont]->quantidade)) ?></td>
              <td>
                <a href="/assets/javascripts/manual/fake-response/save.json" data-confirm-text="Confirma exclusão do item?" class="text-danger">
                  Excluir
                </a>
              </td>
            </tr>

            <?php
            $cont +=1;
            }
             ?>
          </tbody>
        </table>
    </div>

    <?php


      // print_r($produtos);
     ?>
  </div>
