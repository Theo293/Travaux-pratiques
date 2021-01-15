function addition() 
{
    let som = 0, el = document.querySelector("#cible");
    let nb1 = parseInt(document.querySelector("#nombre1").value, 10),
    nb2 = parseInt(document.querySelector("#nombre2").value, 10);

    /*  
        Contrôle des valeurs
        Si les valeurs sont valides, la somme des deux deux variables est envoyée au span
    */

    if(!nb1 || !nb2 || typeof(nb1) != "number" || typeof(nb2) != "number")
    {
        el.innerHTML = "<span style= 'background-color: red'>Vous devez entrer deux nombres</span>";
    }
    else
    {
        som = nb1 + nb2;
        el.innerHTML = "Le résultat de l'addition est " + som;
    }
}