document.querySelector("ul .user").addEventListener("click", user);
function user() {
  requeston("GET", "user.php?id=1", ".tbody");
}
document.querySelector("ul .admins").addEventListener("click", admins);
function admins() {
  requeston("GET", "list.php?id=1", ".table");
}
document.querySelector("ul .company").addEventListener("click", company);
function company() {
  requeston("GET", "list.php?id=2", ".table");
}
document.querySelector("ul .serviceman").addEventListener("click", serviceman);
function serviceman() {
  requeston("GET", "list.php?id=3", ".table");
}
document.querySelector("ul .manager").addEventListener("click", manager);
function manager() {
  requeston("GET", "list.php?id=4", ".table");
}
document.querySelector(".submit").addEventListener("click", searchval);
function searchval(e){
    var st = document.getElementById("state").value;
    var sr = document.getElementById("search").value;
    console.log(st);
    console.log(sr);
    var obj = {
        IDS : 3,
        sr : sr,
        st : st
    }
    searcher.searchtable(e,"user.php?id=3", ".tbody", obj);
}
