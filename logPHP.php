<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Details</title>
</head>
<body>
    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $username = $_POST['username'];
        $password = $_POST['password'];
        $remember = isset($_POST['remember']) ? "Yes" : "No"; 

        echo "<h2>Login Details:</h2>";
        echo "<p>Username: $username</p>";
        echo "<p>Password: $password</p>";
        echo "<p>Remember Me: $remember</p>";
    }
    ?>
</body>
</html>