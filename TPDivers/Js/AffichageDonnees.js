function Affichage() {
    let req = new XMLHttpRequest();
    req.open("GET", "https://restcountries.eu/rest/v2/all");
    req.onreadystatechange = function() {

    //  Affichage des données
    
        if(req.readyState == 4 && req.status == 200)
        {
            let data = JSON.parse(req.responseText);
            let c = document.querySelector("#cible");

            for(let i = 0 ; i < data.length ; i++)
            {
                c.innerHTML += "<li>"+ data[i].name + ", " + data[i].capital + ", " + data[i].population + ", "
                 + data[i].region + "</li>";
            }
        }
}
    req.send();

}