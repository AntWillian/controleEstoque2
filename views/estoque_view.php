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

<!-- MODAIS  -->


<!-- NOVA MOVIMENTACAO -->
<div class="modal fade" id="exampleModalMovimentacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="FrmProdutos" action="router.php?controller=movimentacao&modo=novo" method="post">
          <div class="form-group col-md-4">


          <label for="inputState">Selecionar produto</label>
            <select name="slcProduto" id="inputState" class="form-control">
              <option selected value="1">Coca Cola</option>
              <option value="2">Arroz</option>
            </select>
          </div>

          <div class="form-group col-md-4">
            <label for="inputState">Tipo de movimentação</label>
            <select name="slcTipo" id="inputState" class="form-control">
              <option selected value="1">Saida</option>
              <option value="2">Entrada</option>
            </select>
          </div>


          <div class="form-group">
            <label for="formGroupExampleInput">Quantidade</label>
            <input name="txtQuantidade" type="text" class="form-control" id="formGroupExampleInput" placeholder="Quantidade">
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">Descricao</label>
            <input name="txtDescricao" type="text" class="form-control" id="formGroupExampleInput" placeholder="Descricao">
          </div>


          <div class="modal-footer">

            <input type="submit" class="btn btn-primary" name="btnEnviar" value="Enviar">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
</div>
