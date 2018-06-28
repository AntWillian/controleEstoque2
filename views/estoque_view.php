<div class="conteudo_produtos2">
  <h1>Produtos</h1>

  <div class="botoes">

    <div class="novoProduto" data-toggle="modal" data-target="#exampleModalMovimentacao">

    </div>

  </div>



  <div class="dados">

      <table class="table ls-table">
        <thead>
          <tr>
            <th class="ls-nowrap col-xs-3">Data</th>
            <th class="hidden-xs">Entidade
            <th class="hidden-xs">Tipo</th>
            <th class="hidden-xs">Qnt. movim.</th>
            <th class="ls-table-actions">Descricao</th>
          </tr>
        </thead>
        <tbody>

          <?php
          //Inclui as classes
          require_once("controllers/controller_movimentacao.php");
          require_once("viewModel/movimentacoes_class.php");


          $controller_movimentacao= new controllerMovimentacao();
          $list=$controller_movimentacao::Selecionar();
          $cont = 0;

          while ($cont <count($list)) {

            if ($list[$cont]->idTipoMovimentacao == 1) {
               $cor='corSaida';
             }else {
               $cor='corEntrada';
             }

         ?>
          <tr class="<?php echo $cor ?>">
            <td><?php echo (utf8_decode($list[$cont]->data)) ?></td>
            <td><?php echo (utf8_decode($list[$cont]->nome)) ?></td>
            <td><?php
             echo (utf8_decode($list[$cont]->tipo))
             ?></td>
            <td><?php echo (utf8_decode($list[$cont]->quantidadeMovimentacao)) ?></td>
            <td>
              <?php echo (utf8_decode($list[$cont]->descricao)) ?>
            </td>
          </tr>

          <?php
          $cont +=1;
          }
           ?>
        </tbody>
      </table>
  </div>


</div>
