//On scroll add class "scrolled"
$(function() {
    var header = $(".navbar");
  
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 400) {
            header.addClass("scrolled");
        } else {
            header.removeClass("scrolled");
        }
    });
  
});