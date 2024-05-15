let APP=""
$("#loading").hide();
function lacrea_load(destination=".body",file="apps/home/index.html"){
    $("html").scrollTop(0);
    $("#loading").show();
    db.set('app',file)
    console.log("load "+file);
    $(destination).html("<div style='height:100vh; display:grid;align-items:center;justify-content:center'>Chargment....</div>");
    $.get(file+"?"+db.get('version'),
        function (data, textStatus, jqXHR) {
            $(destination).html(data);
        },
        ""
    ).fail((e)=>{
        $(destination).html(e);
    }).always(e=>{
        $("#loading").hide();
    })
}
let url=location.href
if(url.split('/').indexOf("produits")>=0){
    lacrea_load('.body','apps/produits/index.html')
}