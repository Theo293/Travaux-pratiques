let Tableau = [1, 15, -3, 0, 8, 7, 4, -2, 28, 7, -1, 17, 2, 3, 0, 14, -4];

for (let i = 0 ; i < Tableau.length ; i++) 
{
    console.log(Tableau[i]);
}

for (let i = Tableau.length - 1 ; i >= 0 ; i--)
{
    console.log(Tableau[i]);
}

let arrayCopy = Tableau.slice();