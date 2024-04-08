<?php
$host = "feenix-mariadb.swin.edu.au";
$user = "s104789808"; //Username for login page : s104789808@student.swin.edu.au
$pwd = "221002"; //Password for login page : 221002
$sql_db = "s104789808_db"; //DB Name

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
