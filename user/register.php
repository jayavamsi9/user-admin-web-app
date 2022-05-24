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
	<link rel="stylesheet" type="text/css" href="./styless.css">
    <script type="text/javascript" src="./js/script.js"></script>
</head>
<body>
<div class="container">
  <div class="loginBox" style="margin-top: 150px; width:500px">
    <form action="register.php" method="POST" onsubmit="return validateForm();">
    <div class="file-input">
        <input type="file" name="image" accept="image/*" onchange="handleProfile(this)" class="profile_file" required>
        <img id="profileImage" class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">    
    </div>   
    <h3>User Registration</h3>
        <div class="inputBox"> 
            <input id="f_name" type="text" name="firstname" autocomplete="off" placeholder="First Name" required>
            <input id="l_name" type="text" name="lastname" placeholder="Last Name" autocomplete="off" required autocomplete="off">
            <input id="email" type="email" name="email" autocomplete="off" placeholder="yourgmail@gmail.com" required>
            <input id="mob_number" type="text" name="mobile" autocomplete="off" maxlength="13" placeholder="+91 1234567890" required>
            <br />
            <center><select name="gender" style="padding: 10px 20px; background-color: black; color: grey" required>
                <option value="none">Select Your Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            </select><br /> <br />
            <input id="password" type="password" name="password" placeholder="Password" required> </div> 
            <div id="errors"></div><br/>
             <?php 
             if (isset($_SESSION['error'])) {
                echo "<div class='alert alert-danger' role='alert'>";
                echo  "<strong>"; 
                echo $_SESSION['error']; 
                echo "</strong>";
                echo   "</div>";
             }        
             ?>
            <input type="submit" name="register_btn" value="Register">
    </form>
    <a href="./login.php" style="color:#42F3FA">Already have an account ?</a>
    <div class="text-center">
        <p><a href="./login.php" style="color: #59238F; font-size: 20px">Sign-In Now!</a></p>
    </div>
</div>
</div>
</body>
</html>