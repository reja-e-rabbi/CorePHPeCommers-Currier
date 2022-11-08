<?php//var_dump($getImgSize);
                        echo $getImgSize;
            /*     foreach ($flsz as $value) {
                   /* echo 'Name :'.$Name. 'Quantity :'.$Quantity.'FoodDetels :'.$FoodDetels;
                    echo 'Category :'.$Category.'Sub Category :'.$SubCategory.'Price :'.$Price;
                    $arrAll = $_SESSION["all"];
                    echo $arrAll; */
                    //$quiry = "insert into product(img,proname,quantity,price, info,category,subcategory,uploader,email, location,contact,totalview, shopName,productID,statuses,country, State,SubState,P_state,Activity) values(?,?,?,?, ?,?,?,?, ?,?,?,?, ?,?,?,? ,?,?,?,?)";
                    //$stmt = $con->prepare($quiry);
                    //$stmt->bind_param('ssis ssss',$img,$ProName,$Quantity,$FoodDetels,$Category,$SubCategory,$_SESSION["name"],$_SESSION["email"]);
                   /* $fl = $file["name"][$i];
                    $imgarr = array($i + 1 => $fl);
                    $img = json_encode($imgarr);
                    $fileTmpDir = $file['tmp_name'][$i];
                    $pathinfo = pathinfo($fl,PATHINFO_EXTENSION);
                    strtolower($pathinfo);
                    $fileNewName = date('Y-m-d-His'). '.'.$i.$fileName[$i].$fileActualExt[$i];
                    $path = 'C:\xampp\htdocs\fiopl\blog\upload'.$_SESSION['URL'].'/'.$fileNewName; //windows
                        $max_width = 48;
                        $max_higth = 48;
                        $getImgSize = @getimagesize($fileTmpDir);
                        var_dump($getImgSize); */
                //    if (($pathinfo == 'png')||($pathinfo == 'jpg')||($pathinfo == 'jpeg')||($pathinfo == 'svg')) {
                        /*$quiry = "insert into images (img,id,coid) values(?,?,?)";
                        $stmt = $con->prepare($quiry);
                        $stmt->bind_param('sss',$fileNewName,$bytes,$_SESSION["ID"]);
                        $stmt->execute(); */
                        //$path = '/var/www/userd.com/blog/upload/'.$_SESSION['URL'].'/'.$fileNewName; //linux
                //        $path = 'C:\xampp\htdocs\fiopl\blog\upload'.$_SESSION['URL'].'/'.$fileNewName; //windows
                        //move_uploaded_file($fileTmpDir, $path); */
                        /*$path = 'C:\xampp\htdocs\fiopl\blog\upload'.$_SESSION['URL'].'/'.$fileNewName; //windows
                        $max_width = 48;
                        $max_higth = 48;
                        $getImgSize = @getimagesize($fileTmpDir);
                        var_dump($getImgSize);
                        $width_ratio = ($getImgSize[0]/$max_width);
                        $height_ratio = ($getImgSize[1]/$max_higth);
                        if($width_ratio >=$height_ratio){
                            $ratio = $width_ratio; 
                        } else {
                            $ratio = $height_ratio;
                        }
                        $new_higth = 250;
                        $nwe_width = 225;
                        $thumb = imagecreatetruecolor($nwe_width,$new_higth);
                        $scr_img = imagecreatefromjpg($fileTmpDir[$i]);
                        imagecopyresampled($thumb,$scr_img,0,0,0,0,$nwe_width,$new_higth,$getImgSize[0],$getImgSize[1]);
                        imagejpg($thumb,null,90);
                        imagedestroy($scr_img);
                        imagedestroy($thumb);
                        move_uploaded_file($fileTmpDir[$i], $path);
                       /* $imageType = $getImgSize[2];
                        $imgcollet = imagecreatefromjpeg($fl);
                        $targetWidth =250;
                        $targetHeight =225;
                        $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
                        imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
                        imagejpeg($targetLayer,$path,$fileNewName);
                        $path = 'C:\xampp\htdocs\fiopl\blog\upload'.$_SESSION['URL'].'/'.$fileNewName;
                        
                        move_uploaded_file($fileTmpDir, $path); */
                        
            //        } else {
              //          echo 'plese select jpg,png,jpeg, svg,webp images';
                //    }
                //} 


?>

<div class="form-group">
              <label for="upload">Upload image :</label>
              <input required = "required" type="file" onchange="previewimg(event)" name="upload-img[]" id="image upload" multiple= "multiple">
              <p>Each of the image size is 100KB</p>
              <img src="" id="preview" alt="">
              <p id = "output"></p>
            </div>

            /* echo ' <div class="container">
          	<form action="action.php" method="post" enctype="multipart/form-data">
		          <input type="file" name="image" /> 
		          <input type="submit" name="submit" value="Submit" />
	          </form>
          </div> ';  */    