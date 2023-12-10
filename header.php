<?php 

  session_start();

  //$_SESSION['name'] = 'mario';

  if($_SERVER['QUERY_STRING'] == 'noname'){
    //unset($_SESSION['name']);
    session_unset();
  }

  // null coalesce
  $name = $_SESSION['uname'] ?? 'Guest';

  // get cookie
  $user = $_COOKIE['user'] ?? 'Unknown';

?>

<head>
	<title>Profile</title>
	<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style type="text/css">
	  .brand{
	  	background: #cbb09c !important;
	  }
  	.brand-text{
  		color: #cbb09c !important;
  	}
  	form{
  		max-width: 460px;
  		margin: 20px auto;
  		padding: 20px;
  	}
    .p{
      width: 100px;
      margin: 40px auto -30px;
      display: block;
      position: relative;
      top: -30px;
    }
  </style>
</head>
<body class="grey lighten-4">
	<nav class="white z-depth-0">
    <div class="container">
      <a href="index1.php" class="brand-logo brand-text">Investor's Lancer</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
        <li class="grey-text">Hello <?php echo htmlspecialchars($uname); ?></li>
        <li class="grey-text">(<?php echo htmlspecialchars($user); ?>)</li>
        <li><a href="add.php" class="btn brand z-depth-0">Edit profile</a></li>
      </ul>
    </div>
  </nav>