let Tableau = [10, 21, 42, 3, 4, 5, 16], Stock = 0, Stock2 = 0;

Stock = Tableau[0];

for (let i = 0 ; i <= Tableau.length ; i++)
{
    if(i != Tableau.length && i == 0)
    {
        Stock = Tableau[i + 1];
        Tableau[i + 1] = Tableau[i];
    }
    else if (i < Tableau.length - 1)
    {
        Stock2 = Tableau[i + 1];
        Tableau[i + 1] = Stock;
        Stock = Stock2;
    }
    else
    {
        Tableau[0] = Stock;
    }
}

for (let i = 0 ; i < Tableau.length ; i++)
{
    console.log(Tableau[i]);
}