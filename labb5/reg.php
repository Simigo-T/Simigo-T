<?php
error_reporting(E_ALL);

// Database connection details
$dbservername = "localhost";
$dbname = "userdb";
$dbusername = "userdb";
$dbpassword = "letusin2022";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    try {
        // Establish a database connection
        $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement
        $stmt = $conn->prepare('INSERT INTO User (username, Enamn, passwor) VALUES (:username, :Enamn, :passw)');
        $stmt->bindParam(':username', $new_user);
        $stmt->bindParam(':Enamn', $enamn);
        $stmt->bindParam(':passw', $passw);

        // Bind the form data
        $new_user = $_POST['fname']; // Name field
        $enamn = $_POST['ename'];   // Last name field
        $passw = password_hash($_POST['psw'], PASSWORD_BCRYPT); // Hash the password

        // Execute the query
        $stmt->execute();

        // Success message and redirection
        echo "<p style='color: green; text-align: center;'>Account created successfully!</p>";
        header('Location: login.php');
    } catch (PDOException $e) {
        echo "<p style='color: red; text-align: center;'>Error: " . $e->getMessage() . "</p>";
    } finally {
        // Close the connection
        $conn = null;
    }
}
?>

<!DOCTYPE html>
<html lang="sv">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<title>Register</title>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #f4f4f9;
}

.container {
  padding: 16px;
  background-color: white;
  max-width: 500px;
  margin: 20px auto;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 10px;
  margin: 8px 0;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius: 5px;
  margin-top: 10px;
}

button:hover {
  background-color: #038c54;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

a {
  color: dodgerblue;
}

.signin {
  background-color: #f1f1f1;
  text-align: center;
  padding: 10px;
  border-radius: 5px;
  margin-top: 20px;
}
</style>
</head>
<body>

<form action="" method="POST">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="fname"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="fname" id="fname" required>

    <label for="ename"><b>Efternamn</b></label>
    <input type="text" placeholder="Enter Efternamn" name="ename" id="ename" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name="add">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>
