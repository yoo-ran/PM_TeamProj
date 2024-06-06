<?php  //Start the Session : a stored variable, only on the server, to track a user across pages. In this case that variable (array) is anything that begins with $_SESSION

session_start();
require('db.php');
// Checks if the form is submitted
if(isset($_POST['username']) && isset($_POST['password'])){
    // Assigning posted values to variables.
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //Checking the values are existing in the database or not
    $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
    $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
    $count = mysqli_num_rows($result);

    // If the posted values are equal to the database values, then session will be created for the user.
    if($count==1){
        $_SESSION['username'] = $username;
    }else{
        // If the login credintials doesn't match, an error message is shown
        $fmsg = "Invalid Login Credentials";
    }
}

// 3.1.4 if the user if logged in Freets the user with message
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    echo "<h1>Welcome" . $username . " ";
    echo "to the Members Area";
    echo "<a href='logout.php'>Logout</a></h1>";
}else{
    // 3.2 When the user visits the page first time, simple login form will be displayed
    echo "You are not our member";
}







?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="css/styles.css" >

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>
<div class="container">
      <form class="form-signin" method="POST">

<!-- removed from original, as this is related to registration -->
<!--
<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>

 -->
        <h2 class="form-signin-heading">_login</h2>
        <div class="input-group">
  <input type="text" name="username" class="form-control" placeholder="Username" required>
</div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <!-- Note the change in the two buttons and the destinations vs. the register.php file (and link backt to here) -->
        <button class="btn btn-lg btn-info btn-block" type="submit">Login</button>
        <a class="btn btn-lg btn-success btn-block" href="register.php">Register</a>
      </form>
</div>
</body>
</html>
