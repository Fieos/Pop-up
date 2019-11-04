<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "userinformation";
$dbName2 = "sessions";
$connMain = mysqli_connect($serverName, $dbUsername, $dbPassword);
$conn = mysqli_connect($serverName, $dbUsername, $dbPassword,$dbName);
if (!$conn){
	die("connection failed: ".mysqli_connect_error());
}
$conn2 = mysqli_connect($serverName, $dbUsername, $dbPassword,$dbName2);
if (!$conn2){
	die("connection failed: ".mysqli_connect_error());
}
if (!$connMain){
	die("connection failed: ".mysqli_connect_error());
}