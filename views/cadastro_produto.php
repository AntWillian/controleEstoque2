<?php

$idProduto=0;
$codigo=Null;
$descricao=Null;
$preco=Null;
$quantidade=Null;
$idCategoria=Null;
$imagen=Null;







  if(isset($_GET['modo'])){

    $modo=$_GET['modo'];

    if ($modo == "buscarId") {
      $idProduto=$_GET['idProduto'];

      //echo $modo;

      require_once("../controllers/controller_produtos.php");
      require_once("../models/produtos_class.php");

      //instacia a controller
      //Passa o id para a controller
      $controller_produto= new controllerProduto();
      $retornoModel = $controller_produto :: Buscar();

      //var_dump($retornoModel);

      $codigo=$retornoModel->codigo;
      $descricao=$retornoModel->descricao;
      $preco=$retornoModel->preco;
      $quantidade=$retornoModel->quantidade;
      $idCategoria=$retornoModel->idCategoria;
      $imagen=$retornoModel->imagen;

      //var_dump ($retornoModel);
      // echo "      ta na class ";
      // if (isset($retornoModel)) {
      //   echo "string";
      // }

    }



  }





 ?>

 <script>
     $("#form").submit(function(event){
          //Recupera o id gravado no Form pelo atribute-id
          var idProduto = $(this).data("idProduto");
          var modo = "";
          if(idProduto == '0')
              modo='novo';
          else
              modo='editar';

        //anula a ação do submit tradicional "botao" ou F5
         event.preventDefault();

         $.ajax({
            type: "POST",

            url: "router.php?controller=produtos&modo="+modo+"&idProduto="+idProduto,
            //alert (url);
            data: new FormData($("#form")[0]),
            cache:false,
            contentType:false,
            processData:false,
            async:true,
            success: function(dados){
                 //$('.modal').html(dados);
                 alert(dados);

            }
        });

     });



      $(document).ready(function() {

        $(".fechar").click(function() {
          //$(".modalContainer").fadeOut();
      	$(".modalContainer").slideToggle(1000);
        });
      });


 </script>


<!-- NOVO PRODUTO -->
<div>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Produto</h5>
        <button type="button" class="fechar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form data-id="<?php echo($idProduto) ?>" class="FrmProdutos" action="router.php?controller=produtos&modo=editar&idProduto=<?php echo $idProduto ?>" method="post">
          <div class="form-group">
            <label for="formGroupExampleInput">Codigo do produto</label>
            <input name="txtCodigo" type="text" class="form-control" id="formGroupExampleInput" placeholder="Codigo" value="<?php echo (utf8_decode($codigo)) ?> ">
          </div>


          <div class="form-group">
            <label for="formGroupExampleInput">Descricao</label>
            <input name="txtDescricao" type="text" class="form-control" id="formGroupExampleInput" placeholder="Descricao" value="<?php echo (utf8_decode($descricao)) ?>">
          </div>


          <div class="form-group">
            <label for="formGroupExampleInput">Preço</label>
            <input name="txtPreco" type="text" class="form-control" id="formGroupExampleInput" placeholder="Preço" value="<?php echo (utf8_decode(str_replace(".", ",", $preco))) ?>">
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
            <input name="txtQuantidade" type="text" class="form-control" id="formGroupExampleInput" placeholder="Quantidade" value="<?php echo (utf8_decode($quantidade)) ?>">
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
