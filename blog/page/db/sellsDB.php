<?php
switch ($DBS) {
    case 'update':
        # code...
        $con = mysqli_connect("127.0.0.1","root","Root_1122","sells");
           
        break;
    
    case 'select':
        # code...
        $con = mysqli_connect("127.0.0.1","root","Root_1122","sells");
           
        break;
    case 'insert':
        # code...
        $con = mysqli_connect("127.0.0.1","root","Root_1122","sells");
           
        break;
    case 'delete':
        # code...
        $con = mysqli_connect("127.0.0.1","root","Root_1122","sells");
           
        break;
    default:
        # code...
        echo "this connection is not spacefy";
        break;
}
if (mysqli_connect_errno($con)) {
    echo "databases connection error";
  }
?>