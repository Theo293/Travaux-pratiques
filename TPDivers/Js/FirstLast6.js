let Tableau = [6, 4 , 3, 10, 34], Booleen = false, Taille = 0;

Taille = Tableau.length - 1;

if ((Tableau.length > 0) && (Tableau[0] == 6 || Tableau[Taille] == 6))
{
    Booleen = true;
}

if (Booleen == true)
{
    console.log("Le tableau comporte au moins un élément et à pour première ou dernière valeur 6.");
}
else
{
    console.log("Le tableau ne comporte par d'éléments ou n'a pas pour première ou dernière valeur 6.");
}