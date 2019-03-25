window.onresize = widthSpy;


let affichage = document.createElement('div');
affichage.id = 'affichage';
let body = document.querySelector('body');

function widthSpy() {
    affichage.innerHTML = window.innerWidth + ' px de innerWidth';
    body.appendChild(affichage);
    affichage.style.position = 'fixed';
    affichage.style.top = '10px';
    affichage.style.left = '10px';
    affichage.style.padding = '15px';
    affichage.style.color = 'yellow';
    affichage.style.zIndex = 9;
}