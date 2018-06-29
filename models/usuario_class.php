<?php

  class Usuario{



    public $idUsuario;
    public $nome;
    public $cpf;
    public $senha;
    public $dtnasc;
    public $idNivel;


    public  function __construct(){
      require_once('bd_class.php');
    }


    // CADASTRO DE NOVO PRODUTO
    public function Insert($dados){
      $sql="insert into tbl_usuario ( nome, cpf, senha, dtnasc, idNivel)
      values('".$dados->nome."', '".$dados->cpf."', '".$dados->senha."', '".$dados->dtnasc."', '".$dados->idNivel."')";

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


    // SELECIONAR TODOS OS PRODUTOS
    public function Select(){

        $sql="select * from tbl_produto order by idProduto desc";
        echo $sql;
        $conex=new Mysql_db();
        //Faz a conexão com o banco
        $PDOconex = $conex->Conectar();

        //Executa o select no DB e guarda o retorno na variável select
        $select = $PDOconex->query($sql);

        $cont=0;

        while ($rs=$select->fetch(PDO::FETCH_ASSOC)) {
            $listProdutos[] = new Produto();

            $listProdutos[$cont]->idProduto=$rs['idProduto'];
            $listProdutos[$cont]->codigo=$rs['codigo'];
            $listProdutos[$cont]->descricao=$rs['descricao'];
            $listProdutos[$cont]->preco=$rs['preco'];
            $listProdutos[$cont]->quantidade=$rs['quantidade'];
            $listProdutos[$cont]->idCategoria=$rs['idCategoria'];
            $listProdutos[$cont]->imagen=$rs['imagen'];



            $cont+=1;
        }



        $conex->Desconectar();

        if (isset($listProdutos)) {
          return $listProdutos;
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
    }




 ?>
