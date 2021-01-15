let dateDeNaissance = new Date(2000, 1, 1), dateActuelle = new Date(2020, 10, 21), difAnnees = 0, difMois = 0;

difAnnees = dateActuelle.getFullYear() - dateDeNaissance.getFullYear();
if (dateActuelle.getMonth() > dateDeNaissance.getMonth())
{
    for (let i = dateDeNaissance.getMonth() ; i <= dateActuelle.getMonth() ; i++)
    {
        difMois++;
    }
}
else if (dateActuelle.getMonth() < dateDeNaissance.getMonth())
{
    difMois = dateActuelle.getMonth() + 1;
    difAnnees -= 1;
}

console.log("Vous avez " + difAnnees + " ans et " + difMois + " mois.");