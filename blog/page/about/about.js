
document.querySelector(".submit").addEventListener("click",checkval);
function checkval(){
    formon.formnull("#owner", ".owner", "thise valu is null");
    formon.formnull("#email", ".email", "this value is null");
    formon.formnull("#phone",".phone","this value is null");
    formon.formnull("#summary", ".summary", "this value is null");
    formon.formlength("#owner", 32,".owner", "thise valu langth upto 32");
    formon.formlength("#email", 32,".email", "thise valu langth upto 32");
    formon.formlength("#phone",15,".phone","thise valu langth upto 15");
    formon.formlength("#summary", 128,".summary", "thise valu langth upto 128");
    
}