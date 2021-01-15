// Création du Json

let personne = {
    "nom" : "Google",
    "SiègeSocial" : {"batiment" : "Googleplex", "municipalité" : "Mountain View", "état" : "California", "pays" : "United States"},
    "Fondateurs" : [{"nom" : "Larry Page", "dateDeNaissance" : "26/03/1973", "ville" : "East Lansing", "état": "Michigan"},
                    {"nom" : "Sergey Brin", "dateDeNaissance" : "21/08/1973", "ville" : "Moscou", "état" : "Union Soviétique"}],
    "ChiffreDAffaires" : [{"date" : "2008", "total" : 16.49},
                            {"date" : "2012", "total" : 37.97},
                            {"date" : "2016", "total" : 89.46},
                            {"date" : "2018", "total" : 136.2}]
};

// Affichage des champs "Fondateurs" et "ChiffreDAffaires" du json

for(let i = 0 ; i < personne.Fondateurs.length ; i++)
{
    console.log(personne.Fondateurs[i].nom);
    console.log(personne.Fondateurs[i].dateDeNaissance);
    console.log(personne.Fondateurs[i].ville);
    console.log(personne.Fondateurs[i].état);
}

for(let i = 0 ; i < personne.ChiffreDAffaires.length ; i++)
{
    console.log(personne.ChiffreDAffaires[i].date);
    console.log(personne.ChiffreDAffaires[i].total);
}