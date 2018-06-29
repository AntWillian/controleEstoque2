<?php

class controllerUsuario{


  //CADASTRO DE PRODUTOS
  public function novo(){
    echo "string";
      $User = new Usuario();
      $User ->nome = $_POST['txtNome'];

      $User ->cpf = $_POST['txtCpf'];
      $User ->usuario = $_POST['txtUsuario'];
      $User ->senha = $_POST['txtSenha'];
      $User ->dtnasc = $_POST['txtDtnasc'];

      $User ->idNivel = $_POST['slcnivel'];





      $User::Insert($User);
    }


    Function Login(){
      $User = new Usuario;
      //Seta o usuario e senha
      $User->usuario = $_POST["txt_usuario"];
      $User->senha = $_POST["txt_senha"];
      //Chama a função de Login
      $User::Login($User);
  }


}


 ?>
