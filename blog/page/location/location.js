
document.querySelector("div #ulc").addEventListener("click",pagin);
function pagin(e){
    e.preventDefault();
    paging.pgnTable(e,"location.php?id=2",".tbody");
}

document.querySelector(".submit").addEventListener("click", searchval);
function searchval(e){
    e.preventDefault();
    var val = document.getElementById("search").value;
    var state = document.getElementById("state").value;
    var obj = {
            IDS : 1,
            sr : val,
            st : state
        }
    searcher.searchtable(e,"location.php?id=3", ".tbody", obj);
}

/*document.querySelector(".form-group #search").addEventListener("keypress", tabsearch);
function tabsearch(e){
    console.log(sv);
    var sv = e.target.id;
    document.querySelector(".form-group ul").style.visibility = "visible";
    
}
document.querySelector(".form").addEventListener("focusout", liout);
function liout(e){
    e.preventDefault();
    document.querySelector(".form-group ul").style.visibility = "hidden";
}
document.querySelector(".form-group ul").addEventListener("click", searchval);
function searchval(e){
    e.preventDefault();
    if(e.target.classList.contains("search-val")){
        console.log(liv);
        var liv = e.target.className;
    }
}
*/