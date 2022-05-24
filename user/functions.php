<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'multi_login');

$firstname = "";
$lastname = "";
$email = "";
$mobile = "";
$password = "";
$gender = "";
$profile = "";

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
    register();
}

// REGISTER USER
function register()
{
    // call these variables with the global keyword to make them available in function
    global $db, $lastname, $firstname, $email, $mobile, $password, $gender, $profile;

    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $firstname = e($_POST['firstname']);
    $lastname = e($_POST['lastname']);
    $email = strtolower($_POST['email']);
    $mobile = e($_POST['mobile']);
    $password = e($_POST['password']);
    $gender = e($_POST['gender']);
    $profile = $_POST['image'];

    if (isset($_POST['user_type'])) {
        $user_type = e($_POST['user_type']);
        $query = "INSERT INTO users (firstname, lastname, email, user_type, password, mobile, gender, profile) 
					  VALUES('$firstname', '$lastname', '$email',  '$user_type' ,'$password', '$mobile', '$gender', $)";
        mysqli_query($db, $query);
        $_SESSION['success']  = "New user successfully created!!";
        header('location: home.php');
    } else {
        $userId = getUserByEmail($email);
        if (isset($userId)) {
            $_SESSION['error']  = "User already exists with this email !!";
            header('location: register.php');
        } else {
            $query = "INSERT INTO users (firstname, lastname, email, user_type, password, mobile, gender, profile) 
                          VALUES('$firstname', '$lastname', '$email',  'user' ,'$password', '$mobile', '$gender', '$profile')";
            mysqli_query($db, $query);

            $_SESSION['user'] = getUserByEmail($email); // put logged in user in session
            $_SESSION['success']  = "You are now logged in";
            sendConfirmationMailToTheUser($firstname, $lastname, $email);
            header('location: index.php');
        }
    }
}

// escape string
function e($val)
{
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: login.php");
}

function isLoggedIn()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
    login();
}

// LOGIN USER
function login()
{
    global $db;
    // grab form values
    $email = e($_POST['email']);
    $password = e($_POST['password']);

    $userId = getUserByEmail($email);


    $query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
    $results = mysqli_query($db, $query);


    if (mysqli_num_rows($results)) { // user found
        $_SESSION['user'] = $userId;
        $_SESSION['success']  = "You are now logged in";
        header('location: index.php');
    } else {
        $_SESSION['error']  = "Invalid Username/Password Combination";
    }
}

function getUserByEmail($email)
{
    global $db;
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}

// send confirmation mail upon registering
function sendConfirmationMailToTheUser($firstname, $lastname, $email)
{
	$full_name = $firstname . " " . $lastname;
	$sub = "Welcome Note !";
	$msg = "Hi " . $full_name . ",\n\n\nYou have successfully registered!\nYou can now sign in using your registered mail " . "\n( " . $email . " )\n\n\nThanks and Regards,\nV - Admin";
	mail($email, $sub, $msg);
}