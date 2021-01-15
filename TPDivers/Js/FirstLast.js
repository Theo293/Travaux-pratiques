let Tableau = [1, 4, 12, 2, 10, 1], Booleen = false;

if ((Tableau.length > 0) && (Tableau[0] == Tableau[Tableau.length - 1]))
{
    Booleen = true;
}

if (Booleen == true)
{
    console.log("Le tableau remplit les conditions");
}
else
{
    console.log("Le tableau ne remplit pas les conditions");
}