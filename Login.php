<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>PizzaHut Login </title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <?php require_once('loginProcess.php'); ?>
  <body class="text-center bg-danger">
    <form class="container text-light" action="loginProcess.php" method="post">
    <br><br><br><br><br>
    <h2 class="mt-4">PizzaHut Login</h2>
      <img class="mb-2" src="pizzahutlogo.png" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Please Sign-In</h1>
      <div class="row justify-content-center mb-3">
      <div class="col col-6 col-md-4">
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name="usermail" class="form-control border-light p-2" placeholder="Email address" required autofocus>
      </div>
      </div>
      <div class="row justify-content-center mb-4">
      <div class="col col-6 col-md-4">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="userpass" class="form-control border-light p-2" placeholder="Password" required>
      </div>
      </div>
	  <?php
		if(isset($_GET['msg']) && $_GET['msg']==1){
			?>
			<div>Password or Email is Incorrect.</div>
			<?php
		}
	  ?>
      <button class="btn btn-dark" name="userbtn" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text">&copy; 2020-2024</p>
    </form>
  </body>
</html>
