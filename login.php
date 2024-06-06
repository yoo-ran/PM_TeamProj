<?php
session_start();
require('db.php');

// Checks if the form is submitted
if(isset($_POST['username']) && isset($_POST['password'])){
    // Assigning posted values to variables.
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Checking the values are existing in the database or not
    $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    // If the posted values are equal to the database values, then session will be created for the user.
    if($count == 1){
        $user = mysqli_fetch_assoc($result);  // Fetch the user data
        
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['id'];
        
        // Set session storage using JavaScript
        echo "<script>
                sessionStorage.setItem('username', '{$user['username']}');
                window.location.href = 'index.html';
              </script>";
    } else {
        // If the login credentials don't match, an error message is shown
        $fmsg = "Invalid Login Credentials";
    }
}

// Display login form if session is not set
if(!isset($_SESSION['username'])){
    echo "You are not our member";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
            <h2 class="form-signin-heading">Login</h2>
            <div class="input-group">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-info btn-block" type="submit">Login</button>
            <a class="btn btn-lg btn-success btn-block" href="register.php">Register</a>
        </form>
    </div>
</body>
</html>
