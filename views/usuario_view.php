<div class="conteudo_produtos2">
  <h1>Produtos</h1>

  <div class="botoes">


    <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-success margin">Novo Usuario</button>


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

  <!-- NOVO Usuario -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Novo Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="FrmProdutos" action="router.php?controller=usuario&modo=novo" method="post">
            <div class="form-group">
              <label for="formGroupExampleInput">Nome completo</label>
              <input name="txtNome" type="text" class="form-control" id="formGroupExampleInput" placeholder="Nome completo">
            </div>


            <div class="form-group">
              <label for="formGroupExampleInput">Cpf</label>
              <input name="txtCpf" type="text" class="form-control" id="formGroupExampleInput" placeholder="Cpf">
            </div>


            <div class="form-group">
              <label for="formGroupExampleInput">Usuario</label>
              <input name="txtUsuario" type="text" class="form-control" id="formGroupExampleInput" placeholder="Usuario">
            </div>

            <div class="form-group">
              <label for="formGroupExampleInput">Senha</label>
              <input name="txtSenha" type="text" class="form-control" id="formGroupExampleInput" placeholder="Senha">
            </div>


            <div class="form-group">
              <label for="formGroupExampleInput">Data De nascimento</label>
              <input name="txtDtnasc" type="date" class="form-control" id="formGroupExampleInput" placeholder="Senha">
            </div>


            <div class="form-group col-md-4">
              <label for="inputState">Nivel</label>
              <select name="slccategoria" id="inputState" class="form-control">
                <option selected value="1">Admim</option>
                <option value="2">cataloguista</option>
              </select>
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
