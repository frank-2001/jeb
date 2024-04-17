function deconnect() {
    db.remove('user')
    lacrea_load()
    navbar()
}
$('.infos>.head>.info').html(`
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
