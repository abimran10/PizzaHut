
<?php 

session_start();


if(!isset(($_SESSION['mail']))){
  header("Location:login.php");
}

    $conn = mysqli_connect("localhost","root","","phase2pizzahut");
	
	$pcode="";
    $pdiscount="";
    $psizes="";
    $pdetails="";
    $iname="";
    $pname ="";
    $pprice="";
	$pstock=0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>PizzaHut Store</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    


    <title>PizzaHut | Welcome to PizzaHut</title>
  </head>
<body style="background-color: antiquewhite;">
    <div class="p-3 mb-2 bg-danger text-white">

      <div class="row align-items-center">
        <div class="col-1">
    <a href="home.html"><img src="pizzahutlogo.png" alt="Home Page" srcset="" height="100" width="100"> </a>
  </div>
  <div class="col-1">
      <h2 class="text-white">PizzaHut</h2>
    </div>
    <div class="col-10">
        <a href="#" class="fa fa-facebook fa-lg text-white mr-5 float-right"></a>
        <a href="#" class="fa fa-twitter fa-lg text-white mr-5 float-right"></a>
        <a href="#" class="fa fa-instagram fa-lg text-white mr-5 float-right"></a>
        <a href="#" class="fa fa-youtube fa-lg text-white mr-5 float-right"></a>
      </div>

  </div>
  </div>
  

<?php require_once('proceed.php'); ?>

<div class="container justify-content-center bg-secondary">
<div class="row">
<div class="col-2">
  <h4>Add Pizza Products</h4>
  </div>
  <div class="col-10">
   <form action="loginProcess.php" method="post">
  <button class="btn btn-danger btn-lg float-right mt-3" name="outuser">Logout</button>
  </form>
  </div>
 </div>
  <br><br>
  <form action="proceed.php" method="post" enctype='multipart/form-data' style="margin-left: 92px">
  
    <div class="row">
  <div class="col-6 col-md-4">
  <input type="text" name="pname" value="<?php echo $pname ?>" class="form-control" placeholder="Product Name">
  </div>
</div>
</br>
<div class="row">
  <div class="col-2 col-md-2">
  <input type="number" name="pprice" value="<?php echo $pprice ?>" class="form-control" placeholder="Price">
  </div>

  <div class="col-4 col-md-2">
  <input type="text" name="pcode" value="<?php echo $pcode ?>" class="form-control" placeholder="Product Code">
  </div>


  </div>
  

  <br>
  <div class="row">
  <div class="col col-4 col-md-2">
  <input type="float" class="form-control" name="pdiscount" value="<?php echo $pdiscount ?>" placeholder="Discount">
  </div>
  <div class="col col-6 col-md-4">
  <input type="text" class="form-control" name="psizes" value="<?php echo $psizes ?>" placeholder="Sizes in inches">
  </div>
  </div>
  <br>
  <div class="row">
  <div class="col col-md-4">
  <input type="file" name="file" value="<?php echo $iname ?>" class="form-control-file bg-dark text-white">
  </div>

  <div class="col-2 col-md-2">
  <div class="checkbox">
  <input type="checkbox" class="" <?php echo ($pstock==1 ? 'checked' : '');?> name="instock"> In Stock 
  </div>
  </div> 

  </div>
<br>
<?php
if(isset($row['iname']) && $row['iname']!='')
{?>
	<div class="panel-body">
		<img src="uploads/<?php echo $row['iname']; ?>" class="img-responsive border border-dark" width="275" height="160"/>
	</div><?php
}
?>
<br>
  <div class="row">
  <div class="col-md-8">
  <textarea name="pdetails" id="pd" cols="10" rows="3" class="form-control" placeholder="Enter Product Descripsion Here...">
  <?php echo $pdetails ?>
  </textarea>
  </div>
  </div>
  <br>

  <input type="hidden" name="id" value="<?php echo $row['productId']; ?>">

  <?php if($updatebtn== true){ ?>
    <button type="submit" name="update" class="btn btn-dark">Update Product</button> <?php } else{ ?>
    <button type="submit" name="submit" class="btn btn-dark">Add Product</button>
    <?php } ?>

  </form>
 
<br>
</div>
    
    <br>
    <br>


  
<div class="container-fluid">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
	  <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
	   <th scope="col">Discount</th>
      <th scope="col">Sizes</th>
      <th scope="col">Code</th>
      <th scope="col">InStock</th>
     
      <th scope="col">Descripsion</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php

        $query = "SELECT * from productstore;";

      $res =  mysqli_query($conn,$query);

      if(!$res) {
        die('Could not get data: ' . mysql_error());
     }

      while($row = mysqli_fetch_assoc($res)){

    ?>

    <tr>
      <th scope="row"><b><?php echo $row['productId']; ?></b></th>
      <td><b><?php echo $row['productName']; ?></b></td>
      <td><img src="uploads/<?php echo $row['iname']; ?>" width="50" height="30"></td>
	  
      <td><b><?php echo $row['productPrice']; ?> Rs</b></td>
	  <td><b><?php echo $row['productDiscount']; ?>%</b></td>
      <td><b><?php echo $row['productSizes']; ?></b></td>
      <td><b><?php echo $row['productCode']; ?></b></td>

      <td><b><?php 

        if($row['productInStock']==1){
          echo "Y";
        }
        else
        {
          echo "N";
        }

      ?></b></td>


      
      <td><b><?php echo $row['productDetails']; ?></b></td>

      <td> <a href="ProductStore.php?edit=<?php echo $row['productId']; ?>"  class="btn btn-primary">Edit</a>
            <a href="ProductStore.php?del=<?php echo $row['productId']; ?>"  class="btn btn-danger mr-2">Delete</a>
        </td>
    </tr>
    
      <?php } ?>

</table>

</tbody>

</div>

</body>
</html>