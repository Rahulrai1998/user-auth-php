<?php

$loginSuccess = 0;
$invalidUser = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "select * from `registration` where username='$username' and password='$password'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            // echo "Login Successful!!";
            $loginSuccess = 1;
            session_start();
            $_SESSION['username'] = $username;
            header('location:home.php');
        } else {
            // echo "Invalid Credentials!!";
            $invalidUser = 1;
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <h2 class="text-center">Login</h2>
    <div class="container mt-5 w-50">
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" placeholder="Enter Username" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" placeholder="Enter Password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <a href="signup.php">Register</a>
        </form>
        <?php
        if ($loginSuccess) {
            echo '<div class="alert alert-success" role="alert" mt-5>
                        Logged in!!
                        </div>';
        }
        ?>
        <?php
        if ($invalidUser) {
            echo '<div class="alert alert-warning" role="alert">
                    Invalid Credentials!
                    </div>';
        }

        ?>
    </div>
</body>

</html>