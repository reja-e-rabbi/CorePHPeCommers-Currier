console.log('form added');
/*var source_img = document.getElementById("source_img"),
    target_img = document.getElementById("target_img");

//(NOTE: see the examples/js/demo.js file to understand how this object could be a local image 
//from your filesystem using the File API)

//An Integer from 0 to 100
var quality =  80,
// output file format (jpg || png || webp)
output_format = 'jpg'; 
//This function returns an Image Object 
var target_img;
target_img.src = jic.compress(source_img,quality,output_format).src;*/

var output_format = null;
	var file_name = null;
	function readFile(evt) {
		var file = evt.target.files[0];
		var reader = new FileReader();
	    reader.onload = function(event) {
			var i = document.getElementById("source_image");
			console.log(i);
	            i.src = event.target.result;
	            i.onload = function(){
	                
	                console.log("Image loaded");
	            }
	    };
		output_format = file.name.split(".").pop();
		file_name = file.name;
	    console.log("Filename:" + file.name);
	    console.log("Fileformat:" + output_format);
	    console.log("Filesize:" + (parseInt(file.size) / 1024) + " Kb");
	    console.log("Type:" + file.type);
	    reader.readAsDataURL(file);
		$("#compress").show();
	    return false;
	}
 // compress image
 document.querySelector('#compress').addEventListener('click',compressON);
 function compressON() {
    var source_image = document.getElementById("source_image");
    if (source_image.src == "") {
        alert("You must load an image first!");
        return false;
    }

    var quality = 30;
       
    console.log("process start...");
    console.log("process start compress ...");
    compressed_image.src = jic.compress(source_image,quality,output_format).src;
 }
 /*	$( "#compress" ).click(function() {
        var source_image = document.getElementById("source_image");
        if (source_image.src == "") {
            alert("You must load an image first!");
            return false;
        }

        var quality = 30;
       	
        console.log("process start...");
        console.log("process start compress ...");
	    compressed_image.src = jic.compress(source_image,quality,output_format).src;
		$("#upload").show();
    	
	}); */
	// upload imange
	$( "#upload" ).click(function() {
        var compressed_image = document.getElementById("compressed_image");
        if (compressed_image.src == "") {
            alert("You must compress image first!");
            return false;
        }

	    var successCallback= function(response){
            console.log("image uploaded successfully! :)");
            console.log(response);       
        }

        var errorCallback= function(response){
            console.log("image Filed to upload! :)");
            console.log(response); 
        }
    	
    	console.log("process start upload ...");
    	jic.upload(compressed_image, "upload.php", "file", file_name,successCallback,errorCallback);
    	
    });

document.getElementById("fileinput").addEventListener("change", readFile, false);

