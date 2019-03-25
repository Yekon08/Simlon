$(document).ready(function() {

    /*var img = new Image()
    img.src = '/img/img_02.jpg'
    var i=0;
    for (i = 0 ; i < 9 ; i++)
    {
        document.body.appendChild(img);
    }*/
    [].forEach.call(document.querySelectorAll('img[data-src]'),    function(img) {
        img.setAttribute('src', img.getAttribute('data-src'));
        img.onload = function() {
          img.removeAttribute('data-src');
        };
      });






})