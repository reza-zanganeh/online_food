<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "online_food";
$link = mysqli_connect(
  $servername,
  $username,
  $password,
  $databasename
);
if ($link === false) {
  die("Error : Could not connect ." . mysqli_connect_error());
}
