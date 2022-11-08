var rx =/;|\"|\'/g;
var id = document.querySelector(".form").getAttribute("data-id");
parseInt(id);
if (id == 1) {
    document.querySelector(".submit").addEventListener("click",checkform);
    function checkform(){
    var busness = document.getElementById("busness").value;
    var country = document.getElementById("country").value;
    var state = document.getElementById("state").value;
    var sdiv = document.getElementById("s-div").value;
    var up = document.getElementById("P-stat").value;
    var lname = document.getElementById("l-name").value;
        formon.formnull("#country",".country", "type your country name minimum length 3 alphabit");
        formon.formnull("#state",".state", "type your state name minimum length 3 alphabit");
        formon.formnull("#s-div",".s-div", "type your sub state minimum name length 3 alphabit");
        formon.formnull("#P-stat",".P-stat", "type your U/P name minimum length 3 alphabit");
        formon.formnull("#l-name",".l-name", "type your location minimum name length 3 alphabit");
        formon.formlength("#country", 32, ".country", "maximum length 32 alphabit require");
        //formon.formlength("#state", 32, ".state", "maximum length 32 alphabit require");
        //formon.formlength("#s-div", 32, ".s-div", "maximum length 32 alphabit require");
        //formon.formlength("#p-stat", 32, ".p-stat", "maximum length 32 alphabit require");
        //formon.formlength("#l-name", 32, ".l-name", "maximum length 32 alphabit require");
        if(busness.match(rx) || country.match(rx) || state.match(rx) || sdiv.match(rx) || up.match(rx) || lname.match(rx)){
            formon.formletter(".latter", "there have an Unformated alphabit ':,; etc ");
        } else if((busness == '') || (country == '') || (state == '') || (sdiv == '') ||(up == '') || (lname == '')){
            formon.formletter(".latter", "this value is null check perfectely each of the value");
        }else{
    
    var obj = {
        busness: busness,
        country: country,
        state: state,
        sdiv: sdiv,
        up: up,
        l_name: lname,
        IDS: 1,
        DBS: "update",
        OPS: "unknow"
       }
    var id = JSON.stringify(obj);
           if(id != null){
               window.location.replace("/blog/page/company/action.php?id=" + encodeURI(id));
           }
        }
        
    }
} else if (id == 2) {
    console.log('id 2');
}

