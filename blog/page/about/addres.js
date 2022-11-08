document.querySelector(".submit").addEventListener("click", checkval);
function checkval() {
  formon.formnull("#address", ".address", "this value is null");
  formon.formlength("#address", 128, ".address", "thise valu langth upto 128");
}

document.querySelector(".reset").addEventListener("click", reseton);
function reseton() {
  formon.formreset("#myForm");
}
