regex = /;|\"|\'/g;
rex = /@/gi;
var dataID = document.querySelector(".form").getAttribute("data-id");
document.querySelector(".submit").addEventListener("click", submit);

function submit() {
  formon.formnull("#f-name", ".f-name", "Frist name is Null");
  formon.formnull("#l-name", ".l-name", "Last name is Null");
  formon.formnull("#n-name", ".n-name", "Nick name is Null");
  formon.formnull("#email", ".email", "the email is null");
  formon.formnull("#phone", ".phone", "write your phone Number");
  formon.formnull("#pass", ".pass", "write your pass word");
  formon.formnull("#r-pass", ".r-pass", "retype your password");
  formon.formlength(
    "#f-name",
    32,
    " .f-name ",
    "Minimum length 4 alphabit maximum 32"
  );
  formon.formlength(
    "#l-name",
    32,
    ".l-name",
    "Minimum length 4 alphabit maximum 32"
  );
  formon.formlength(
    "#n-name",
    32,
    ".m-name",
    "Minimum length 4 alphabit maximum 32"
  );
  formon.formlength(
    "#email",
    64,
    ".email",
    "Minimum length 8 alphabit maximum 64"
  );
  formon.formlength(
    "#phone",
    15,
    ".phone",
    "Minimum length 11 alphabit maximum 15"
  );
  formon.formlength(
    "#pass",
    32,
    ".pass",
    "Minimum length 4 alphabit maximum 32"
  );
  formon.formlength(
    "#r-pass",
    32,
    ".r-pass",
    "Minimum length 4 alphabit maximum 32"
  );
  formon.formrejxL("#email", rex, ".email", "requir email formate @ ");
  var f_name = document.querySelector("#f-name").value,
    l_name = document.querySelector("#l-name").value,
    n_name = document.querySelector("#n-name").value,
    email = document.querySelector("#email").value,
    phone = document.querySelector("#phone").value,
    pass = document.querySelector("#pass").value,
    r_pass = document.querySelector("#r-pass").value;
  if (
    f_name == null ||
    f_name.length > 32 ||
    f_name.length < 3 ||
    f_name.match(regex) ||
    l_name == null ||
    l_name.length > 32 ||
    l_name.length < 3 ||
    l_name.match(regex) ||
    n_name == null ||
    n_name.length > 32 ||
    n_name.length < 3 ||
    n_name.match(regex) ||
    email == null ||
    email.length > 32 ||
    email.length < 3 ||
    email.match(regex) ||
    phone == null ||
    phone.length > 32 ||
    phone.length < 3 ||
    phone.match(regex) ||
    pass == null ||
    pass.length > 32 ||
    pass.length < 3 ||
    pass.match(regex) ||
    r_pass == null ||
    r_pass.length > 32 ||
    r_pass.length < 3 ||
    r_pass.match(regex)
  ) {
    formon.formletter(
      ".errorON",
      "minimum alphabit requir 3 and check semicolon colon, brecket etc that is unstracter formate "
    );
  } else {
    if (pass != r_pass) {
      console.log("Pass word and recheck pass not metch");
      formon.formletter(
        ".errorON",
        "Password and retype password do not metch"
      );
    } else {
      if (email.match(rex)) {
        var obj = {
          f_name: f_name,
          l_name: l_name,
          n_name: n_name,
          email: email,
          phone: phone,
          pass: pass,
          r_pass: r_pass
        };
        var ify = JSON.stringify(obj);
        if (dataID == 1) {
          requeston(
            "GET",
            "action.php?val=" + encodeURI(ify) + "&sl=1",
            ".form"
          );
        }
        if (dataID == 3) {
          requeston(
            "GET",
            "action.php?val=" + encodeURI(ify) + "&sl=3",
            ".form"
          );
        }
        if (dataID == 4) {
          requeston(
            "GET",
            "action.php?val=" + encodeURI(ify) + "&sl=4",
            ".form"
          );
        }
      }
    }
  }
}
