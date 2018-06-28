<script>
     $("#form").submit(function(event){


        //anula a ação do submit tradicional "botao" ou F5
         event.preventDefault();

         $.ajax({
            type: "POST",
            url: "router.php?controller=graficoPesquisa&modo=pesquisa",
            //alert (url);
            data: new FormData($("#form")[0]),
            cache:false,
            contentType:false,
            processData:false,
            async:true,
            success: function(dados){
                 $('.dados').html(dados);
                 //alert(dados);

            }
        });

     });

 </script>



<div class="conteudo_produtos2">
  <h1>Dados</h1>

  <div class="pesquisa">
    <form id="form" class="FrmPesquisa" action="" method="post">


      <div class="form-group col-md-4">
        <select name="slcMes" id="inputState" class="form-control">
          <option  value="1">Janeiro</option>
          <option value="2">Fevereiro</option>
          <option value="3">Março</option>
          <option value="4">Abril</option>
          <option value="5">Maio</option>
          <option value="6">Junho</option>
          <option value="7">Julho</option>
          <option value="8">Agosto</option>
          <option value="9">Setembro</option>
          <option value="10">Outubro</option>
          <option value="11">Novembro</option>
          <option value="12">Dezembro</option>
          <option selected value="13">Todos</option>

        </select>
      </div>

      <input type="submit" class="btn btn-primary" name="btnEnviar" value="Pesquisar">


    </form>
  </div>

  <div class="grafico">

    <?php

    //Inclui as classes
    require_once("controllers/controller_movimentacao.php");
    require_once("models/grafico_class.php");


    $controller_cadUser= new controllerMovimentacao();
    $list = $controller_cadUser::pesquisaGrafico();
    $cont = 0;

    if (count($list) == 0) {
      echo "nenhum dado no mes";
    }else{

      while ($cont <count($list)) {


        if ($list[$cont]->idTipoMovimentacao == 1) {
           $cor='barraEntrada';
         }else {
           $cor='barraSaida';
         }

     ?>
      <div class="datas">
        <?php echo (utf8_decode($list[$cont]->data))  ?>
      </div>
      <div class="<?php echo $cor ?>" style="width:<?php echo (utf8_decode($list[$cont]->movimentos))  ?>px">
        <?php echo (utf8_decode($list[$cont]->movimentos))  ?>
      </div>



      <?php
      $cont+=1;

        }
      }
       ?>
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
