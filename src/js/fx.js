function formToDic(form) {
    let dict={}
    for(var i of form.entries()){
        dict[i[0]]=i[1];
    }
    return dict
}