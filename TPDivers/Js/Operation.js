function operation() {

    let nb1 = parseInt(document.querySelector("#nombre1").value),
    nb2 = parseInt(document.querySelector("#nombre2").value),
    op = document.querySelector("#operateur").value, som = 0,
    c = document.querySelector("#cible");

    if(!nb1 || !nb2 || typeof(nb1) != "number" || typeof(nb2) != "number" || !op)
    {
        c.innerHTML = "<span style= 'background-color: red'>Problème de saisie</span>";
    }
    else
    {
        switch (op)
        {
            case '+':
            som = nb1 + nb2;
            c.innerHTML = "Le résultat de l'addition est " + som;
            break;
            case '-':
            som = nb1 - nb2;
            c.innerHTML = "Le résultat de l'addition est " + som;
            break;
            case '*':
            som = nb1 * nb2;
            c.innerHTML = "Le résultat de l'addition est " + som;
            break;
            case '/':
            som = nb1 / nb2;
            c.innerHTML = "Le résultat de l'addition est " + som;
            break;
        }
    }
}