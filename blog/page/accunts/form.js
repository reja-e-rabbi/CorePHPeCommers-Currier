var rx =/;|\"|\'/g;
document.querySelector('.submit').addEventListener("click", formsub);
function formsub(){
    var id = document.querySelector(".form").getAttribute("data-id");
    switch(id){
        case '1':
            var budget = document.getElementById("budget").value;
            var inbester = document.getElementById("inbester").value;
            var comments = document.getElementById("comments").value;
            var AcInfo = document.getElementById("AcInfo").value;
            //formon.formnull("#budget",".budget", "This value is Null");
            //formon.formnull("#inbester",".inbester", "This value is Null");
            
            if((budget != '')||(inbester != '')||(comments != '')||(AcInfo != '')){
                if((budget.length < 10)||(inbester.length < 32)||(comments.length < 128)){
                    console.log(budget + inbester + comments);
                    var obj ={
                        IDS: 1,
                        DBS: 'insert',
                        OPS:'unknow',
                        budget: budget,
                        inbester: inbester,
                        comments: comments,
                        AcInfo:AcInfo
                    }
                    var id = JSON.stringify(obj);
                    window.location.replace("/blog/page/accunts/action.php?id=" + encodeURIComponent(id));
                    
                }else{
                    formon.formletter(".info", "Thise value is ovel lode check miximum alphabite 9,32,128");
                }
            }else{
                formon.formletter(".info", "thise value is Null & don\'t use ':; etc alphabite ");
            }
    }
            
}