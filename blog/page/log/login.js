var log = document.querySelector(".submit p");
var p = document.createElement("p");

login();
function login() {
  log.addEventListener("click", collectValue);
}
var cont = document.getElementById("state");
function collectValue() {
  var info, regex, rex, XMLHttp;
  regex = /;|\"|\'/g;
  rex = /@/gi;
  var email = document.getElementById("email").value;
  var pass = document.getElementById("pass").value;
  if (email == "" && pass == "") {
    info = "The Email and Password is null";
    //this.reset();
  } else if (email == "") {
    info = "The Email is null";
  } else if (pass == "") {
    info = "The password is null";
  } else if (email.length > 32 && pass.length > 32) {
    info = "The Email and Password length Greterthan 32";
  } else if (email.length > 32) {
    info = "The Email word length Greterthan 32";
  } else if (pass.length > 32) {
    info = "The Password length Greterthan 32";
  } else if (email.match(regex) || pass.match(regex)) {
    info = 'Some Unstracter Data "&,;" added';
  } else if (!email.match(rex)) {
    info = "Email have Unformated requir @";
  } else {
    window.location.replace(
      "/blog/page/log/log_pros.php?email=" + email + "&password=" + pass
    );
  }
  p.textContent = info;
  cont.appendChild(p);
}
