console.log('view connected');
new Drift(document.querySelector('.drift-demo-trigger'), {
    paneContainer: document.querySelector('.pan'),
    inlinePane: 900,
    inlineOffsetY: -85,
    containInline: true,
    hoverBoundingBox: true
});
let crt = [];
 if(localStorage.getItem('localcards') == null){
    crt = [];
 }else{
    crt = JSON.parse(localStorage.getItem('localcards'));
     console.log(crt.length);
     document.querySelector('.lnt').innerHTML = crt.length;
 }
document.querySelector(".mainapp").addEventListener("click", mainselector);
function mainselector(e) {
    e.stopPropagation()
  if(e.target.classList.contains("add-to-cart")){
      var lscrt = e.target.getAttribute('data-id');
      var ttpro = document.querySelector('.ttpro').value;
      var size = document.getElementById('size').value;
      if (Number.isInteger(ttpro) == true) {
        console.log("number is integer");
      } else if (ttpro < 1) {
        console.log("tt pro is less than 1");
        ttpro = 1;
      }else if(!Number.isInteger(ttpro) == false){
        ttpro = 1;
      }
      var lccrt = JSON.parse(lscrt);
      lccrt.total = ttpro;
      lccrt.recommand = size;
      var valueus = lccrt;
      e.target.remove();
      let cards =[];
      if(localStorage.getItem('localcards') == null){
        cards = [];
      } else {
        cards = JSON.parse(localStorage.getItem('localcards'));
      }
      cards.push(valueus);
      document.querySelector('.lnt').innerHTML = cards.length;
      localStorage.setItem('localcards', JSON.stringify(cards));
  }
  else if (e.target.classList.contains("company-main")) {
    var obj = {
      IDS: 1,
      DBS: 'select',
      OPS: 'unknow',
      EOPS: 'activity',
      SOPS: 'double',
      STT: 'active' 
    }
    var arr = JSON.stringify(obj);
    console.log(arr);
    window.location.replace("/blog/page/company/index.php?id="+ encodeURI(arr));
  }
  else if(e.target.classList.contains("go-to-order")){
    var lscrt = e.target.getAttribute('data-id');
    var ttpro = document.querySelector('.ttpro').value;
    var size = document.getElementById('size').value;
    if (Number.isInteger(ttpro) == true) {
      console.log("number is integer");
    } else if (ttpro < 1) {
      console.log("tt pro is less than 1");
      ttpro = 1;
    }else if(!Number.isInteger(ttpro) == false){
      ttpro = 1;
    }
    var lccrt = JSON.parse(lscrt);
    lccrt.total = ttpro;
    lccrt.recommand = size;
    var valueus = lccrt;
    e.target.remove();
    let cards =[];
    if(localStorage.getItem('localcards') == null){
      cards = [];
    } else {
      cards = JSON.parse(localStorage.getItem('localcards'));
    }
    cards.push(valueus);
    document.querySelector('.lnt').innerHTML = cards.length;
    localStorage.setItem('localcards', JSON.stringify(cards));
    window.location.replace("/blog/page/card/cart.php");
}
    else if(e.target.classList.contains("focus")){
      var img = e.target.getAttribute('src');
      document.querySelector(".wrapper img").setAttribute('src',img);
      
  }
    else if(e.target.classList.contains("wish-com")){
      var dataID = e.target.getAttribute('data-id')
      switch (dataID){
          case 'wishlist':
              console.log('data-id wish list');
              var dataCom = e.target.getAttribute('data-vl');
              var valueus = dataCom;
              let cards =[];
              if(localStorage.getItem('wishlist') == null){
                 cards = [];
               } else {
                 cards = JSON.parse(localStorage.getItem('wishlist'));
               }
               cards.push(valueus);
               localStorage.setItem('wishlist', JSON.stringify(cards));
               console.log(dataCom);
              return;
          case 'compair':
              console.log('compair data id');
              var dataCom = e.target.getAttribute('data-vl');
              var valueus = dataCom;
              let cardsvlu =[];
              if(localStorage.getItem('compair') == null){
                 cardsvlu = [];
               } else {
                 cardsvlu = JSON.parse(localStorage.getItem('compair'));
               }
               cardsvlu.push(valueus);
               localStorage.setItem('compair', JSON.stringify(cardsvlu));
               console.log(dataCom);
              return;
          default:
              console.log("define default");
              return;
      }
  } 
    else if (e.target.classList.contains("view-cart")){
        window.location.replace("/blog/page/card/cart.php");
    }
    else if (e.target.classList.contains("pgn")){
        var reco = e.target.getAttribute('data-id');
        console.log(reco);
        switch (reco){
            case 'recommand':
                console.log('pgn card recomand');
                 var num = e.target.getAttribute("data-id");
                 var last = document.getElementById('data-next').getAttribute("data-next");
                 var obj = {
                    IDS: 'public',
                    DBS: 'select',
                    OPS: 'active',
                    SOPS: 'NEXT',
                    NUM : num,
                    LASTv : last
                 }
                 var arr = JSON.stringify(obj);
                 var bta =window.btoa(arr);
                 requeston("GET","main.php?id="+encodeURI(bta),'.mainapp');
                 window.scrollTo({
                 top: 100,
                 left: 100,
                 behavior: 'smooth'
                 });
                break;
            case 'NEXT':
                console.log('local data next');
                var num = e.target.getAttribute("data-id");
                 var last = document.getElementById('data-next').getAttribute("data-next");
                 var obj = {
                    IDS: 'public',
                    DBS: 'select',
                    OPS: 'active',
                    SOPS: 'NEXT',
                    NUM : num,
                    LASTv : last
                 }
                 var arr = JSON.stringify(obj);
                 var bta =window.btoa(arr);
                 requeston("GET","main.php?id="+encodeURI(bta),'.mainapp');
                 window.scrollTo({
                 top: 100,
                 left: 100,
                 behavior: 'smooth'
                 });
                break;
            case 'searchPG':
                console.log('local data next');
                var num = e.target.getAttribute("data-id");
                 var last = document.getElementById('data-next').getAttribute("data-next");
                 var obj = {
                    IDS: 'public',
                    DBS: 'select',
                    OPS: 'active',
                    SOPS: 'NEXT',
                    NUM : num,
                    LASTv : last
                 }
                 var arr = JSON.stringify(obj);
                 var bta =window.btoa(arr);
                 requeston("GET","main.php?id="+encodeURI(bta),'.mainapp');
                 window.scrollTo({
                 top: 100,
                 left: 100,
                 behavior: 'smooth'
                 });
                break;
            default:
                console.log('no data have');
                break;
        }
        //paging.pgnCard("main.php?id="+encodeURI(bta),'.mainapp');
    }
}