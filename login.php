<?php
session_start();
require('db.php');

// Checks if the form is submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Assigning posted values to variables.
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Checking the values are existing in the database or not
    $query = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    // If the posted values are equal to the database values, then session will be created for the user.
    if ($count == 1) {
        $user = mysqli_fetch_assoc($result);  // Fetch the user data

        // Check if the user has reward points, if not, initialize them with 300 points
        if ($user['reward'] == 0) {
            $initial_points = 300;
            $update_query = "UPDATE `users` SET reward='$initial_points' WHERE id='{$user['id']}'";
            mysqli_query($connection, $update_query) or die(mysqli_error($connection));
            $user['reward'] = $initial_points;
        }

        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['reward'] = $user['reward'];  // Store reward points in session

        $stringUser = json_encode($user);

        // Set session storage using JavaScript
        echo "<script>
                sessionStorage.setItem('user', '{$stringUser}');
                sessionStorage.setItem('reward', '{$user['reward']}');
                // window.location.href = 'index.html';
              </script>";
    } else {
        // If the login credentials don't match, an error message is shown
        $fmsg = "Invalid Login Credentials";
    }
}

// Display login form if session is not set
if (!isset($_SESSION['username'])) {
    // echo "You are not our member";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header>
        <a href="./index.html"><img src="./images/Logo-01.png" alt="Header Logo"></a>
        <nav>
            <ul>
                <li><a href="./menu.html">Menu</a></li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
            <ul>
                <li><a href="./cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
                <li><a href="./login.php"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    <main>
                <h2 class="form-signin-heading">Sign In</h2>
                <div class="container">
                    <form class="form-signin" method="POST">
                        <div class="input-group">
                            <label for="username">User name: </label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                        </div>
                        <div class="input-group">
                            <label for="inputPassword">Password: </label>
                            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                        </div>
                        <button class="btn btn-lg btn-info btn-block" type="submit">Login</button>
                    </form>
                </div>
                <a class="register" href="register.php">No Account? Create One Here</a>
    </main>
 
    <footer>
      <figure>
          <img src="./images/Logo-01.png" alt="Footer Logo">
        <figcaption>
          <i class="fa-brands fa-instagram"></i>
          <i class="fa-brands fa-square-facebook"></i>
          <i class="fa-brands fa-youtube"></i>
        </figcaption>
      </figure>
        <ul>
          <li><a href="#"><h4>About</h4></a></li>
          <li>About</li>
          <li>Contact Us</li>
          <li>Catering Inquiry</li>
          <li>FAQ’s</li>
          <li>Terms and Policy</li>
        </ul>
        <ul>
          <li><a href="#"><h4>Shop</h4></a></li>
          <li>Coffee</li>
          <li>Gift Cards</li>
        </ul>
        <ul>
          <li><a href="#"><h4>Coffee</h4></a></li>
          <li>Blog Posts</li>
          <li>Transparency Reports</li>
          <li>Sourcing Philosophy</li>
          <li>Wholesale</li>
        </ul>
        <ul>
            <li><h4>Contact</h4></li>
            <li><i class="fa-solid fa-phone"></i>123.444.555</li>
            <li><i class="fa-regular fa-envelope"></i>coastalcove@mail.com</li>
            <li><i class="fa-solid fa-location-dot"></i>555 Seymour St, CA</li>
        </ul>
    </footer>
    <script>
        let userSession = sessionStorage.getItem("user")
        const mainContainer = document.querySelector("main")

        const logout = () => {
            sessionStorage.removeItem('user');
            sessionStorage.removeItem('reward');
            localStorage.removeItem("cart")
            localStorage.removeItem("totalLocal")
            
            window.location.href = 'login.php';
            session_destroy()
        }

        window.addEventListener("load", (event) => {
    let userSession = sessionStorage.getItem("user");
    const mainContainer = document.querySelector("main");
    userSession = JSON.parse(userSession);

    if (userSession != null) {
        mainContainer.innerHTML = `
        <main>
            <h2 class="form-signin-heading">Welcome, ${userSession.username}</h2>
            <div class="container">
                <p><span style="color: var(--dark-blue); font-size: 2em; font-weight: bold;">Points: ${userSession.reward}</span></p>
            </div>
            <button class="btn btn-lg btn-info btn-block" onclick="logout()">Logout</button>
        </main>`;
    } else {
        mainContainer.innerHTML = `
        <main>
            <h2 class="form-signin-heading">Sign In</h2>
            <div class="container">
                <form class="form-signin" method="POST">
                    <div class="input-group">
                        <label for="username">User name: </label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                    </div>
                    <div class="input-group">
                        <label for="inputPassword">Password: </label>
                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    </div>
                    <button class="btn btn-lg btn-info btn-block" type="submit">Login</button>
                </form>
            </div>
            <a class="register" href="register.php">No Account? Create One Here</a>
        </main>`;
    }
});


    </script>
</body>
</html>
