<?php
error_reporting(E_ALL);

// Database configuration
$dbservername = "localhost";
$dbname = "userdb";
$dbusername = "userdb";
$dbpassword = "letusin2022";

try {
    $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if (isset($_POST['login'])) { // Check if login form is submitted
    $user = $_POST['aname'];
    $pass = $_POST['uname'];

    try {
        // Check if user exists in the database
        $stmt = $conn->prepare('SELECT * FROM User WHERE username = :username');
        $stmt->bindParam(':username', $user);
        $stmt->execute();

        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData && password_verify($pass, $userData['passwor'])) {
            // Successful login
            session_start();
            $_SESSION['use'] = $userData['username'];
            header("Location: index.php");
        } else {
            // Invalid credentials
            echo "<p style='color: red; text-align: center;'>Invalid Username or Password</p>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conn = null; // Close the connection
?>
<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Logga in</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .inloggning {
        width: 100%;
        max-width: 400px;
        padding: 20px;
        background-color: #ffffff;
        border: 2px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .inloggning h2 {
        color: #333;
        margin-bottom: 20px;
    }

    .inloggning input[type="text"], 
    .inloggning input[type="password"] {
        width: calc(100% - 20px);
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        box-sizing: border-box;
    }

    .inloggning input[type="submit"] {
        background-color: #42a5f5;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px;
        width: 100%;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .inloggning input[type="submit"]:hover {
        background-color: #1e88e5;
    }

    .inloggning p {
        margin: 10px 0;
        color: #666;
    }

    .inloggning a {
        color: #42a5f5;
        text-decoration: none;
    }

    .inloggning a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
    <div class="inloggning">
        <h2>Logga in</h2>
        <form action="" method="post">
            <label for="aname">Användarnamn:</label><br>
            <input type="text" name="aname" id="aname" placeholder="Användarnamn" required><br>
            <label for="uname">Lösenord:</label><br>
            <input type="password" name="uname" id="uname" placeholder="Lösenord" required><br>
            <input type="submit" name="login" value="LOGIN">
        </form>
        <p>Skapa konto? <a href="reg.php">Sign up</a>.</p>
    </div>
</body>
</html>
