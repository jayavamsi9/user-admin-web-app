<?php include('functions.php');
if (isLoggedIn()) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../user/styless.css">
</head>
<body>
<div class="container">
  <div class="loginBox" style="margin-top: 50px"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
    <h3>Admin Log-In</h3>
    <form action="login.php" method="POST">
        <div class="inputBox"> 
            <input id="uname" type="text" name="username" placeholder="enter admin username" autocomplete="off" required> 
            <input id="pass" type="password" name="password" placeholder="enter admin password" autocomplete="off" required>
        </div>
        <input type="submit" name="login-btn" value="Login">
    </form>
    <?php
            if(isset($_SESSION['error'])) {
                echo "<div class='alert alert-danger' style='padding:6px; font-size:18px; '><center>".$_SESSION['error']."</center></div>";
                unset($_SESSION['error']);
            }
    ?>
    </div>
</div>
</div>
</body>
</html>