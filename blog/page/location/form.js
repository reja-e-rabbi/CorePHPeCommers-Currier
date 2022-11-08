regex = /;|\"|\'/g;
rex = /@/gi;
var dataID = document.querySelector(".form").getAttribute("data-id");
document.querySelector(".submit").addEventListener("click", submit);

function submit() {
  formon.formnull("#f-name", ".f-name", "Frist name is Null");
  formon.formlength( "#f-name",32,".f-name ","Minimum length 4 alphabit maximum 32");
  var f_name = document.querySelector("#f-name").value,
    l_name = document.querySelector("#l-name").value,
    n_name = document.querySelector("#n-name").value,
    email = document.querySelector("#email").value,
    phone = document.querySelector("#phone").value,
    pass = document.querySelector("#pass").value,
    r_pass = document.querySelector("#r-pass").value,
    s_rate = document.querySelector("#rang").value
  if (f_name == null || f_name.length > 32 || f_name.length < 3 || f_name.match(regex)) {
    formon.formletter(".errorON","minimum alphabit requir 3 and check semicolon colon, brecket etc that is unstracter formate ");
  } else {
    var ify = JSON.stringify(obj);
    if (dataID == 1) {
      //requeston("GET","action.php?val=" + encodeURI(ify) + "&sl=1",".form");
      console.log(ify);
    }
  }
}
