
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
              <th class="ls-nowrap col-xs-3">Codigo</th>
              <th class="hidden-xs">Descricao
              <th class="hidden-xs">Preço</th>
              <th class="hidden-xs">Quantidade</th>
              <th class="ls-table-actions">Ações</th>

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
              <td>
                <?php echo (utf8_decode($list[$cont]->quantidade));
                if ($list[$cont]->quantidade <= 5 ) {
                  echo "<span class='msg'> *Quantidade Minima </span>";
                }
               ?></td>
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

  <!-- MODAIS -->

<!-- NOVO PRODUTO -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="FrmProdutos" action="router.php?controller=produtos&modo=novo" method="post">
          <div class="form-group">
            <label for="formGroupExampleInput">Codigo do produto</label>
            <input name="txtCodigo" type="text" class="form-control" id="formGroupExampleInput" placeholder="Codigo">
          </div>


          <div class="form-group">
            <label for="formGroupExampleInput">Descricao</label>
            <input name="txtDescricao" type="text" class="form-control" id="formGroupExampleInput" placeholder="Descricao">
          </div>


          <div class="form-group">
            <label for="formGroupExampleInput">Preço</label>
            <input name="txtPreco" type="text" class="form-control" id="formGroupExampleInput" placeholder="Preço">
          </div>


          <div class="form-group col-md-4">
            <label for="inputState">Categoria</label>
            <select name="slccategoria" id="inputState" class="form-control">
              <option selected value="1">Bebida</option>
              <option value="2">comida</option>
            </select>
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">Quantidade</label>
            <input name="txtQuantidade" type="text" class="form-control" id="formGroupExampleInput" placeholder="Quantidade">
          </div>

          <div class="form-group">
            <label for="exampleFormControlFile1">Selecionar imagem</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
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
