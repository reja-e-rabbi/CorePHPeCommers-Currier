console.log('sidnave.js');
document.querySelector(".sninfo").addEventListener("click",checking);
function checking(e) {
    if(e.target.classList.contains('about-pro')){
        console.log('click');
        var obj ={
            IDS: '1',
            DBS:'select',
            OPS: 'unknow',
            EOPS: 'activity',
            SOPS: 'double',
            STT: e.target.getAttribute('data-id')
        }
        var arr = JSON.stringify(obj);
        requeston("GET","../product/product.php?id="+encodeURI(arr),".app");
    }
    else if(e.target.classList.contains('sl-pro')){
        var IDS = e.target.getAttribute('data-id');
        switch(IDS){
            case 'pending':
                console.log('pending');
                var obj ={
                    IDS : e.target.getAttribute('data-id'),
                    DBS : 'select',
                    OPS : e.target.getAttribute('data-type'),
                    SOPS: 'unknow',
                    TOPS: 'unknow',
                    LOPS: 'unknow'
                }
                var arr = JSON.stringify(obj);
                requeston('GET','/blog/page/sells/main.php?id='+encodeURI(arr),'.app');
                //window.history.pushState({},obj.OPS,'/blog/page/sells/main.php?id='+encodeURI(arr));
                return;
            case 'all':
                var obj ={
                    IDS : e.target.getAttribute('data-id'),
                    DBS : 'select',
                    OPS : e.target.getAttribute('data-type'),
                    SOPS: 'unknow',
                    TOPS: 'unknow',
                    LOPS: 'unknow'
                }
                var arr = JSON.stringify(obj);
                requeston('GET','/blog/page/sells/main.php?id='+encodeURI(arr),'.app');
                //window.history.pushState({},obj.OPS,'/blog/page/sells/main.php?id='+encodeURI(arr));
                return;
            default:
                console.log('no id have');
                return;
        }
    }
    else if(e.target.classList.contains('ord')){
        var obj ={
            IDS: 'ord',
            DBS: 'select',
            OPS: e.target.getAttribute('data-id'),
            EOPS: 'public'
        }
        var arr = JSON.stringify(obj);
        requeston('GET','main.php?id='+encodeURI(arr),'.app');
    }
    else if(e.target.classList.contains('tog')){
        console.log('tog value');
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
document.querySelector('.app').addEventListener('click', appfunction);
function appfunction(e) {
    if (e.target.classList.contains("paging")) {
        var obj ={
            IDS: '1',
            DBS:'select',
            OPS: 'unknow',
            EOPS: 'activity',
            SOPS: 'double',
            STT: e.target.getAttribute('data-id')
        }
        var arr = JSON.stringify(obj);
        //console.log(arr);
        paging.pgnTablePro(e,"../product/product.php?id="+encodeURI(arr),".app");
    }
    else if (e.target.classList.contains("action")) {
        var opt = e.target.getAttribute('value');
        var obj ={
            IDS: 'action',
            DBS:'select',
            OPS: 'unknow',
            EOPS: 'activity',
            SOPS: 'double',
            STT: opt,
            DID: e.target.getAttribute("data-id")
        }
        var arr = JSON.stringify(obj);
        console.log(arr);
        if(!opt == ''){
                requeston("GET","../product/product.php?id="+encodeURI(arr),".stt1");
                e.target.parentElement.parentElement.innerHTML = opt;
        }
    }
    else if (e.target.classList.contains("submit1")) {
        var opt = e.target.parentElement.firstChild.value;
        console.log(opt);
        if (!opt == '') {
            var obj ={
                IDS: 'action',
                DBS:'select',
                OPS: 'unknow',
                EOPS: 'activity',
                SOPS: 'double',
                STT: opt,
                DID: document.querySelector("#action").getAttribute("data-id")
            }
            var arr = JSON.stringify(obj);
            if(!opt == ''){
                requeston("GET","../product/product.php?id="+encodeURI(arr),".stt1");
                e.target.parentElement.parentElement.innerHTML = opt;
            }
        }
    }
    e.stopPropagation();
}
const Ontable = document.querySelector('.app');
Ontable.addEventListener('dblclick', newTD);
function newTD(e){
   if(e.target.classList.contains('process')){
       console.log('target dbclick');
       var did = e.target.getAttribute('data-id');
       switch(did){
           case 'processing':
               
                var obj = {
                    IDS : 'sells',
                    DBS : 'select',
                    OPS : e.target.getAttribute('data-id'),
                    SOPS: e.target.getAttribute('data-SlsID'),
                    EOPS: e.target.getAttribute('data-stt'),
                    TOPS: 'processing'.toLowerCase()
                }
                var arr = JSON.stringify(obj);
                console.log(arr);
                requeston('GET', '/blog/page/sells/action.php?id='+encodeURI(arr), '.btn-conf');
                e.target.parentElement.style.backgroundColor = 'wheat';
                return;
           default:
               console.log('this id is Null');
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
