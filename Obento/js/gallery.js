(function () {

    let imgs = [].slice.call(document.getElementById('gallery-container').children);
    let overlayer = document.getElementById("overlayer-gallery");
    let imgCentre = document.getElementById("img-centre");
    let imgList = document.getElementById("img-list");
    let html = document.getElementsByTagName('html');

    let arrowLeft = document.getElementById("arrow-left");
    let arrowRight = document.getElementById("arrow-right");
    let cross = document.getElementById("cross");

    let arrowLeftBot = document.getElementById("arrow-left-bot");
    let arrowRightBot = document.getElementById("arrow-right-bot");

    let indexImg;
    let currentImgSrc;
    let nbBloc;
    let allBlocs;
    let prevBloc;
    let nextBloc;

    imgs.forEach(function (element, index) {
        element.addEventListener('click', function () {
            indexImg = index;
            currentImgSrc = imgs[index].firstChild.src;

            nbBloc = Math.ceil((indexImg / 7) + 1); //Arrondi inferieur
            let indexDebut = ((nbBloc * 7) - 8);
            let indexFin;
            if (indexDebut <= 0) {
                indexDebut = 0;
                indexFin = 6;
            }
            else {

                nbBloc = Math.floor((indexImg / 7) + 1);
                indexDebut = Math.max(0, ((nbBloc * 7) - 7));
                indexFin = ((nbBloc * 7) - 1);

            }
            if (indexFin > imgs.length) {
                indexFin = imgs.length - 1;
            }

            while (indexDebut <= indexFin) {
                let div = document.createElement('div');
                div.classList.add('item-overlayer');
                imgList.appendChild(div);

                let img = document.createElement('img');
                img.setAttribute('src', imgs[indexDebut].firstChild.src);
                div.appendChild(img);

                div.addEventListener('click', function () {
                    imgCentre.style.background = 'url(' + this.firstChild.src + ') center no-repeat';
                    imgCentre.style.backgroundSize = '100%';
                });
                indexDebut++;
            }
            gallery();
        });
    });

    cross.addEventListener('click', function () {
        overlayer.style.display = 'none';
        html[0].style.overflowY = '';

        let items = document.querySelectorAll(".item-overlayer");
        items.forEach(e => e.parentNode.removeChild(e));
    });


    function gallery() {
        overlayer.style.display = 'block';
        imgCentre.style.background = 'url(' + currentImgSrc + ') center no-repeat';
        imgCentre.style.backgroundSize = '100%';
        html[0].style.overflowY = 'hidden';
        scrollTo(0, 0);


    }

    arrowLeft.addEventListener('click', function () {
        if (indexImg == 0) {
            indexImg = imgs.length - 1;
            afficherImgCentre(indexImg);
        }
        else {
            indexImg = indexImg - 1;
            afficherImgCentre(indexImg);
        }
    });
    arrowRight.addEventListener('click', function () {
        if (indexImg == imgs.length - 1) {
            indexImg = 0;
            afficherImgCentre(indexImg);

        }
        else {
            indexImg = indexImg + 1;
            afficherImgCentre(indexImg);
        }
    });

    function afficherImgCentre(index) {
        let ImgSrc = imgs[index].firstChild.src;
        imgCentre.style.background = 'url(' + ImgSrc + ') center no-repeat';
        imgCentre.style.backgroundSize = '100%';
    }

    arrowLeftBot.addEventListener('click', function () {
        let items = document.querySelectorAll(".item-overlayer");
        items.forEach(e => e.parentNode.removeChild(e));

        allBlocs = Math.floor((imgs.length / 7) + 1); //Nb total de blocs

        if (nbBloc == 1) {
            prevBloc = allBlocs;
            nbBloc = allBlocs;
        }
        else {
            nbBloc = nbBloc - 1;
            prevBloc = nbBloc - 1;

        }

        let indexDebut = ((prevBloc * 7) - 7);
        let indexFin;
        if (indexDebut <= 0) {
            indexDebut = 0;
            indexFin = 6;
        }
        else {

            indexDebut = Math.max(0, ((prevBloc * 7) - 7));
            indexFin = ((prevBloc * 7) - 1);

        }
        if (indexFin > imgs.length) {
            indexFin = imgs.length - 1;
        }

        while (indexDebut <= indexFin) {
            let div = document.createElement('div');
            div.classList.add('item-overlayer');
            imgList.appendChild(div);

            let img = document.createElement('img');
            img.setAttribute('src', imgs[indexDebut].firstChild.src);
            div.appendChild(img);

            div.addEventListener('click', function () {
                imgCentre.style.background = 'url(' + this.firstChild.src + ') center no-repeat';
                imgCentre.style.backgroundSize = '100%';
            });
            indexDebut++;
        }

    });

    arrowRightBot.addEventListener('click', function () {
        let items = document.querySelectorAll(".item-overlayer");
        items.forEach(e => e.parentNode.removeChild(e));

        allBlocs = Math.floor((imgs.length / 7) + 1); //Nb total de blocs

        if (nbBloc == allBlocs) {
            nextBloc = 1;
            nbBloc = 1;
        }
        else {

            nextBloc = nbBloc + 1;
            nbBloc = nextBloc;

        }


        let indexDebut = ((nextBloc * 7) - 7);
        let indexFin;
        if (indexDebut <= 0) {
            indexDebut = 0;
            indexFin = 6;
        }
        else {

            indexDebut = Math.max(0, ((nextBloc * 7) - 7));
            indexFin = ((nextBloc * 7) - 1);

        }
        if (indexFin > imgs.length) {
            indexFin = imgs.length - 1;
        }
        while (indexDebut <= indexFin) {
            let div = document.createElement('div');
            div.classList.add('item-overlayer');
            imgList.appendChild(div);

            let img = document.createElement('img');
            img.setAttribute('src', imgs[indexDebut].firstChild.src);
            div.appendChild(img);

            div.addEventListener('click', function () {
                imgCentre.style.background = 'url(' + this.firstChild.src + ') center no-repeat';
                imgCentre.style.backgroundSize = '100%';
            });
            indexDebut++;
        }
    });
})();