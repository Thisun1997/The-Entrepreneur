<?php
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "profilesystem"; /* Database name */

$db = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$db) {
 die("Connection failed: " . mysqli_connect_error());
}