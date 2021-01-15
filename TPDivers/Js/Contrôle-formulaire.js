// Contrôle des input

function fonction() {
    let nom = document.querySelector("[name=nom]").value, prenom = document.querySelector("[name=prenom]").value,
        dateNaissance = document.querySelector("[name=dateNaissance]").value, lieuNaissance = document.querySelector("[name=lieuNaissance]").value,
        deptNaissance = document.querySelector("[name=deptNaissance]").value, numeroRue = document.querySelector("[name=numeroRue]").value,
        libelleRue = document.querySelector("[name=libelleRue]").value, codePostal = document.querySelector("[name=codePostal]").value,
        ville = document.querySelector("[name=ville]").value, c = document.querySelector("#cible"), Booleen = true;

    if(!nom || !prenom || !dateNaissance || !lieuNaissance || !deptNaissance || !numeroRue || !libelleRue
        || !codePostal || !ville) {
        c.innerHTML = "<span style='background-color: red'>Un champ n'a pas été rempli</span>";
        Booleen = false;
    }
    else if(nom.length < 3 || prenom.length < 3 || lieuNaissance < 3 || libelleRue < 3 || ville < 3)
    {
        c.innerHTML = "<span style='background-color: red'>Les champs de caractères doivent contenir au moins trois caractères";
        Booleen = false;
    }
    else if(!DifférenceAge(dateNaissance)) {
        c.innerHTML = "<span style='background-color: red'>Vous devez avoir 18 ans ou plus pour être autorisé à soumettre ce formulaire</span>";
        Booleen = false;
    }

    if(Booleen)
    {
        c.innerHTML = "Formulaire envoyé";
        document.forms[0].submit();
    }
}

// Calcul de la différence entre la date actuelle et la date passée en paramètre

function DifférenceAge(t) {
    dateActuelle = new Date(2020, 10, 23), difAnnees = 0, difMois = 0;
    let dateDeNaissance = new Date(t);
    console.log(dateDeNaissance.getMonth());

    difAnnees = dateActuelle.getFullYear() - dateDeNaissance.getFullYear();
    if (dateActuelle.getMonth() > dateDeNaissance.getMonth()) {
        for (let i = dateDeNaissance.getMonth(); i <= dateActuelle.getMonth(); i++) {
            difMois++;
        }
    }
    else if (dateActuelle.getMonth() < dateDeNaissance.getMonth()) {
        difMois = dateActuelle.getMonth() + 1;
        difAnnees -= 1;
    }

    if (difAnnees > 18)
        return true;
    else
        return false;
}