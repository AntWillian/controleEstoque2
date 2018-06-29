<?php

$idUsuario=0;
$nome=Null;
$cpf=Null;
$senha=Null;
$dtnasc=Null;
$idNivel=Null;
$usuario=Null;







  if(isset($_GET['modo'])){

    $modo=$_GET['modo'];

    if ($modo == "buscarId") {
      $idUsuario=$_GET['idUsuario'];

      //echo $modo;

      require_once("../controllers/controller_usuario.php");
      require_once("../models/usuario_class.php");

      //instacia a controller
      //Passa o id para a controller
      $controller_usuario= new controllerUsuario();
      $retornoModel = $controller_usuario :: Buscar();

    //  var_dump($retornoModel);

      $nome=$retornoModel->nome;
      $cpf=$retornoModel->cpf;
      $senha=$retornoModel->senha;
      $dtnasc=$retornoModel->dtnasc;
      $idNivel=$retornoModel->idNivel;
      $usuario=$retornoModel->usuario;

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



<!-- NOVO Usuario -->
<div >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Usuario</h5>
        <button type="button" class="close fechar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="FrmProdutos" action="router.php?controller=usuario&modo=editar&idUsuario=<?php echo $idUsuario ?>" method="post">
          <div class="form-group">
            <label for="formGroupExampleInput">Nome completo</label>
            <input name="txtNome" type="text" class="form-control" id="formGroupExampleInput" placeholder="Nome completo" value="<?php echo (utf8_decode($nome)) ?>">
          </div>


          <div class="form-group">
            <label for="formGroupExampleInput">Cpf</label>
            <input name="txtCpf" type="text" class="form-control" id="formGroupExampleInput" placeholder="Cpf" value="<?php echo (utf8_decode($cpf)) ?>">
          </div>


          <div class="form-group">
            <label for="formGroupExampleInput">Usuario</label>
            <input name="txtUsuario" type="text" class="form-control" id="formGroupExampleInput" placeholder="Usuario" value="<?php echo (utf8_decode($usuario)) ?>">
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">Senha</label>
            <input name="txtSenha" type="text" class="form-control" id="formGroupExampleInput" placeholder="Senha" value="<?php echo (utf8_decode($senha)) ?>">
          </div>


          <div class="form-group">
            <label for="formGroupExampleInput">Data De nascimento</label>
            <input name="txtDtnasc" type="date" class="form-control" id="formGroupExampleInput"  value="<?php echo (utf8_decode(implode("/",array_reverse(explode("-",$dtnasc))))) ?>">
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
