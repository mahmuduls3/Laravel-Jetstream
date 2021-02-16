function date_custom() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear() - 10;
    var yyyy_start = today.getFullYear() - 100;
    if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;
    var start = yyyy_start+'-'+mm+'-'+dd;
    document.getElementById("date_of_birth").setAttribute("max", today);
    document.getElementById("date_of_birth").setAttribute("min", start);
}
