document.querySelector('.sidnav-spm').addEventListener('click',sidnavspm);
function sidnavspm(e){
    if(e.target.classList.contains('ord')){
        var obj ={
            IDS: 'all',
            DBS: 'select',
            OPS: e.target.getAttribute('data-id'),
            EOPS: 'public'
        }
        var arr = JSON.stringify(obj);
        console.log(arr);
        requeston('GET','main.php?id='+encodeURI(arr),'.app');
    }
    if(wdt < 700){
        console.log('tog value');
       var div = document.querySelector('.aside');
       if (div.style.display == "none") {
           div.style.display = "block";
           return;
       } else {
           div.style.display = "none";
       }
   }
}

var wdt = window.screen.width;
if(wdt < 700){
    var scro = document.querySelector('.aside').style.display = 'none';
}
document.querySelector('header').addEventListener("click",toggle);
function toggle(e) {
    if(e.target.classList.contains('togle')){
        if(wdt < 700){
            var div = document.querySelector('.aside');
            if (div.style.display == "none") {
              div.style.display = "block";
              return;
            } else {
              div.style.display = "none";
            }
        }
    }
}
console.log(wdt);