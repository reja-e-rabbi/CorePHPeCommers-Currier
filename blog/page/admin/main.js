document.querySelector(".about").addEventListener("click", aberton);
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
}
