<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: manage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body class="bodycuatuanlogindiv">
<?php include_once 'header.inc'; ?>
<div class="logindiv">
    <article>
        

        <div>
            <form class="loginform" method='post' action="login.php" novalidate>
                
                
                <h2>Login</h2>
                <input type="text" name="mail" id="mail" placeholder="Email" require/></p>
                <input type="password" name="password" id="password" placeholder="Password" /> </p>
                <button class="loginbutton" type="submit" value="LOGIN" >LOGIN</button>
            </form>
        </div>

        
        
    </article>
</div>
</body>
</html>
<div class="invalidpassoremail">
<?php
require_once "settings.php";
$conn = @mysqli_connect($host1, $user1, $pwd1, $sql_db1);

if (!$conn) {
    echo "<p>Database connection failure</p>";
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['mail'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            session_start();
            $_SESSION['loggedin'] = true;
            header("Location: manage.php");
            exit();
        } else {
            echo "<p>Invalid email or password. Please try again.</p>";
        }
    }
}
?>
</div>