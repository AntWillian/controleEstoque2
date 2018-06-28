// function salvar

function CadastroeEdicao(idform,controller,modo,divDados,divForm,linkDados,linkForm,idDado) {
  $(idform).submit(function(event){
      event.preventDefault();

        $.ajax({
           type: "POST",
           url: "router.php?controller="+controller+"&modo="+modo+"&id="+idDado,
           //alert (url);
           data: new FormData($(idform)[0]),
           cache:false,
           contentType:false,
           processData:false,
           async:true,
           success: function(dados){

             $( divDados ).load( linkDados );
             $( divForm ).load( linkForm );

                //$('.mostrar_dados').html(dados);
                //alert(dados);

           }
       });


  });
}


// function excluir

function Excluir(idIten,controller,modo,modalDados,link){
  var resposta;
  resposta = confirm('Deseja excluir?');
  // alert(idIten);
  // alert(controller);
  // alert(modo);
  //   alert(modalDados);
  //   alert(link);
  if (resposta==true){
  //alert(idIten);
    $.ajax({
        type: "GET",
        url: "router.php?controller="+controller+"&modo="+modo+"&id="+idIten,
        // data: {modo:'excluir',id:idIten},
        success: function(dados){
          // aqui ele recarrega a div com o arquivo
          $( modalDados ).load(link);
          //alert(dados);
        }
    });
  }
}

// funcao de editar

function Editar(idItem,link,div){

  $.ajax({
    type: "GET",
    url: link,
    data: {modo:'buscarid',id:idItem},
    success: function(dados){
      $(div).html(dados);
      //alert(div);
      //$( "#conteudo_geral" ).load("views/formCabecalho.php" );

    }

  });
}


// ativar coisas

function AtivarEdesativar(idIten,controller,modo,respostaPesonalizada){
    var resposta;
    resposta = confirm(respostaPesonalizada);
    // alert(idIten);
    // alert(controller);
    // alert(modo);
     // alert(divdados);
     // alert(link);
    if (resposta==true){
    //alert(idIten);
      $.ajax({
          type: "GET",
          url: "router.php?controller="+controller+"&modo="+modo+"&id="+idIten,
          success: function(dados){
             //$('.receber_dados').html(dados);
            //alert (dados);

           $( '.receber_dados' ).load(dados);
          }
      });
    }
  }

  // visualizar

  function Visualizar(idItem,link,div){

    $.ajax({
      type: "GET",
      url:link,
      data: {id:idItem},
      success: function(dados){
        $(div).html(dados);
      //  alert(dados);
      }
  });
  }

  //Efeito para abrir a div Container com timer de 2 segundos (Novo Registro)
  $(".novo").click(function(){
     $(".modalContainer_pretadora").slideToggle(2000);

  });
