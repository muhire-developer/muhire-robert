<?php
session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <script type="text/javascript">
        windows.history.back();
    </script>

    <meta charset=" UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: white; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #333;
            overflow: hidden;
        }
        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        nav a:hover {
            background-color: white;
            color: black;
        }
        h1 {
            text-align: center;
            color: #333;
            font-family: Arial, sans-serif;
            margin-top: 20px;
            padding: 10px;
        }
        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(4, 5, 2, 4,3);
        }
        form label {
            font-size: 14px;
            color: #333;
        }
        form input[type="text"],
        form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        form button:hover {
            background-color: #555;
        }
        .content {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(2, 2, 2, 2.1);
            text-align: center;
        }
        .content p {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
   
    <nav>
        <a class="active" href="index.php">PATIENT</a>
        <a href="index.php">MEDICAL RECORD</a>
        <a href="index.php">DOCTOR</a>
        <a href="index.php">BILLING</a>
        <a href="index.php">STAFF MGT</a>
    </nav>
    <div class="content">
        <p>Welcome to the HMS System but you have to first login for details!!!!!!!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
    <form action="" method="POST">
        <h1>LOGIN HERE!!</h1>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button name="login">Login</button>
    </form>
    <h3>Don't have an account? <a href="register.php">Register here</a></h3>
</body>
</html>
<?php
$conn = mysqli_connect("localhost", "root", "", "hms_system");
if (isset($_POST['login'])) {
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    $sql = "SELECT * FROM `register` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $_SESSION['username'] = $username; 
        header("Location: page.php"); 
        exit();
    } else {
        echo "<p style='color: red; text-align: center;'>Invalid username or password.</p>";
    }
}
?>