<?php

$signupSuccess = 0;
$userAlreadyExists = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    // if ($result) {
    //     echo "Data inserted ";
    // } else {
    //     die(mysqli_error($connection));
    // }

    $sql = "select * from `registration` where username='$username'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            // echo "Username already exists";
            $userAlreadyExists = 1;
        } else {
            $sql = "insert into `registration`(username,password) values('$username','$password')";
            $insertResult = mysqli_query($connection, $sql);
            if ($insertResult) {
                $signupSuccess = 1;
                // echo "Signup successful!";
            } else die(mysqli_error($connection));
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <h2 class="text-center mt-5">Sign up</h2>
    <div class="container mt-5 w-50">
        <form action="signup.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" placeholder="Enter Username" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" placeholder="Enter Password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign up</button>
            <a href="login.php">Login</a>
        </form>
        <?php
        if ($userAlreadyExists) {
            echo '<div class="alert alert-warning" role="alert" mt-5>
                        User already exists!!
                        </div>';
        }
        ?>
        <?php
        if ($signupSuccess) {
            echo '<div class="alert alert-success" role="alert">
                    Signed up!
                    </div>';
        }

        ?>
    </div>
</body>

</html>