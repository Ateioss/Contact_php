function mode_dark(){
    //récupération des éléments HTML de type div
   
    let liste_div = document.getElementsByTagName("*");
    for (let i = 0; i < liste_div.length; i++) {
        if(liste_div[i].classList.contains("mode-dark")){
            liste_div[i].classList.remove("mode-dark");
        }
        else {
            liste_div[i].classList.add("mode-dark");
        } 
    }
}
//fonction permettant d'afficher le formulaire de création d'un contact
function afficher_form_creation(){ 
    alert("e");
    let bloc_info = document.querySelector(".bloc-info-contact-main");
    if(bloc_info.classList.contains("cacher") == false){
        bloc_info.classList.add("cacher");
    }
    let bloc_form_modif = document.querySelector(".bloc-form-modification");
    if (bloc_form_modif.classList.contains("cacher") == false){
        bloc_form_modif.classList.add("cacher");
    }
    let bloc_form =document.querySelector(".bloc-form-creation");
    bloc_form.classList.remove("cacher");
}

function initialisation_form_modif_contact (){
    let info_nom=document.querySelector("#info-nom");
    let info_prenom=document.querySelector("#info-prenom");
    let info_mobile=document.querySelector("#info-mobile");
    let info_email=document.querySelector("#info-email");
    let info_contact_id=document.querySelector("#info-contact_id");

    let form_modif_nom=document.querySelector("#form-modif-nom");
    let form_modif_prenom=document.querySelector("#form-modif-prenom");
    let form_modif_mobile=document.querySelector("#form-modif-mobile");
    let form_modif_email=document.querySelector("#form-modif-email");
    let form_modif_contact_id=document.querySelector("#form-modif-contact_id");

    form_modif_nom.value= info_nom.innerHTML;
    form_modif_prenom.value= info_prenom.innerHTML;
    form_modif_mobile.value= info_mobile.innerHTML;
    form_modif_email.value= info_email.innerHTML;
    form_modif_contact_id.value=info_contact_id.innerHTML;

}

function afficher_form_modification(){ 
    let bloc_info = document.querySelector(".bloc-info-contact-main");
    if(bloc_info.classList.contains("cacher") == false){
        bloc_info.classList.add("cacher");
    }
    let bloc_form_creation= document.querySelector(".bloc-form-creation");
    if (bloc_form_creation.classList.contains("cacher") == false){
        bloc_form_creation.classList.add("cacher");
    }
    let bloc_form =document.querySelector(".bloc-form-modification");
    bloc_form.classList.remove("cacher");

    initialisation_form_modif_contact ();
}