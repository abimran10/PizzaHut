<?php

$conn = mysqli_connect("localhost","root","","phase2pizzahut");

$id = 8;
$updatebtn = false;

if(isset($_POST['submit']) && isset($_FILES['file'])){

 $iname = $_FILES['file']['name'];
$target_dir = "uploads/";

$pname = $_POST['pname'];
$pprice = $_POST['pprice'];
$pcode = $_POST['pcode'];
$pdiscount = $_POST['pdiscount'];
$psizes = $_POST['psizes'];
$pdetails = $_POST['pdetails'];
$pinstock = 0;

if(empty($_POST['instock'])){
    $pinstock = 0;
}
else{
    $pinstock = 1;
}


$target_file = $target_dir . basename($_FILES["file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$extensions_arr = array("jpg","jpeg","png","gif");
if( in_array($imageFileType,$extensions_arr) ){

   $pquery = "insert into productstore(iname,productName,productPrice,productCode,productInStock,productDiscount,productSizes,productDetails)
    values('".$iname."','$pname','$pprice','$pcode','$pinstock','$pdiscount','$psizes','$pdetails');";
   
   mysqli_query($conn,$pquery);

   move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$iname);

}

header("Location:ProductStore.php");

}


if(isset($_GET['del'])){

    $deleteid = $_GET['del'];

    $deletequery = "DELETE FROM productstore WHERE productId=$deleteid;";
    mysqli_query($conn,$deletequery);

   }

   if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $updatebtn = true;

    $editquery = "SELECT * FROM productstore WHERE productid=$id;";
    $result = mysqli_query($conn,$editquery);
    
    $row = mysqli_fetch_assoc($result);

    $iname = $row['iname'];
    $pname = $row['productName'];
    $pprice = $row['productPrice'];
    $pcode = $row['productCode'];
    $pdiscount = $row['productDiscount'];
    $psizes = $row['productSizes'];
    $pdetails = $row['productDetails'];
	$pstock= $row['productInStock'];
	$image= $row['productInStock'];
   }


   if(isset($_POST['update'])){

    $iname = $_FILES['file']['name'];
    $target_dir = "uploads/";
    
   $id = $_POST['id'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pcode = $_POST['pcode'];
    $pdiscount = $_POST['pdiscount'];
    $psizes = $_POST['psizes'];
    $pdetails = $_POST['pdetails'];
    $pinstock = 0;
    
    if(empty($_POST['instock'])){
        $pinstock = 0;
    }
    else{
        $pinstock = 1;
    }
    
    
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");
    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$iname);


    $updatequery = "UPDATE productstore SET iname='$iname',productName='$pname',
    productPrice='$pprice',productCode='$pcode',productInStock='$pinstock',
    productDiscount='$pdiscount',productSizes='$psizes',productDetails='$pdetails' WHERE productId=$id;";
   
   mysqli_query($conn,$updatequery);

    header("Location:ProductStore.php");
}

?>