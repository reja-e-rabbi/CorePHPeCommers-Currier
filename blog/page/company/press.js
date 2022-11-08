console.log('press connected');
'use strict'

function previewimg(event) {
    var reader = new FileReader();
    var images = document.getElementById("preview-img");
    images.style.width = '100px';
    images.style.height = '90px';
    reader.onload = function() {
        if (reader.readyState == 2) {
            images.src = reader.result;
        }else if (reader.readyState == 0) {
            document.getElementById('output').innerHTML = 'chose again this file is empty';
        }
    }
    console.log(reader);
    var data = document.getElementById("upload");
    reader.readAsDataURL(event.target.files[0]);
    console.log(event.target.files[0]);
    /*for (let i = 0; i < reader.length; i++) {
        const element = array[i];
        reader.readAsDataURL(event.target.files[i]);
        console.log(event.target.files[i]);
        
    }*/
}
