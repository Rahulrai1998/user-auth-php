<?php

$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DATABASE = "user-auth";

$connection = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if (!$connection) {
    die("Connection Error " . mysqli_connect_error($connection));
}
