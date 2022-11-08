/*document.querySelector(".about").addEventListener("click", aberton);
document.querySelector(".main").addEventListener("click", main);
function aberton() {
  requeston("POST", "../about/about.php", ".flex-col");
}
function main() {
  requeston("POST", "main.php", ".flex-col");
}
document.querySelector(".budget").addEventListener("click", budget);
function budget() {
  requeston("POST", "../budget/budget.php", ".flex-col");
} */
function toggle() {
  var div = document.getElementById("drop");
  if (div.style.display == "none") {
    div.style.display = "block";
    return;
  } else {
    div.style.display = "none";
  }
}
