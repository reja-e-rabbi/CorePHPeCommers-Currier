class formon {
  static formnull(qs, ps, st) {
    var sup = document.querySelector(qs).value;
    if (sup == null) {
      document.querySelector(ps).innerHTML = st;
    }
  }
  static formlength(qs, ln, ps, st) {
    var sup = document.querySelector(qs).value.length;
    if (sup > ln) {
      document.querySelector(ps).innerHTML = st;
    }
  }
  static formrejxL(qs, rx, ps, st) {
    var sup = document.querySelector(qs).value;
    if (!sup.match(rx)) {
      document.querySelector(ps).innerHTML = st;
    }
  }
  static formreset(qs) {
    document.querySelector(qs).reset();
  }
  static formletter(qs, st) {
    document.querySelector(qs).innerHTML = st;
  }
}
class paging {
    static pgnTable(e, location, tbody){
    e.preventDefault();
    if(e.target.classList.contains("pgn")){
        var num = e.target.parentElement.getAttribute("data-id");
        var last = document.querySelector(".tbody tr").childNodes[1].getAttribute("data-id");
        var obj = {
            IDS : 1,
            NUM : num,
            LASTv : last
        }
        var arr = JSON.stringify(obj);
        requeston("GET",location,tbody); 
    }
  }
  static pgnTablePro(e, location, tbody){
    e.preventDefault();
    if(e.target.classList.contains("pgn")){
        var num = e.target.parentElement.getAttribute("data-id");
        var last = document.querySelector("tbody tr").childNodes[1].getAttribute("data-id");
        var obj = {
            NUM : num,
            LASTv : last
        }
        var arr = JSON.stringify(obj);
        requeston("GET",location+"&obj="+ encodeURI(arr),tbody);
        console.log(arr);
    }
  }
  static pgnCard(e, location, tbody){
    e.preventDefault();
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
        //requeston("GET",location+"&obj="+ encodeURI(arr),tbody);
        console.log(arr);
        window.scrollTo({
         top: 100,
         left: 100,
         behavior: 'smooth'
        });
  }

}
class searcher {
    static searchtable(e,location,tbody, obj){
    var obj = obj
        var arr = JSON.stringify(obj);
        requeston("GET",location+"&obj="+ encodeURI(arr),tbody);
    console.log(arr);
}
}
function requeston(method, linkon, inner) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.querySelector(inner).innerHTML = this.responseText;
    }
  };
  xmlhttp.open(method, linkon, true);
  xmlhttp.send();
}
function requestPost(method, linkon,inner, arr) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.querySelector(inner).innerHTML = this.responseText;
      console.log(this.responseText);
    }
  };
  xmlhttp.open(method, linkon, true);
  xmlhttp.send("id="+arr);
}
class oncookie {
  static cookies (n,v){
      document.cookie = n + "=" + v;
  }
  static setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  static getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
}
class urlroll {
  static parameter(para){
    let parameterName = new URLSearchParams(window.location.search);
    return parameter.get(para);
  }
}
