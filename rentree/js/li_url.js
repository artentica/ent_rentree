function active_li(){
    var location = document.location.href;

    var n = location.indexOf("adminpanelstudent");

    if(n==-1){
        $('#gest_promo').addClass( "active" );
    }
    else $('#gest_student').addClass( "active" );
}
