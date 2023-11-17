<?php
$host = "127.0.0.1"; /* Host name */
$user = "root"; /* User */
$password = "Shreya@17"; /* Password */
$dbname = "cinema_db"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>  