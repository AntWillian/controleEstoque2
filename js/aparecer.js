$(".item_perguntas_a").click(function(){
  $('.div_perguntas').removeClass('displaynonePer');

  $('.div_perguntas').addClass('displayBlockPer');

});

$(".fechar").click(function(){
  $('.div_perguntas').addClass('displaynonePer');

  $('.div_perguntas').removeClass('displayBlockPer');

});
