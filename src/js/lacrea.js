export function lacrea_load(destination=".body",file="applications/home/"){
    console.log("lacrea_load");
    $(destination).html("Chargment....");
    $.get(file, data,
        function (data, textStatus, jqXHR) {
            $(destination).html(data);
        },
        ""
    ).fail((e)=>{
        $(destination).html(e);
    });
}