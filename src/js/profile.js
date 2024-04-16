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
