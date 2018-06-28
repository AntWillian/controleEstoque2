(function($) {

    function showInput(id) {
      // cadastro e view de temas
        if(id == 'yes-button1') {

            $( "#tipoforum" ).load( "views/forum_temas_view.php" );
        }

        // cadastro e view do cabecalho
        if(id == 'yes-button2') {

          $( "#tipoforum" ).load( "views/cabecalho_forum.php" );

        }

        // view e controle de perguntas e respostas
        if(id == 'yes-button3') {

          $( "#tipoforum" ).load( "views/perguntasErespostasForum.php" );

        }

        // cadstro e controle de palavras proibidas

        if(id == 'yes-button4') {

          $( "#tipoforum" ).load( "views/palavraProibidaForum_view.php" );

        }


    }
    $(document).on('click', 'input[type=radio]', function(){
        var id = $(this).prop("id");
        console.log(id);
        showInput(id);
    });
}(jQuery));
