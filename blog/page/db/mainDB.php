<?php
switch ($DBS) {
    case 'update':
        $con = mysqli_connect("127.0.0.1","root","Root_1122","main");
        break;
    
    case 'select':
        $con = mysqli_connect("127.0.0.1","root","Root_1122","main");
        break;
    case 'insert':
        $con = mysqli_connect("127.0.0.1","root","Root_1122","main");
        break;
    case 'delete':
        $con = mysqli_connect("127.0.0.1","root","Root_1122","main");
        break;
    default:
        echo "this connection is not spacefy";
        break;
}
if (mysqli_connect_errno($con)) {
    echo "databases connection error";
  }
?>