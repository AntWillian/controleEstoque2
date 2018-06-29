<?php

  class Usuario{



    public $idUsuario;
    public $nome;
    public $cpf;
    public $senha;
    public $dtnasc;
    public $idNivel;
    public $usuario;



    public  function __construct(){
      require_once('bd_class.php');
    }


    // CADASTRO DE NOVO PRODUTO
    public function Insert($dados){
      $sql="insert into tbl_usuario ( nome, cpf, senha, dtnasc, idNivel,usuario)
      values('".$dados->nome."', '".$dados->cpf."', '".$dados->senha."', '".$dados->dtnasc."', '".$dados->idNivel."', '".$dados->usuario."')";

      echo $sql;


      $conex = new Mysql_db();

      $PDO_conex = $conex->Conectar();



        if ($PDO_conex->query($sql)) {
          //header("location:index.php?pag=carbook");
        }else{
          echo "erro";
        }

        $conex->Desconectar();
    }


    // SELECIONAR TODOS OS Usuarios
    public function Select(){

        $sql="select * from tbl_usuario order by idUsuario desc";
        //echo $sql;
        $conex=new Mysql_db();
        //Faz a conexão com o banco
        $PDOconex = $conex->Conectar();

        //Executa o select no DB e guarda o retorno na variável select
        $select = $PDOconex->query($sql);

        $cont=0;

        while ($rs=$select->fetch(PDO::FETCH_ASSOC)) {
            $listUsuario[] = new Usuario();

            $listUsuario[$cont]->idUsuario=$rs['idUsuario'];
            $listUsuario[$cont]->nome=$rs['nome'];
            $listUsuario[$cont]->cpf=$rs['cpf'];
            $listUsuario[$cont]->senha=$rs['senha'];
            $listUsuario[$cont]->dtnasc=implode("/",array_reverse(explode("-",$rs['dtnasc'])));;
            $listUsuario[$cont]->idNivel=$rs['idNivel'];
            $listUsuario[$cont]->usuario=$rs['usuario'];




            $cont+=1;
        }



        $conex->Desconectar();

        if (isset($listUsuario)) {
          return $listUsuario;
        }
      }

      //Função de login
      public function Login($Usuario){
        session_start();
        //Script para chamar a procedure de login
        addslashes($sql="select * FROM tbl_usuario Where usuario='".$Usuario->usuario."' and senha='".$Usuario->senha."';");

        echo $sql;
        $con=new Mysql_db();
        $pdoCon = $con->Conectar();
        //Executa o script
        $pdoCon->query($sql);

        //Script para pegar o id que retorna da Procedure

        $select = $pdoCon->query($sql);


        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

          $idUsuario = $rs['idUsuario'];
        }

        $con->Desconectar();

        if ($idUsuario > 0) {
          $_SESSION['idUsuario'] = $idUsuario;
          header('location:index.php');
        }else {
          echo('<script> alert("Falha na autenticação!");
          window.location.href = "index.php"</script>');
        }

      }


      // SELECIONAR TODOS OS Usuarios
      public function selectById($dados){

          $sql="select * from tbl_usuario where idUsuario=".$dados->idUsuario;
          echo $sql;
          $conex=new Mysql_db();
          //Faz a conexão com o banco
          $PDOconex = $conex->Conectar();

          //Executa o select no DB e guarda o retorno na variável select
          $select = $PDOconex->query($sql);

          $cont=0;

          while ($rs=$select->fetch(PDO::FETCH_ASSOC)) {
              $listUsuario = new Usuario();

              $listUsuario->idUsuario=$rs['idUsuario'];
              $listUsuario->nome=$rs['nome'];
              $listUsuario->cpf=$rs['cpf'];
              $listUsuario->senha=$rs['senha'];
              $listUsuario->dtnasc=implode("/",array_reverse(explode("-",$rs['dtnasc'])));
              $listUsuario->idNivel=$rs['idNivel'];
              $listUsuario->usuario=$rs['usuario'];




              $cont+=1;
          }



          $conex->Desconectar();

          if (isset($listUsuario)) {
            return $listUsuario;
          }
        }


      public function Update($dados){


            $sql = "UPDATE tbl_usuario SET
                    nome='".$dados->nome."',
                    cpf='". $dados->cpf."',
                    senha='".$dados->senha."',
                    dtnasc='".$dados->dtnasc."',
                    usuario='".$dados->usuario."'
                    WHERE idUsuario=".$dados->idUsuario;



                   echo $sql;

                  $conex = new Mysql_db();

                  $PDO_conex = $conex->Conectar();



                  if ($PDO_conex->query($sql)) {
                    header("location:index.php?pag=usuarios");

                  }else{
                    echo "erro";
                  }

                  $conex->Desconectar();
        }

    }




 ?>
