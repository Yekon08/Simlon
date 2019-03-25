console.log("test");

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
  }
  x[slideIndex-1].style.display = "block";
}

function color_text(current)
{
  var a = current;
  for(let i = 0 ; i < document.getElementsByClassName("select_text" ).length ; i++)
  {
    if(document.getElementsByClassName("select_text")[i] == a)
    {
      document.getElementsByClassName("select_text")[i].classList.add("active_infos");
    }
    else
    {
      document.getElementsByClassName("select_text")[i].classList.remove("active_infos");
    }
  }
}

function color_menu(current)
{
  var a = current;
  for(let i = 0 ; i < document.getElementsByClassName("select_menu" ).length ; i++)
  {
    if(document.getElementsByClassName("select_menu")[i] == a)
    {
      document.getElementsByClassName("select_menu")[i].classList.add("active");
    }
    else
    {
      document.getElementsByClassName("select_menu")[i].classList.remove("active");
    }
  }
}