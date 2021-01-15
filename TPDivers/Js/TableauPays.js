function affichage() {
    let req = new XMLHttpRequest();
    req.open("GET", "https://digicode.cleverapps.io/json/pays/pollution");
    req.onreadystatechange = function() {
        if(req.readyState == 4 && req.status == 200)
        {
            let data = JSON.parse(req.responseText);
            let table = document.getElementById("tableauJ"), tbDrapeau = ["cn", "us", "in", "ru", "jp", "de", "kr", "ir", "ca"],
            titre = document.querySelector("#titre");

            // Ecriture du titre dans le h1

            titre.innerHTML += data.polluant + "(" + data.unite + ") en " + data.annee;

            // Création de lignes et colonnes du tableau et insertion des données

            for (let i = 0; i < data.pays.length; i++) {
                let row = table.insertRow(i);
        
                let cell = row.insertCell(0);
                cell.innerHTML = '<img src=https://www.countryflags.io/' + tbDrapeau[i] + '/flat/32.png>';
                let cell2 = row.insertCell(1);
                cell2.innerHTML = data.pays[i].nom;
                let cell3 = row.insertCell(2);
                cell3.innerHTML = data.pays[i].valeur;
                let cell4 = row.insertCell(3);
                cell4.innerHTML = data.pays[i].pourcentage;
            }
        }
    }
    req.send();
}