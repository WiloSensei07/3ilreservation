
function pickHours(val)
{
    console.log('date filtre: '+val);
    //window.location.href = "../controller/update.php?datefilter="+val;
    // $("#date").html(val);

    var obj = {envoi: val}
    $.ajax({
        url: "../controller/update.php",
        type:"GET",
        data:obj
    }).done(function( arg ) {
        //alert( "Données : " + val );
        document.getElementById('salle').innerHTML=arg;
        console.log(arg);
    });
}


function test()
{
    let xhr = new XMLHttpRequest(); // cet objet permet de faire un appel asynchrone

    // vérifier lorsqu'on a un changement de notre requette
    // this contient l'ensemble des infos de notre requette
    xhr.onreadystatechange = function () {
        // requette bien effectuer (readyState == 4 et status == 200 (tout ses bien passer) )
        if (this.readyState == 4 && this.status == 200)
        {
            console.log(this.response);
            let res = this.response;
            //alert(res.data);

        }else if(this.readyState == 4)
        {
            alert("Une erreur est survenue...");
        }
    };


    // Initialisation de notre requette
    // true pour dire qu'on bvas faire une requette asynchrone
    xhr.open("GET", "../controller/update.php", true);

    // Préciser le type de donner a envoyer
    xhr.responseType = "json";
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

    // Envoie de la requette
    xhr.send('update.php?heure='+val);

}