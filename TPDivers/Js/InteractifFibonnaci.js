nb = 10, tableau = [0, 1];

for (let i = 0 ; i < nb ; i++)
{
    tableau.push(tableau[i] + tableau[i + 1]);
}

for (let i = 0 ; i < tableau.length ; i++)
{
    console.log(tableau[i]);
}