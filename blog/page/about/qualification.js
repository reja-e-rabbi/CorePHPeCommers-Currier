document.querySelector(".submit").addEventListener("click", checkval);
function checkval() {
  formon.formnull("#qlf", ".qlf", "this value is null");
  formon.formnull("#date", ".date", "this value is null");
  formon.formnull("#about", ".about", "this value is null");
  formon.formlength("#qlf", 128, ".qlf", "thise valu langth upto 128");
  formon.formlength("#date", 128, ".date", "thise valu langth upto 128");
  formon.formlength("#about", 128, ".about", "thise valu langth upto 128");
}

document.querySelector(".reset").addEventListener("click", reseton);
function reseton() {
  formon.formreset("#myForm");
}
