  <?php

    session_start();
    $username = $_SESSION['username'];
    if (!isset($username)) {
        header('location:login.php');
    }
    ?>


  <!doctype html>
  <html lang="en">

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Home</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>

  <body>
      <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
          <h1 class="text-center text-primary">Welcome <?php echo $username; ?>, now</h1>
          <a href="logout.php" type="button" class="btn btn-danger" style="margin-left:20px;">Logout</>
      </div>

  </body>

  </html>