

<?php
session_start();
if (isset($_SESSION['uname']))
{
	header('Location: jig.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelancer Login/sign up</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        button:hover{
            cursor: pointer;
        }
				body{
					background-image:url('./img/bread-bg.jpg');
				}
    </style>
</head>
<body>
    <h2> Freelancer Login / Signup </h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="freelancerRegister.php" method="POST">
			<h1>Create Account</h1>
			<input name="uname" type="text" placeholder="Name" required/>
			<input name="uemail" type="email" placeholder="Email" required/>
			<input name="upass" type="password" placeholder="Password" required/>
            <input name="urepass" type="password" placeholder="re-Enter Password" required/>
            <input name="skills" type="text" placeholder="skills (',' separated)" required/>
            <input name="experience" type="number" placeholder="Experience (in years)" required/>
			<input type="hidden" name="role" value="freelancer" />
			<button name="submit">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="loginVal.php" method="POST">
			<h1>Sign in</h1>
			<input name="uemail" type="email" placeholder="Email" required/>
			<input name="upass" type="password" placeholder="Password" required/>
			
			<button name="submit"> Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello!</h1>
				<p>Enter your personal details and start your journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="scripts.js"></script>

</body>
</html>