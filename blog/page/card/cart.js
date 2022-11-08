var LSV = JSON.parse(localStorage.getItem('localcards'));
var lntcard = LSV.length;
console.log(LSV);
loadE();
function loadE(){
    document.addEventListener('DOMContentLoaded', content());
    document.addEventListener('DOMContentLoaded', totalPrice());
}

function content(){
    var No = 1;
    var cartTbody = document.querySelector('#cart-content tbody');
    LSV.forEach(function(element){
    var trow = document.createElement('tr');
    trow.innerHTML = `
                <tr>
                    <td>${No++}</td>
                    <td>
                        <img src ="../../upload/${element.img}" width=50>
                    </td>
                    <td>${element.total}</td>
                    <td>${element.price * element.total}</td>
                    <td id= "clear-cart" class = "pointer remove" data-id = "${element.proID}">X</td>
                </tr>
                      `;
        cartTbody.appendChild(trow);
        
    }); 
}
function getItemFromStorage() {
    let LSvalue;
    if(LSV === null) {
        LSvalue = [];
    } else {
        LSvalue = JSON.parse(localStorage.getItem('localcards'));
    }
    return LSvalue;
}
var removeLSV = document.querySelector('#cart-content tbody');
removeLSV.addEventListener('click',LSclear);
function LSclear(e){
    let item, itemId;
     if(e.target.classList.contains('remove')) {
         e.target.parentElement.remove();
         item = e.target.getAttribute('data-id');
     }
    removeLSI(item);
    document.querySelector('#cart-content tfoot tr').parentElement.remove();
    totalPrice();
}

function removeLSI(id){
    let LSsymple = getItemFromStorage();
    console.log('remove sl');
    LSsymple.forEach(function(value, index){
       if(value.proID === id){
           LSsymple.splice(index,1);
           console.log('yes match');
       }
        localStorage.setItem('localcards', JSON.stringify(LSsymple));
    });
}
function totalPrice(){
    var initialValue = 0;
    var total = getItemFromStorage();
    var sum = total.reduce(function(accumulator, currentValue) {
       return accumulator + currentValue.price * currentValue.total; 
    }, initialValue);
    var creatTfoot = document.querySelector('#cart-content');
    var tr = document.createElement('tfoot');
    var correr = total.length * 2 + 18 + 10* 1;
    tr.innerHTML =`<tr>
                       <td colspan="5">Total Product Price : ${sum}</td>
                  </tr>
                  <tr>
                       <td colspan="5">Correr Price : ${correr}</td>
                  </tr>
                   <tr>
                       <td colspan="5">Total Price : ${sum+correr}</td>
                  </tr>
                   `;
    creatTfoot.appendChild(tr);
    var pricing = {
            ProductPrice : sum,
            Corear : correr,
            TotalPrice: sum+correr,
            comget: Math.round((sum/100)*95),
            protositget: Math.round((sum/100)*5),
            svcmanget: Math.round((correr/100)*80),
            cortositget: Math.round((correr/100)*20)
        }
        localStorage.setItem('pricing', JSON.stringify(pricing));
    //oncookie.cookies("TotalPrice", sum);
}


var SubmitForm = document.querySelector('#check');
SubmitForm.addEventListener('click', collectionForm);
function collectionForm(e){
  if(e.target.classList.contains('out')){
        var CustomerInfo = {
        Name : document.getElementById('name').value,
        Phone : document.getElementById('phone').value,
        Addres : document.getElementById('zone').value
    }
    //document.getElementById('info').reset();
    let CI = [];
    if(localStorage.getItem('Customer') == null){
        CI = [];
    }else{
        CI = JSON.parse(localStorage.getItem('Customer'));
    }
    localStorage.setItem('Customer', JSON.stringify(CustomerInfo));
    if((CustomerInfo.Name == '')||(CustomerInfo.Phone == '')||(CustomerInfo.Addres == '')){
        formon.formletter('.letter','check first your Information');
        alert('check your information form');
    }else if(CustomerInfo.Phone.length < 11){
        formon.formletter('.letter','check first your phone number Information');
    }else if(CustomerInfo.Phone.length > 16){
        formon.formletter('.letter','check first your phone number Information');
    }else if(!isNaN(CustomerInfo.Phone) == false){
        console.log('connection information');
        formon.formletter('.letter','check first your phone number Information set perfect value');
    }else if((CustomerInfo.Addres.length > 300)||(CustomerInfo.Name.length > 15)){
        formon.formletter('.letter','check first, address line maximum number of cherecters 300 and Name 15 charecter');
    }else{
        var pay = ` <div class="pay-option" id = "check'">
                        <!--<a class ="link-a pyament" data-id = "Mobile">Mobile payment</a>-->
                        <a class = "link-a pyament" data-id = "cashON">Cash on delivery</a>
                    </div>`;
        document.querySelector('.from').innerHTML = pay;
    }
  }else if(e.target.classList.contains('pyament')){
      console.log('pyament');
      var dataid = e.target.getAttribute('data-id');
      switch(dataid){
          case 'Mobile':
              alert("this future is now blocked");
              return;
          case 'cashON':
              console.log('cash on');
              if(!localStorage.getItem('localcards') == ''){
                  var customer = localStorage.getItem('Customer');
                  var pci = localStorage.getItem('pricing');
                  var obj = {
                      IDS: 'cards',
                      DBS: 'select',
                      OPS: 'check',
                      SOPS: 'customer',
                      cus: customer,
                      pci: pci
                  }
                  var arr = window.btoa(JSON.stringify(obj));
                  if(LSV.length > 30){
                      alert('Maximu product add 30 pice and each of the product add maximum 9900');
                  }else if(LSV.length = 0 ){
                      alert('ther have no product selectected frist product check');
                  }else{
                      if(customer == ''){
                          alert('enter your information');
                      }else{
                           oncookie.setCookie('card',localStorage.getItem('localcards'),1);
                           oncookie.setCookie('crdlnt',lntcard, 1);
                           oncookie.setCookie('pricing',localStorage.getItem('pricing'),1);
                           console.log(localStorage.getItem('pricing'));
                           window.location.replace('/blog/page/card/action.php?id='+encodeURI(arr));
                      }
                  }
              }
              return;
          default :
              alert('check your id');
              return;
      }
  }
}

