$("#update_pass").submit(function (e) { 
    e.preventDefault();
    alert("Traitement de la requete en cours...")
    let form=new FormData(this)

    if (form.get("new_1")==form.get("new_2")) {
        $.post("server/?clients-connect",{"telephone":db.get('user')["telephone"],"mot_de_passe":form.get("old")},
            function (data, textStatus, jqXHR) {
                if(data.data.length==1){
                    $.post("server/?clients-update="+db.get("user")["id"], {mot_de_passe:form.get("new_1")},
                        function (data, textStatus, jqXHR) {
                            alert("Mot de passe changé avec success! nous allons vous rediriger vers la page de connexion!!")
                            deconnect() 
                        },
                        "json"
                    );
                }else{
                    alert("Ancien mot de passe incorect!!")
                }
            },
            "json"
        );    
    }else{
        alert("Les nouveaux mots de passe ne sont pas indentique")
    }
});


function deconnect() {
    db.remove('user')
    lacrea_load()
    navbar()
}
$('.infos>.head>div>.info').html(`
    <strong>${db.get('user').nom} ${db.get('user').postnom}</strong>
    <span>${db.get('user').telephone}</span>
    <i>${db.get('user').type}</i>
`);
$("title").text('JEB | Profil');
function get_articles() {
    $.get('/server/?articles-all',function (e) {
    $('#nb_article').text(`${e.data.length} Article.s`);
    $('#articles>.products>div').html("")
    e.data.forEach(article => {
        stat="danger"
        if (article.state) {
            article.state="Disponible"
            stat="primary"
        } else {
            article.state="Indisponible" 
        }
        $('#articles>.products>div').append(`
                        <div class="product-horizontal">
                            <img src="server/uploads/articles/${article.image}" alt="" srcset="">
                            <div>

                                <div class="state flex center between">
                                    <strong>
                                        ${article.title}
                                    </strong>
                                    <span class="${stat}">${article.state}</span>

                                </div>
                                <span class="">Prix de vente : ${article.price}$</span>
                                <span class="">Prix d'investissement : ${article.prix_investissement}$</span>
                                <span>Interet : ${article.rate_return}$</span>
                                <span>Periode : ${article.nb_day_return} Jours</span>
                                <div class="flex between">
                                    <button onclick="state(${article.id},'${article.state}')">Changer Etat</button>
                                    <button onclick="delet(${article.id})" class="danger">Supprimer</button>
                                </div>
                                
                            </div>
                        </div>
            `);
        });
    })
}
