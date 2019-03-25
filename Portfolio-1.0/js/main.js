$(document).ready(function()
 {
    // $('.hamburger').on( "click", function()
    // {
    //     // $('.menu_maxime').slideToggle();
    //     $('.menu_maxime').toggle('.is-active');
    //     // console.log("test");
    // });

    $('.dropdown').on( 'click', function()
    {
        // $('.submenu').removeClass('dp_none');
        $('.submenu').slideToggle();
    });

  var hamburger = document.querySelector(".hamburger");
  hamburger.addEventListener("click", function() 
  {
    hamburger.classList.toggle("is-active");
    $('.menu_maxime').slideToggle();
  });

//test
// function testmenu()
// {


// var menu = document.getElementsByClassName('menu_maxime');

// console.log(menu);

// menu.classList.toggle('animate', 'slideInright');


// }

var menu_container = document.getElementById('menu_container');
var btn = menu_container.getElementsByClassName('btn');

for (var i = 0; i < btn.length; i++)
{
    btn[i].addEventListener('click', function()
    {
       var current = document.getElementsByClassName('menu_active') ;
       current[0].className = current[0].className.replace('menu_active', '');
       this.className += " menu_active";
    });
}


});

