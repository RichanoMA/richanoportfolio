/*Donkere modus*/
const chk = document.getElementById('chk');
var gedrukt = true;

chk.addEventListener('change', () => {
    document.body.classList.toggle('dark');

});
chk.addEventListener('change', () => {

    document.querySelector("footer#footerDark").classList.toggle('dark');


    /*Er zit een true of valse waarde op het knopje zodat de kleuren veranderen wanneer je erop klikt*/

    if (gedrukt == true) {
        var bodyKleur = document.getElementById("dark").style.backgroundColor = "#292C35";
        var bodyKleur = document.getElementById("dark").style.color = "#FFF";
        var footerKleur = document.getElementById("footerDark").style.backgroundColor = "#D9CCC4";

        gedrukt = false;
    } else {
        var bodyKleur = document.getElementById("dark").style.backgroundColor = "#fff";
        var bodyKleur = document.getElementById("dark").style.color = "#000";
        var footerKleur = document.getElementById("footerDark").style.backgroundColor = "#FFF";

        gedrukt = true;
    }
});


/* Kleuren die direct op de pagina verschijnen*/
function paginaKleuren() {

    /*Kleuren van stroken*/
    var strookKleur1 = document.getElementById("strook1").style.backgroundColor = "#D9CCC4";
    var strookKleur2 = document.getElementById("strook2").style.backgroundColor = "#015093";
    var strookKleur3 = document.getElementById("strook3").style.backgroundColor = "#D9CCC4";
    /*Kleuren van tabel*/
    var tabelHead = document.getElementById("eersteRij").style.backgroundColor = "#015093";
    var tabelHead = document.getElementById("eersteRij").style.color = "#FFF";

    /*Kleuren van nachtmodus*/
    var label = document.getElementById("label").style.backgroundColor = "#111";
    var klikBal = document.getElementById("ball").style.backgroundColor = "#FFF";
    var fontAwesomeIcoon1 = document.getElementById("maanKleur").style.color = "#f1c40f";
    var fontAwesomeIcoon2 = document.getElementById("zonKleur").style.color = "#f39c12";
    /*Overige kleuren*/
    var vertrekKleur = document.getElementById("vertrekKleur").style.color = "#015093";
}

$(document).ready(function () {
    var TIME_PER_PAGE = 2000;
    var pages = $(".page"),
        numPages = pages ? pages.length : 0;
    i = -1;

    function nextPage() {
        if (i >= 0)
            $(pages[i]).removeClass('currentPage');

        i = ++i % numPages;

        $(pages[i]).addClass('currentPage');

        setTimeout(nextPage, TIME_PER_PAGE);
    }

    nextPage();

});
