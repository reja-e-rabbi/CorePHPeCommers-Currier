console.log("location app.js connected");
document.querySelector(".location").addEventListener("click",locationtrack);
function locationtrack(e){
    e.preventDefault();
    if(e.target.classList.contains("search01")){
        var loc = document.getElementById("loc").value;
        var opt = document.getElementById("opt").value;
        if((!loc == '')&&(!opt == '')){
            console.log("location track");
            var obj = {
                IDS: 'detect',
                DBS: 'select',
                OPS: 'public',
                EOPS: loc,
                SOPS: opt
            }
            var arr = JSON.stringify(obj);
            console.log(arr);
             regex = /;|\"|\'/g;
             rex = /@/gi;
            if(!loc.match(regex)){
                window.location.replace('main.php?id='+encodeURI(arr));
                console.log('check it');
            }else{
                formon.formletter('.set1','there have unexpected string match');
            }
        }
        else{
            console.log("not track");
        }
    }
}