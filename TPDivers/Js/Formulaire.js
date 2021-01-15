function controle() {
    let nom = document.querySelector("#nom").value, prenom = document.querySelector("#prenom").value,
    dateDeNaissance = document.querySelector("#dateDeNaissance").value, c = document.querySelector("#cible");

    // Contrôle des variables

    if(!nom)
        c.innerHTML = "<span style= 'background-color: red'>Le nom n'est pas renseigné</span>";
    else if (!prenom)
        c.innerHTML = "<span style= 'background-color: red'>Le prenom n'est pas renseigné</span>";
    else if (!dateDeNaissance)
        c.innerHTML = "<span style= 'background-color: red'>La date n'est pas renseignée</span>";
    else
        c.innerHTML = "Validé"
}