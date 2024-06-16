<?php

$dbname = "voyaverse_sample";
$createDB = "CREATE DATABASE IF NOT EXISTS $dbname";

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";

$conn = new mysqli($servername, $dbusername, $dbpassword);

$table = "users";
$createTABLE = "CREATE TABLE IF NOT EXISTS $table (
  `ID` int(100) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `Photo` mediumblob NOT NULL,
  `Gender` enum('Male','Female','Other','') NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=user,1=admin,2=superadmin',
  `User_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!$conn->query($createDB) === TRUE) {
  echo "Error creating database: " . $conn->error;
}

$conn->select_db($dbname);

if (!$conn->query($createTABLE) === TRUE) {
  echo "Error creating table users: " . $conn->error;
}

?>