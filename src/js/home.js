// console.log("Loading");
function svg() {
    $("#svg_phone").html(`<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
        </svg>
    `);
    $("#svg_location").html(`<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
        </svg>  
    `);
    $("#svg_mail").html(`<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
        </svg>
    `);
    $("#svg_site").html(`<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
        </svg>
    `);
    $("#svg_close").html(`<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
    `);
    $("#svg_pen").html(`<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
        </svg>    
    `);
    $("#svg_stop").html(`<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
        </svg>    
    `);
    $("#svg_trash").html(`
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
        </svg>    
    `);
}
function lacrea_load(destination=".body",file="applications/home/index.html",append=false,direct=false){
    if (!append) {
        $(destination).html(`
        <div class="full-in center">
            <span class="h3">CHARGEMENT....</h3>
        <div>
        `);
    }
    if (direct) {
        if (append) {
            $(destination).append(file);
        } else {
            $(destination).html(file); 
        }
        svg()
    }else{
        $.get(file,{},
            function (data, textStatus, jqXHR) {
                if (append) {
                    $(destination).append(data);
                } else {
                    $(destination).html(data); 
                }
                svg()
            },"text"
        ).fail((e)=>{

            $(destination).html(e.textStatus);
        });
    }
}
$.getJSON("server/?universite-all",
    function (data, textStatus, jqXHR) {
        db.set("universite",data.data)
        start(data.data)    
    }
).fail(e=>{
    start(db.get("universite"))
});

function start(data) {
    if (data.length==0) {
        swal("Systeme non configuré")
        lacrea_load(".body","applications/apparitorat")
    }else{
        lacrea_load()
    }
}

function tab(list,active,classname) {
    $(list).removeClass(classname);
    $(active).addClass(classname);
}
let user=db.get("user")
if (user!=null) {
    $("header>.no-connected").hide();
    $("header>.connected").show();
    $("#user_connected").text(`${user[0].nom} ${user[0].postnom} | ${user[0].service}`);
}
function disconnect(){
    db.remove("user")
    window.location.reload()
}

function bureau() {
    $(".body").html(`
    <div class="full-in center">
        <span class="h3">VERIFICATION DU COMPTE....</h3>
    <div>
    `);
    $.post("server/?login", {"matricule":db.get("user")[0].matricule},
        function (data, textStatus, jqXHR) {
            data=data.data
            if (data.length==1) {
                db.set("user",data)
                data=data[0]
                lacrea_load('.body',`applications/${data.service}/`)
                
            } else if(data.length>1) {
                swal(`Conflit d'identifiant, ${data.length} compte porte le meme identifiant!`)
                disconnect()
                return
            }else{
                swal("votre compte est bloqué, veuillez contacter l'administrateur")
                disconnect()
                return;
            }
        },
        "json"
    ).fail(e=>{
        $(".body").html(e.responseText);
    });
}
function recu(matricule) {
    parcours=[]
    $.getJSON("server/?etudiant_1-parcours="+matricule,
        function (data, textStatus, jqXHR) {
            console.log(data);
            parcours=data.data

        $.post("server/?recu-by",{"matricule":matricule},
            function (data, textStatus, jqXHR) {
                code=`
                    <section class="paiement_historic full bg-blur center fixed" >
                        <style>
                            .list-recu{
                                margin-top:20px   
                            }
                            .list-recu>.title,.list-recu>.data>div{
                                display: grid;
                                grid-template-columns: 15% 15% 10% 15% 30% 15%;

                                
                            }
                            .data>div>span,.list-recu>.title>span{
                                border: solid black 1px ;
                                padding: 10px 5px;
                            }
                        </style>
                        <div class=" card white" style="width:80vw;height:80vh;overflow-y:auto">
                            <div class="flex">
                                <span class="h2">Historique des paiements</span>
                                <button class="danger" onclick="$('.paiement_historic').remove()">&cross;</button>
                            </div> 
                            <div class="list-recu">
                                <div class="primary title">
                                    <span>Année</span>
                                    <span>Date du paiement</span>
                                    <span>Promotion</span>
                                    <span>Montant</span>
                                    <span>Type frais</span>
                                    <span>Reste</span>
                                </div>
                                <div class="data">
                                <div>
                            </div>
                        </div>
                    </section>
                `
                lacrea_load("body",code,true,true)
                data=data.data
                annee=[]
                console.log(parcours);
                reste=0
                apayer=0
                data.forEach((an,i) => {
                    console.log(i);
                    
                    
                    
                    if (annee.indexOf(an.annee_academique)>=0) {
                        // an.annee_academique="-"
                    }else{
                        
                        if (i!=0) {
                            $(".list-recu").append(`
                                <div class="primary">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            `);    
                        }
                        parcours.forEach(p => {
                        if(p.annee_academique==an.annee_academique){
                                apayer=Number(p.frais_academiques)+Number(p.frais_connexes)+Number(p.autres_frais)+Number(p.frais_finalistes)
                            }
                        });
                        reste=apayer
                    }
                    console.log(reste,an.montant);
                    reste=reste-Number(an.montant)
                    annee.push(an.annee_academique)
                    $(".list-recu>.data").prepend(`
                        <div>
                            <span>${an.annee_academique}</span>
                            <span>${an.date_paiement}</span>
                            <span>${an.promotion}</span>
                            <span>${an.montant}$</span>
                            <span>${an.type_frais}</span>
                            <span>${reste}$ / ${apayer}$</span>
                        </div>
                    `);
                });
            }

        );
    });
}


function student_info(data) {
    code=`
        <section class="one_student_infos full bg-blur center fixed">
             
            <div class="card white"style="width:80vw;height:80vh;overflow-y:auto;">
                <div class="fixed" style="display:flex;justify-content:right;width:70%">
                    <button class="danger" onclick="$('.one_student_infos').remove()">&cross;</button>
                </div> 
                <div class="one_student">
                    <div class="photo">
                        <div class="container-img " style="border: none;display: grid; gap: 10px;">
                            <!-- <div class="img">

                            </div> -->
                            <img src="img/user.png" style="height: auto;width: 100%;" alt="" srcset="">
                            <button class="primary" onclick="recu(${data.matricule})">
                                Finances
                            </button>
                            <button class="primary" onclick="cours_student(${data.matricule})">
                                Cours
                            </button>
                            
                        </div>
                    </div>
                    <!-- ids Student -->
                    <div class="first-id infos">
                        <span class="h3">Identités de l'Etudiant</span>
                        <ul>
                            <li>Nom      : <span id="nom">${data.nom}</span></li>
                            <li>Post-Nom : <span id="postnom">${data.postnom}</span></li>
                            <li>Prénom   : <span id="prenom">${data.prenom}</span></li>
                            <li>Sexe     : <span id="sexe">${data.sexe}</span></li>
                            <li>Matt.    : <span id="matricule">${data.matricule}</span></li>
                            <li>Promotion     : <span id="nom_promotion">${data.nom_promotion}</span></li>
                            <li>Département   : <span id="nom_departement">${data.nom_departement}</span></li>
                            <li>Faculté       : <span id="nom_faculte">${data.nom_faculte}</span></li>
                            <li>Téléphone       : <span id="telephone">${data.telephone}</span></li>
                        </ul>
                        <span class="h3">Adresses</span>
                        <ul>
                            <li>Ville   : <span id="ville_actuelle">${data.ville_actuelle}</span> </li>
                            <li>Commune :  <span id="commune_actulle">${data.commune_actulle}</span></li>
                            <li>Quartier    :  <span id="quartier_actuel">${data.quartier_actuel}</span></li>
                            <li>Pays d'origine     : <span id="pays_origine">${data.pays_origine}</span></li>
                            <li>Province d'origine    : <span id="province_origine">${data.province_origine}</span></li>
                            <li>Territoire d'origine     : <span id="territoire_origine">${data.territoire_origine}</span></li>
                        </ul>
                        
                        <span class="h3">Ecole secondaire</span>
                        <ul>
                            <li>Nom de l'école frequentée    :  <span id="ecole_secondaire">${data.ecole_secondaire}</span></li>
                            <li>Section faite    : <span id="section_secondaire"> ${data.section_secondaire}</span></li>
                            <li>Année d'obtention du diplôme    : <span id="annee_diplome"> ${data.annee_diplome}</span></li>
                            <li>Pourcentage du diplôme    :  <span id="pourcentage_diplome">${data.pourcentage_diplome}</span></li>
                            <li>Numéro du diplôme d'Etat    :  <span id="numero_diplome">${data.numero_diplome}</span></li>
                            
                        </ul>
                        <span class="h3">Université de provenance</span>
                        <ul>
                            <li>Année académique    :  <span id="last_annee_academique">${data.last_annee_academique}</span></li>
                            <li>Etablissement    :  <span id="last_etablissement">${data.last_etablissement}</span></li>
                            <li>Promotion    :  <span id="last_promotion">${data.last_promotion}</span></li>
                            <li>Département    :  <span id="last_departement">${data.last_departement}</span></li>
                            <li>Faculté   :  <span id="last_faculte">${data.last_faculte}</span></li>
                        </ul>
                        <span class="h3">Documents requis</span>
                        <ul>
                            <li>Attestation du diplôme     : <span id="at_diplome_secondaire">${data.at_diplome_secondaire}</span></li>
                            <li>Attestation de bonnes moeurses  : <span id="at_bonnes_moeurses">${data.at_bonnes_moeurses}</span></li>
                            <li>Attestation d'engagement     : <span id="at_engagement">${data.at_engagement}</span></li>
                            <li>Relevés (pour ancients)  : <span id="at_releve">${data.at_releve}</span></li>
                        </ul>

                        <span class="h3">Autres infos</span>
                        <ul>
                            <li>Nom du Père     : <span id="pere_nom">${data.pere_nom}</span></li>
                            <li>Tél. du Père  : <span id="pere_tel">${data.pere_tel}</span></li>
                            <li>Nom de la Mère : <span id="mere_nom">${data.mere_nom}</span></li>
                            <li>Tél. de la Mère  : <span id="mere_tel">${data.mere_tel}</span></li>
                            <li>Confession religieuse   : <span id="religion">${data.religion}</span></li>
                            <li>Langues parlée(s)       : <span id="langues">${data.langues}</span></li>
                            <li>Activités professionnelles   :  <span id="profession">${data.profession}</span></li>    
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    `
    lacrea_load("body",code,true,true)
}
function cours_student(matricule) {
    if (matricule==null) {
        swal("Etudiant non validé")
        return
    }
    $.get("server/?affectation_cours-student="+matricule,
        function (data, textStatus, jqXHR) {
            console.log(data);
            code=`
                    <section class="paiement_historic full bg-blur center fixed" >
                        <style>
                            .list-recu{
                                margin-top:20px   
                            }
                            .list-recu>.title,.list-recu>.data>div{
                                display: grid;
                                grid-template-columns: 10% 35% 25% 10% 10% 10%;
                                
                            }
                            .data>div>span,.list-recu>.title>span{
                                border: solid black 1px ;
                                padding: 10px 5px;
                            }
                        </style>
                        <div class=" card white" style="width:80vw;height:80vh;overflow-y:auto">
                            <div class="flex">
                                <span class="h2">Cours</span>
                                <button class="danger" onclick="$('.paiement_historic').remove()">&cross;</button>
                            </div> 
                            <div class="list-recu">
                                <div class="primary title">
                                    <span>Promotion</span>
                                    <span>Cours</span>
                                    <span>Enseignant</span>
                                    <span>Cote</span>
                                    <span>Crédit</span>
                                    <span>Appreciation</span>
                                </div>
                                <div class="data">
                                <div>
                            </div>
                        </div>
                    </section>
                `
                lacrea_load("body",code,true,true)
                data=data.data
                total=0
                point=0
                promotion=[]
                data.forEach((an,i) => {
                    total+=20
                    appreciation=""
                    if (an.note==null) {
                        an.note="-"
                        appreciation="<span class='secondary'>Sans Cote</span>"
                    }else if(an.note>=18){
                        appreciation="A"
                    }else if(an.note>=16){
                        appreciation="B"
                    }else if(an.note>=14){
                        appreciation="C"
                    }else if(an.note>=12){
                        appreciation="D"
                    }else if(an.note>=10){
                        appreciation="E"
                    }else{
                        appreciation="<span class='danger'>Echec</span>"
                    }

                    
                    if (promotion.indexOf(an.promotion)>=0) {
                        an.promotion="-"
                    }else{
                        point=0
                        total=0
                        if (i!=0) {
                            $(".list-recu").append(`
                                <div class="primary">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            `);    
                        }
                    }
                    promotion.push(an.promotion)
                    
                    $(".list-recu>.data").append(`
                        <div>
                            <span>${an.promotion}</span>
                            <span>${an.cours}</span>
                            <span>${an.enseignant_nom} ${an.enseignant_postnom}</span>
                            <span>${an.note}/20</span>
                            <span>${an.credit}</span>
                            <span>${appreciation}</span>
                        </div>
                    `);
                });
                

        },
        "json"
    );
    // code=`
    //     <section class="one_student_infos full bg-blur center fixed">
             
    //         <div class="card white"style="width:80vw;height:80vh;overflow-y:auto;">
    //             <div class="fixed" style="display:flex;justify-content:right;width:70%">
    //                 <button class="danger" onclick="$('.one_student_infos').remove()">&cross;</button>
    //             </div> 
    //             <div class="one_student">
    //                 <div class="photo">
    //                     <div class="container-img " style="border: none;display: grid; gap: 10px;">
    //                         <img src="img/user.png" style="height: auto;width: 100%;" alt="" srcset="">
    //                         <button class="primary" onclick="recu(${data.matricule})">
    //                             Finances
    //                         </button>
                            
    //                     </div>
    //                 </div>
    //                 <!-- ids Student -->
    //                 <div class="first-id infos">
    //                     <span class="h3">Identités de l'Etudiant</span>
    //                     <ul>
    //                         <li>Nom      : <span id="nom">${data.nom}</span></li>
    //                         <li>Post-Nom : <span id="postnom">${data.postnom}</span></li>
    //                         <li>Prénom   : <span id="prenom">${data.prenom}</span></li>
    //                         <li>Sexe     : <span id="sexe">${data.sexe}</span></li>
    //                         <li>Matt.    : <span id="matricule">${data.matricule}</span></li>
    //                         <li>Promotion     : <span id="nom_promotion">${data.nom_promotion}</span></li>
    //                         <li>Département   : <span id="nom_departement">${data.nom_departement}</span></li>
    //                         <li>Faculté       : <span id="nom_faculte">${data.nom_faculte}</span></li>
    //                         <li>Téléphone       : <span id="telephone">${data.telephone}</span></li>
    //                     </ul>
    //                     <span class="h3">Adresses</span>
    //                     <ul>
    //                         <li>Ville   : <span id="ville_actuelle">${data.ville_actuelle}</span> </li>
    //                         <li>Commune :  <span id="commune_actulle">${data.commune_actulle}</span></li>
    //                         <li>Quartier    :  <span id="quartier_actuel">${data.quartier_actuel}</span></li>
    //                         <li>Pays d'origine     : <span id="pays_origine">${data.pays_origine}</span></li>
    //                         <li>Province d'origine    : <span id="province_origine">${data.province_origine}</span></li>
    //                         <li>Territoire d'origine     : <span id="territoire_origine">${data.territoire_origine}</span></li>
    //                     </ul>
                        
    //                     <span class="h3">Ecole secondaire</span>
    //                     <ul>
    //                         <li>Nom de l'école frequentée    :  <span id="ecole_secondaire">${data.ecole_secondaire}</span></li>
    //                         <li>Section faite    : <span id="section_secondaire"> ${data.section_secondaire}</span></li>
    //                         <li>Année d'obtention du diplôme    : <span id="annee_diplome"> ${data.annee_diplome}</span></li>
    //                         <li>Pourcentage du diplôme    :  <span id="pourcentage_diplome">${data.pourcentage_diplome}</span></li>
    //                         <li>Numéro du diplôme d'Etat    :  <span id="numero_diplome">${data.numero_diplome}</span></li>
                            
    //                     </ul>
    //                     <span class="h3">Université de provenance</span>
    //                     <ul>
    //                         <li>Année académique    :  <span id="last_annee_academique">${data.last_annee_academique}</span></li>
    //                         <li>Etablissement    :  <span id="last_etablissement">${data.last_etablissement}</span></li>
    //                         <li>Promotion    :  <span id="last_promotion">${data.last_promotion}</span></li>
    //                         <li>Département    :  <span id="last_departement">${data.last_departement}</span></li>
    //                         <li>Faculté   :  <span id="last_faculte">${data.last_faculte}</span></li>
    //                     </ul>
    //                     <span class="h3">Documents requis</span>
    //                     <ul>
    //                         <li>Attestation du diplôme     : <span id="at_diplome_secondaire">${data.at_diplome_secondaire}</span></li>
    //                         <li>Attestation de bonnes moeurses  : <span id="at_bonnes_moeurses">${data.at_bonnes_moeurses}</span></li>
    //                         <li>Attestation d'engagement     : <span id="at_engagement">${data.at_engagement}</span></li>
    //                         <li>Relevés (pour ancients)  : <span id="at_releve">${data.at_releve}</span></li>
    //                     </ul>

    //                     <span class="h3">Autres infos</span>
    //                     <ul>
    //                         <li>Nom du Père     : <span id="pere_nom">${data.pere_nom}</span></li>
    //                         <li>Tél. du Père  : <span id="pere_tel">${data.pere_tel}</span></li>
    //                         <li>Nom de la Mère : <span id="mere_nom">${data.mere_nom}</span></li>
    //                         <li>Tél. de la Mère  : <span id="mere_tel">${data.mere_tel}</span></li>
    //                         <li>Confession religieuse   : <span id="religion">${data.religion}</span></li>
    //                         <li>Langues parlée(s)       : <span id="langues">${data.langues}</span></li>
    //                         <li>Activités professionnelles   :  <span id="profession">${data.profession}</span></li>    
    //                     </ul>
    //                 </div>
    //             </div>
    //         </div>
    //     </section>
    // `
    // lacrea_load("body",code,true,true)
}

function enseignant_cours(id) {
    $.post("server/?affectation_cours-by",{"enseignant":id},
        function (data, textStatus, jqXHR) {
            console.log(data);
            code=`
                    <section class="paiement_historic full bg-blur center fixed" >
                        <style>
                            .list-recu{
                                margin-top:20px   
                            }
                            .list-recu>.title,.list-recu>.data>div{
                                display: grid;
                                grid-template-columns: 20% 20% 30% 30%;
                                
                            }
                            .data>div>span,.list-recu>.title>span{
                                border: solid black 1px ;
                                padding: 10px 5px;
                            }
                            .data>div:hover{
                                background:black;
                                color:var(--secondary);
                            }
                        </style>
                        <div class=" card white" style="width:80vw;height:80vh;overflow-y:auto">
                            <div class="flex">
                                <span class="h2">Cours affectés</span>
                                <button class="danger" onclick="$('.paiement_historic').remove()">&cross;</button>
                            </div> 
                            <div class="list-recu">
                                <div class="primary title">
                                    <span>Promotion</span>
                                    <span>Faculte</span>
                                    <span>Departement</span>
                                    <span>Credit</span>
                                </div>
                                <div class="data">
                                <div>
                            </div>
                        </div>
                    </section>
                `
                lacrea_load("body",code,true,true)

                theCours=[]     
                    $(".affectations>div").html("")
                    data.data.reverse().forEach((f,i) => {
                        actual=f.cours
                        if (f.faculte==null) {
                            f.faculte="Tous"
                            f.departement="Tous"
                        }
                        if (f.departement==null) {
                            f.departement="Tous"
                        }
                        // if (i>0) {
                        //     $(".list-recu>.data").append(`
                        //         <div>
                        //             <span>${f.cours}</span>
                        //             <span>${f.promotion}</span>
                        //             <span>${f.faculte}</span>
                        //             <span>${f.departement}</span>
                        //             <span>${f.credit}</span>
                        //         </div>
                        //     `);
                        // }
                        if (theCours.indexOf(f.cours)==-1) {
                            $(".list-recu>.data").append(`
                                <div class="secondary" style="grid-templates-columns:100%">
                                     <span style="border:none" class="h2">${f.cours}</span>
                                </div>
                            `);
                        }
                        data.data.forEach(f => {
                            if (f.faculte==null) {
                                f.faculte="Tous"
                                f.departement="Tous"
                            }
                            if (f.departement==null) {
                                f.departement="Tous"
                            }
                            if (f.cours==actual && theCours.indexOf(f.cours)==-1) {
                                $(".list-recu>.data").append(`
                                    <div onclick="coteCours(${f.id})">
                                        <span>${f.promotion}</span>
                                        <span>${f.faculte}</span>
                                        <span>${f.departement}</span>
                                        <span>${f.credit}</span>
                                    </div>
                                `);    
                            }     
                        });     
                        
                        theCours.push(f.cours)
                        
                        
                    });
                // data=data.data
                // data.forEach((an,i) => {
                //     $(".list-recu>.data").append(`
                //         <div>
                //             <span>${an.cours}</span>
                //             <span>${an.promotion}</span>
                //             <span>${an.faculte}</span>
                //             <span>${an.departement}</span>
                //             <span>${an.credit}</span>
                //         </div>
                //     `);
                // });
        },
        "json"
    );
}
function coteCours(id){
    code=`
    <section class="app_etudiants full fixed bg-blur center" style="padding: 20px;">
        <style>
            
            .app_etudiants>div>.list>div,.app_etudiants>div>.list>form{
            
                display: grid;
                grid-template-columns: 5% 10% 30% 10% 30% 15%;
                grid-row: 100%;
                gap:0
            }
            .app_etudiants>div>.list>div>span,.app_etudiants>div>.list>form>span{
                border: solid 1px black;
                padding: 10px;
            }
            .list>form:hover{
                background: grey;
                color: white;
            }
            .title{
                text-transform: uppercase;
            }
            
        </style>
        <div class="card white" style="height:70vh;width:70vw">
            <div class="flex" style="margin-bottom:10px">
                <span class="h1 title" id="title_">Cotes</span>
                <div>
                    <button class="danger" onclick="$('.app_etudiants').remove()">&cross;</button>
                </div>
            </div>
            <div class="list" style="display: grid;padding: 0 0%;margin-top: 10px;">
                <div style="font-weight: 400;background:var(--primary);color:white"> 
                    <span>&numero;</span>
                    <span>Matricule</span> 
                    <span>Noms</span>
                    <span>Promotion</span>
                    <span>Departement</span>
                    <span>Cote /20</span>
                </div>
            </div>
        </div>
    </section>
    ` 
    lacrea_load("body",code,true,true)
    $.post("server/?cotes-by", {"id_affectation":id},
        function (data, textStatus, jqXHR) {
                $('#title_').text($('#title_').text()+" "+data.data[0].cours);
                data.data.forEach((e,i) => {

                    if (e.note==null) {
                        e.note=""
                    }
                    $(".list").append(`
                        <form> 
                        
                            <span>${i+1}</span>
                            <span>${e.matricule_etudiant}</span> 
                            <span>${e.etudiant_nom} ${e.etudiant_postnom}</span>
                            <span>${e.promotion}</span>
                            <span>${e.departement}</span>
                            <input type="hidden" name="id_cote" value="${e.id}">
                            <input type="number" min="0" max="20" step="0.1" style="border:1px solid black;border-radius:0" name="note" value="${e.note}">
                        </form>
                    `);
                });    
                $(".list").append(`
                    <button class="primary" onclick="submitCode()" style="padding:10px;margin:10px 20%">Enregister</button>
        
                `);  
        },
        "json"
    ).fail(e=>{
        swal(e.responseText)
    });
}
function submitCode(){    
    if (db.get("user")[0].service!="Enseignant") {
        swal("vous n'etes pas autorisé à modifier ces informations")
        return
    }
    forms=$(".list>form")
    console.log(forms);
    payloads=[]
    for (let i = 0; i < forms.length; i++) {
        f=forms[i]
        fd=new FormData(f)
        fd=formToDic(fd)
        payloads.push(fd)
        if (fd.note>20 || fd.note<0) {
            swal("Erreur dans un champs, les cotes doivent etre entre 0 et 20!")
            return
        }
    }
    
    // console.log(payloads);
    $.post("server/?cotes-cotes", {data:JSON.stringify(payloads)},
        function (data, textStatus, jqXHR) {
            swal(data.message)
            $('.app_etudiants').remove()
        },
        "json"
    ).fail(e=>{
        swal(e.responseText)
    });
}
// enseignant_cours(1)

document.addEventListener("load",e=>{
    console.log(e);
})