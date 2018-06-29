<?php
if (isset($_SESSION['idUsuario'])) {
$id = $_SESSION['idUsuario'];
//echo $id;

}
 ?>


<!-- script  -->

  <script>
      $(document).ready(function () {


        //Efeito para abrir a div Container com timer de 2 segundos (Novo Registro)
        $(".novo").click(function(){
           $(".modalContainer").slideToggle(2000);

        });

        //Efeito para abrir a div Container com timer de 2 segundos (Novo Registro)
          $(".editar").click(function(){
             $(".modalContainer").fadeIn(2000);

          });



      });

      function Editar(idItem){

        $.ajax({
          type: "GET",
          url: "views/cadastro_produto.php",
          data: {modo:'buscarId',idProduto:idItem},
          success: function(dados){
            $('.modal2').html(dados);
          }

        });
      }

      function Excluir(idIten){

        var resposta;

        resposta = confirm('Deseja excluir?');

        if (resposta==true)
        {
        //alert(idIten);
          $.ajax({
              type: "GET",
              url: "router.php?controller=produtos&modo=excluir&idProduto="+idIten,
              // data: {modo:'excluir',id:idIten},
              success: function(dados){
                  $('.dadosDaMovimentacao').html(dados);
                  //alert ();
              }
          });
        }
      }
  </script>



 <div class="modalContainer">
   <div class="modal2">

   </div>
 </div>


<div class="conteudo_padrao">


<div class="conteudo_produtos2">
  <h1>Produtos</h1>

  <div class="botoes">
    <!-- <div class="novoProduto" data-toggle="modal" data-target="#exampleModal">

    </div> -->

    <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-success margin">Novo Produto</button>
    <button data-toggle="modal" data-target="#exampleModalMovimentacao" type="button" class="btn btn-primary margin">Movimentação</button>

    </div>

    <div class="dadosDaMovimentacao">

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


                  <a href="#" class="editar" onclick="Editar(<?php echo $list[$cont]->idProduto?>)">Editar</a>
                  <a href="#" class="excluir text-danger" onclick="Excluir(<?php echo ($list[$cont]->idProduto) ?>)"> Excluir </a>


                <!-- <a data-toggle="modal" data-target="#exampleModal" href="index.php?pag=gerenciamento&idProduto=<?php echo $list[$cont]->idProduto?>">Editar</a> -->
                  <!-- <a href="#" class="editar text-danger" onclick="Editar(<?php echo ($listPlanos[$cont]->id) ?>)">Excluir</a> -->
                <!-- <a href="/assets/javascripts/manual/fake-response/save.json" data-confirm-text="Confirma exclusão do item?" class="text-danger">
                  Excluir
                </a> -->
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
        <h5 class="modal-title" id="exampleModalLabel">Nova Movimentacao</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="FrmMovimentacao" action="router.php?controller=movimentacao&modo=novo" method="post">
          <div class="form-group col-md-4">


          <label for="inputState">Selecionar produto</label>
            <select name="slcProduto" id="inputState" class="form-control">

              <?php
              //Inclui as classes
              require_once("controllers/controller_produtos.php");
              require_once("models/produtos_class.php");


              $controller_cadUser= new controllerProduto();
              $list = $controller_cadUser::Selecionar();
              $cont = 0;

              while ($cont <count($list)) {


             ?>
              <option value="<?php echo (utf8_decode($list[$cont]->idProduto)) ?>"><?php echo (utf8_decode($list[$cont]->descricao)) ?></option>
            <?php
            $cont += 1;

          }
             ?>
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
