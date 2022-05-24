<?php
include('functions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>User - Home</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
  <script src="https://kit.fontawesome.com/057772d77f.js" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style>
	a,
	a:focus,
	a:hover {
  		color: #fff;
	}

	/* Custom default button */
	.btn-default,
	.btn-default:hover,
	.btn-default:focus {
  		color: #333;
  		text-shadow: none; /* Prevent inheritence from `body` */
  		background-color: #fff;
  		border: 1px solid #fff;
	}

	html,
	body {
		overflow: hidden;
  		height: 100%;
  		background-color: #fff;
	}
	body {
  		color: #fff;
  		text-align: center;
  		text-shadow: 0 1px 3px rgba(0,0,0,.5);
	}


	.site-wrapper {
  		display: table;
  		width: 100%;
  		height: 650px;
  		background-color: #333;
	}
	.site-wrapper-inner {
  		display: table-cell;
  		vertical-align: top;	
	}
	.cover-container {
  		margin-right: auto;
  		margin-left: auto;
	}


	.inner {
  		padding: 30px;
	}


	.masthead-brand {
  		margin-top: 10px;
  		margin-bottom: 10px;
	}

	.masthead-nav > li {
  		display: inline-block;
	}
	.masthead-nav > li + li {
  		margin-left: 20px;
	}
	.masthead-nav > li > a {
  		padding-right: 0;
  		padding-left: 0;
  		font-size: 16px;
  		font-weight: bold;
  		color: #fff; /* IE8 proofing */
  		color: rgba(255,255,255,.75);
  		border-bottom: 2px solid transparent;
	}
	.masthead-nav > li > a:hover,
	.masthead-nav > li > a:focus {
  		background-color: transparent;
  		border-bottom-color: #a9a9a9;
  		border-bottom-color: rgba(255,255,255,.25);
	}
	.masthead-nav > .active > a,
	.masthead-nav > .active > a:hover,
	.masthead-nav > .active > a:focus {
  		color: #fff;
  		border-bottom-color: #fff;
	}

	@media (min-width: 768px) {
  		.masthead-brand {
    	float: left;
  	}
  	.masthead-nav {
    	float: right;
  	}
}


/*
 * Cover
 */

.cover {
  padding: 0 20px;
}
.cover .btn-lg {
  padding: 10px 20px;
  font-weight: bold;
}

/*
 * Affix and center
 */

@media (min-width: 768px) {
  /* Pull out the header and footer */
  .masthead {
    position: fixed;
    top: 0;
  }
  /* Start the vertical centering */
  .site-wrapper-inner {
    vertical-align: middle;
  }

}

</style>
</head>

<body>
	<center>		
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="container">

          <div class="inner cover">
            <p class="lead" style="font-size: 30px;">
            	<?php
                echo "<h1 class='cover-heading'>WELCOME, " . $_SESSION['user']['firstname'] . " " . $_SESSION['user']['lastname'] . " !</h1>";
            	?>
            </p>
            <p class="lead" style="font-size: 30px;">
              <i class="fa-solid fa-envelope"></i>
            	<?php
            		echo strtolower($_SESSION['user']['email'])
            	?>
            </p>
            <p class="lead" style="font-size: 30px;">
              <i class="fa-solid fa-phone"></i>
            	<?php
            		echo $_SESSION['user']['mobile']
            	?>
            </p><br/>
            <p class="lead">
              <a href="index.php?logout='1'" class="btn btn-lg btn-danger"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;LOGOUT</a>
            </p>
          </div>

        </div>

      </div>

    </div>
		</div>
	</center>
</body>

</html>

