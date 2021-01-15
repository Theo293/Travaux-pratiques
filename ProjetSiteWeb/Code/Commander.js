function Total(totalNb) {
    let nb = ["1", "2", "3", "4"];
    let menu1 = " ", menu2 = " ", menu3 = " ", menu4 = " ";
    if (totalNb == "1") {
        let chaineMenu = "menu" + nb[0];
        menu1 = document.getElementById(chaineMenu).value;
    }
    else if (totalNb == "2") {
        let chaineMenu = "menu" + nb[0];
        menu1 = document.getElementById(chaineMenu).value;
        chaineMenu = "menu" + nb[1];
        menu2 = document.getElementById(chaineMenu).value;
    }
    else if (totalNb == "3") {
        let chaineMenu = "menu" + nb[0];
        menu1 = document.getElementById(chaineMenu).value;
        chaineMenu = "menu" + nb[1];
        menu2 = document.getElementById(chaineMenu).value
        chaineMenu = "menu" + nb[2];
        menu3 = document.getElementById(chaineMenu).value;
    }
    else if (totalNb == "4") {
        let chaineMenu = "menu" + nb[0];
        menu1 = document.getElementById(chaineMenu).value;
        chaineMenu = "menu" + nb[1];
        menu2 = document.getElementById(chaineMenu).value;
        chaineMenu = "menu" + nb[2];
        menu3 = document.getElementById(chaineMenu).value;
        chaineMenu = "menu" + nb[3];
        menu4 = document.getElementById(chaineMenu).value;
    }
    let cible = document.querySelector(".cible");
    let total = 0;
    let prix = { " " : 0, "Houppier": 31, "Floraison": 23, "Racine": 27 };

    if (menu1 != " " || menu2 != " " || menu3 != " " || menu4 != " ") {
        total += prix[menu1];
        total += prix[menu2];
        total += prix[menu3];
        total += prix[menu4];
        total += " €";
        cible.innerHTML = "<div class='total'>" + total + "</div>";
    }
    else {
        cible.innerHTML = "<div class='total'>0 €</div>";
    }

    if(totalNb == 5)
        DateValide(true);
}

let nbP = 0;

function nbChange() {
    let cibleNbP = document.querySelector(".cibleNbP");
    nbP = document.getElementById("nbPersonnes").value;
    let i = 0;
    let nb = ["1", "2", "3", "4"];
    let totalNb = 1;
    let height = document.getElementById("heightForm");
    let formulaire1Pt1 = '<div class="marginLeft">\
    <label for="nbPersonnes">Nombre de personnes :</label>\
    <select name="nbPersonnes" id="nbPersonnes" onchange="nbChange()">\
        <option value=" ">Choisissez</option>\
        <option value="1"' + (nbP == "1" ? " selected" : "") + '>1</option>\
        <option value="2"' + (nbP == "2" ? " selected" : "") + '>2</option>\
        <option value="3"' + (nbP == "3" ? " selected" : "") + '>3</option>\
        <option value="4"' + (nbP == "4" ? " selected" : "") + '>4</option>\
    </select>\
    <br>\
    <label for="choixMenu">Choix du menu : </label>\
    <select name="menu' + nb[0] + '" id="menu' + nb[0] + '" onchange="Total(';
    let formulaire1Pt2 = ')">\
    <option value=" " selected>Choisissez</option>\
    <option value="Houppier">Houppier (31 €)</option>\
    <option value="Floraison">Floraison (23 €)</option>\
    <option value="Racine">Racine (27 €)</option>\
    </select>\
    <br>\
    <label for="Boisson">Boisson (33cl) :  </label>\
    <select name="Boisson' + nb[0] + '" id="Boisson">\
    <option value=" ">Choisissez</option>\
    <option value="IceTea">Ice Tea</option>\
    <option value="Coca">Coca</option>\
    <option value="Pepsi">Pepsi</option>\
    <option value="Orangina">Orangina</option>\
    <option value="Oasis">Oasis</option>\
    </select>\
    <br>\
    <label for="Sauce1">Sauce 1 :  </label>\
    <select name="Sauce1p' + nb[0] + '" id="Sauce1">\
    <option value=" ">Choisissez</option>\
    <option value="Barbecue">Barbecue</option>\
    <option value="Moutarde">Moutarde</option>\
    <option value="Mayonnaise">Mayonnaise</option>\
    <option value="Hollandaise">Hollandaise</option>\
    <option value="Aigre-douce">Aigre-douce</option>\
    </select>\
    <br>\
    <label for="Sauce2">Sauce 2 :  </label>\
    <select name="Sauce2p' + nb[0] + '" id="Sauce2">\
    <option value=" ">Choisissez</option>\
    <option value="Barbecue">Barbecue</option>\
    <option value="Moutarde">Moutarde</option>\
    <option value="Mayonnaise">Mayonnaise</option>\
    <option value="Hollandaise">Hollandaise</option>\
    <option value="Aigre-douce">Aigre-douce</option>\
    </select>\
    </div>';
    let formulaire2Pt1 = '<div class="marginLeft">\
    <br><br>\
    <label for="choixMenu">Choix du menu :  </label>\
    <select name="menu';
    let formulaire2Pt2 = '" id="menu';
    let formulaire2Pt3 = '" onchange="Total(';
    let formulaire2Pt4 = ')">\
    <option value=" ">Choisissez</option>\
    <option value="Houppier">Houppier (31 €)</option>\
    <option value="Floraison">Floraison (23 €)</option>\
    <option value="Racine">Racine (27 €)</option>\
    </select>\
    <br>\
    <label for="Boisson">Boisson (33cl) :  </label>\
    <select name="Boisson';
    let formulaire2Pt5 = '" id="Boisson">\
    <option value=" ">Choisissez</option>\
    <option value="IceTea">Ice Tea</option>\
    <option value="Coca">Coca</option>\
    <option value="Pepsi">Pepsi</option>\
    <option value="Orangina">Orangina</option>\
    <option value="Oasis">Oasis</option>\
    </select>\
    <br>\
    <label for="Sauce1">Sauce 1 :  </label>\
    <select name="Sauce1p';
    let formulaire2Pt6 = '" id="Sauce1">\
    <option value=" ">Choisissez</option>\
    <option value="Barbecue">Barbecue</option>\
    <option value="Moutarde">Moutarde</option>\
    <option value="Mayonnaise">Mayonnaise</option>\
    <option value="Hollandaise">Hollandaise</option>\
    <option value="Aigre-douce">Aigre-douce</option>\
    </select>\
    <br>\
    <label for="Sauce2">Sauce 2 :  </label>\
    <select name="Sauce2p';
    let formulaire2Pt7 = '" id="Sauce2">\
    <option value=" ">Choisissez</option>\
    <option value="Barbecue">Barbecue</option>\
    <option value="Moutarde">Moutarde</option>\
    <option value="Mayonnaise">Mayonnaise</option>\
    <option value="Hollandaise">Hollandaise</option>\
    <option value="Aigre-douce">Aigre-douce</option>\
    </select>\
    </div>';

    cibleNbP.innerHTML = "";
    
    if (nbP == "1" || nbP == " ") {
        if(document.body.clientWidth < 360)
            height.style.height = "600px";
            
        totalNb = 1;
        cibleNbP.innerHTML = formulaire1Pt1 + totalNb + formulaire1Pt2;
    }
    else if (nbP == "2") {
        if(document.body.clientWidth >= 614)
            height.style.height = "500px";
        else if(document.body.clientWidth < 614 && document.body.clientWidth >= 362)
            height.style.height = "750px";
        else if(document.body.clientWidth < 362)
            height.style.height = "900px";

        totalNb = 2;
        cibleNbP.innerHTML = formulaire1Pt1 + totalNb + formulaire1Pt2;
        for (i = 1; i < nbP; i++)
            cibleNbP.innerHTML += formulaire2Pt1 + nb[i] + formulaire2Pt2 + nb[i] + formulaire2Pt3 + totalNb +
             formulaire2Pt4 + nb[i] + formulaire2Pt5 + nb[i] + formulaire2Pt6 + nb[i] + formulaire2Pt7;
    }
    else if (nbP == "3") {
        if(document.body.clientWidth >= 1000)
            height.style.height = "500px";
        else if(document.body.clientWidth >= 614 && document.body.clientWidth < 1000)
            height.style.height = "800px";
        else if(document.body.clientWidth < 614 && document.body.clientWidth >= 362)
            height.style.height = "1050px";
        else if(document.body.clientWidth < 362)
            height.style.height = "1150px";

        totalNb = 3
        cibleNbP.innerHTML = formulaire1Pt1 + totalNb + formulaire1Pt2;
        for (i = 1; i < nbP; i++)
            cibleNbP.innerHTML += formulaire2Pt1 + nb[i] + formulaire2Pt2 + nb[i] + formulaire2Pt3 + totalNb +
            formulaire2Pt4 + nb[i] + formulaire2Pt5 + nb[i] + formulaire2Pt6 + nb[i] + formulaire2Pt7;
    }
    else if (nbP == "4") {
        if(document.body.clientWidth >= 1310)
            height.style.height = "500px";
        else if(document.body.clientWidth < 1310 && document.body.clientWidth >= 614)
            height.style.height = "750px";
        else if(document.body.clientWidth < 614 && document.body.clientWidth >= 362)
            height.style.height = "1200px";
        else if(document.body.clientWidth < 362)
            height.style.height = "1350px";

        totalNb = 4
        cibleNbP.innerHTML = formulaire1Pt1 + totalNb + formulaire1Pt2;
        for (i = 1; i < nbP; i++)
            cibleNbP.innerHTML += formulaire2Pt1 + nb[i] + formulaire2Pt2 + nb[i] + formulaire2Pt3 + totalNb +
            formulaire2Pt4 + nb[i] + formulaire2Pt5 + nb[i] + formulaire2Pt6 + nb[i] + formulaire2Pt7;
    }

    let cible = document.querySelector(".cible");
    cible.innerHTML = "<div>0 €</div>";
}

function DateValide(heure)
{
    let cibleDate = document.querySelector(".CibleDate");
    let DateActuelle = new Date();
    let dateMin = DateActuelle.getFullYear() + "-";
    if(DateActuelle.getMonth()+1 < 10)
        dateMin += ('0' + DateActuelle.getMonth()+1) + "-";
    else
        dateMin += (DateActuelle.getMonth()+1) + "-";
    if(DateActuelle.getDate() < 10)
        dateMin += ('0' + DateActuelle.getDate());
    else
        dateMin += (DateActuelle.getDate());

    let dateMaxv1 = AddDays(7);

    let dateMax = dateMaxv1.getFullYear() + "-";
    if(dateMaxv1.getMonth()+1 < 10)
        dateMax += ('0' + dateMaxv1.getMonth()+1) + "-";
    else
        dateMax += (dateMaxv1.getMonth()+1) + "-";
    if(dateMaxv1.getDate() < 10)
        dateMax += ('0' + dateMaxv1.getDate());
    else
        dateMax += (dateMaxv1.getDate());

    if(heure == true)
        cibleDate.innerHTML = "<input class='date' type='date' name='date' id='date' min='" + dateMin + "' max='" + dateMax + "' onchange='dimanche()'><br>\
        <input type='time' name='heure' id='heure' class='heure'>";
    else
        cibleDate.innerHTML = "<div class='emplacementDate'><label for='date'>Date : <label><input type='date' name='date' id='date' min='" + dateMin + "' max='" + dateMax + "' onchange='dimanche()'></div>";
}

function AddDays(days)
{
    let date = new Date();
    date.setDate(date.getDate() + days);
    return date;
}

function affichageMenuJs($menu, $boisson, $sauce1, $sauce2, $nb)
{
    let cible = document.querySelector(".cible");
    cible.innerHTML += "<h3>Menu " + $nb + "</h3>\
                  <p>Choix menu = " + $menu + "</p>\
                  <p>Boisson = " + $boisson + "</p>\
                  <p>Sauce 1 = " + $sauce1 + "</p>\
                  <p>Sauce 2 = " + $sauce2 + "</p><br>";
}

function dimanche() {
    let cible = document.querySelector(".errorCible");
    let dateC = document.getElementById("date").value;
    dateSplit = dateC.split('-');
    let dateChoisie = new Date(dateSplit[0], dateSplit[1]-1, dateSplit[2]);
    if(dateChoisie.getDay() == 0)
        cible.innerHTML = "<span error='colorError'>Nous sommes fermés les dimanches</span>";
    else
        cible.innerHTML = "";
}