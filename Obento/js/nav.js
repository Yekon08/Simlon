
let nav = document.querySelector('#navbar');
let form = document.querySelector('form');
let close = document.querySelector('#close');
let declencheurs = document.querySelectorAll('.declencheur');
// s'il existe plusieurs boutons, j'utilise querySelectorAll, qui me renverra UN TABLEAU (important)
let burger = document.querySelector('#burger');
let container = document.querySelectorAll('.container');
let infos = document.querySelector('#infos');
let footer = document.querySelector('footer');

for (declencheur of declencheurs) {
    declencheur.addEventListener('click', () => {
        nav.classList.remove('nav-tiroir');
        nav.classList.toggle('tiroir'); // ajoute ou enlève la classe tiroir
        burger.classList.toggle('tiroir');
    });
    // maintenant, tous les déclencheurs ont l'évènement click qui déroule le formulaire
}

close.addEventListener('click', () => {
    container[0].classList.toggle('tiroir');
        infos.classList.toggle('tiroir');
        footer.classList.toggle('tiroir');
        burger.classList.toggle('tiroir');
        nav.classList.toggle('tiroir');
});

burger.addEventListener('click', () => {
    nav.classList.toggle('nav-tiroir');
    container[0].classList.toggle('tiroir');
        infos.classList.toggle('tiroir');
        footer.classList.toggle('tiroir');
});
