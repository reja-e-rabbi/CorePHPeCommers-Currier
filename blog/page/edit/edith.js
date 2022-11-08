
document.querySelector('#next').addEventListener('click', nextsave);
function nextsave(e) {
    console.log('save');
    var ValuesNode =    document.querySelector('.codex-editor__redactor');
    var htmls =window.btoa(ValuesNode.outerHTML);
    console.log(htmls);
    var obj = {
        IDS: 'one',
        DBS: 'insert',
        OPS: 'images',
        SOPS: 'multiple',
        EOPS: 'product',
        Detels: htmls
    }
    var arr = JSON.stringify(obj);
    var store = localStorage.getItem('productInfo');
    if (!store == '') {
        //requestPost('POST','action.php', '.act',arr);
        var form = document.querySelector('.form');
        form.outerHTML = `<form action="action.php" method="post">
        <div class = "form-group">
          <label for="product-name">HTML Text :</label>
          <textarea name="id[]" id="#" placeholder="write about this Food" cols="40" rows="10">${htmls}</textarea>
        </div>
        <div class="form-group">
          <p>Don't edit this html text</p>
          <input class="ce-example__button" type="submit" value="Next">
        </div>
       </form>`;
      e.target.parentElement.remove();
    } else{
        console.log('this store is null');
    }
}