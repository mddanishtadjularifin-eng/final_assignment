<?php
include "db.php";
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

   if ($username == "" || $password == ""){
    $error = "Please fill in all fields";
    }else{
        $sql = $conn->prepare("SELECT * FROM users WHERE username = '$username'");

        $sql->execute();

        $user = $sql->get_result()->fetch_assoc();

        if($user && password_verify($password, $user['password'])) {
           $_SESSION['id'] = $user['id'];
           $_SESSION['username'] = $user['username'];
           header("Location: index.php");
           exit;
        } else {
            $error = "Invalid username or password";
        }
    }
   }
    


?>


<h2>STUDENT GRADING</h2>

<h3>LOGIN</h3>

<form method="post">
    <label for="">Username:</label>
    <input style="width: 200px;" type="text" name="username" required><br><br>

    <label for="">Password:</label>
    <input style="width: 200px;" type="password" name="password" required><br><br>

    <button type="submit" name="login">Login</button>

</form>
    