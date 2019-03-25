$(document).ready(function(){

  $('.button_create').click(function(){
    $('.formulaireIndexCo').fadeOut(1);
    $('.formulaireIndexIsncription').fadeIn(500).css('display','flex');

  });
  $('#annulerInscription').click(function(){
    $('.formulaireIndexIsncription').fadeOut(1);
    $('.formulaireIndexCo').fadeIn(500);

  })

});
