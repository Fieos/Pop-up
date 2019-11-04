<?php
if(isset($_POST["registerSubmit"])){

	require "dbh.php";

	$fName=preg_replace("/[^a-zA-Z]/","", mysqli_real_escape_string($conn, $_POST["fName"]));
	$lName= preg_replace("/[^a-zA-Z]/","", mysqli_real_escape_string($conn, $_POST["lName"]));
	$pNumber= preg_replace("/[^0-9]/","", mysqli_real_escape_string($conn, $_POST["pNumber"]));
	$eAddress= mysqli_real_escape_string($conn, $_POST["eMail"]);
	$confeAddress= mysqli_real_escape_string($conn, $_POST["confEMail"]);
	$AdminStatus = "0";
	$id = "";
	if(isset($_POST["pPermission"]) && $_POST["pPermission"] == "Yes"){
		mysqli_real_escape_string($conn, $pPermission = 1);
	}
	else{
		mysqli_real_escape_string($conn, $pPermission=0);
	}
	$password= $_POST["password"];
	$confPassword = $_POST["confPassword"];
	/*$CustomerID = strtolower(substr($fName, 0, 3).substr($lName, -3)."0");*/

	if(empty($fName) || empty($lName) || empty($pNumber) || empty($eAddress) || empty($password) || empty($confPassword)){
		header("Location:../RegisterWebsite1.php?error=emptyfields&fName=".$fName."&lName=".$lName."&pNumber=".$pNumber."&eAddress=".$eAddress);
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $password) && !filter_var($eAddress, FILTER_VALIDATE_EMAIL)) {
		header("Location:../RegisterWebsite1.php?error=invalidpasseAddress&fName=".$fName."&lName=".$lName."&pNumber=".$pNumber."&eAddress=".$eAddress);
		exit();
	}
	else if (!filter_var($eAddress, FILTER_VALIDATE_EMAIL)) {
		header("Location:../RegisterWebsite1.php?error=invalidemail&fName=".$fName."&lName=".$lName."&pNumber=".$pNumber);
		exit();
	}
	else if (!preg_match("/^[0-9]*$/", $pNumber) or strlen($pNumber)!=11){
		header("Location:../RegisterWebsite1.php?error=invalidpNumber&fName=".$fName."&lName=".$lName."&pNumber=".$pNumber."&eAddress=".$eAddress);
		exit();
	}
	else if (strlen($password)>20){
		header("Location:../RegisterWebsite1.php?error=passwordtoolong&fName=".$fName."&lName=".$lName."&pNumber=".$pNumber."&eAddress=".$eAddress);
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $password) or strlen($password)<8) {
		header("Location:../RegisterWebsite1.php?error=invalidpass&fName=".$fName."&lName=".$lName."&pNumber=".$pNumber."&eAddress=".$eAddress);
		exit();
	}
	else if ($password !== $confPassword) {
		header("Location:../RegisterWebsite1.php?error=passnotmatch&fName=".$fName."&lName=".$lName."&pNumber=".$pNumber."&eAddress=".$eAddress);
		exit();
	}
	else if ($eAddress !== $confeAddress) {
		header("Location:../RegisterWebsite1.php?error=eAddressnotmatch&fName=".$fName."&lName=".$lName."&pNumber=".$pNumber."&eAddress=".$eAddress);
		exit();
	}
	else {
		$sql ="SELECT eAddress FROM userinformation WHERE eAddress=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location:../RegisterWebsite1.php?error=sqlerror&fName=".$fName."&lName=".$lName."&pNumber=".$pNumber."&eAddress=".$eAddress);
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $eAddress);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if	($resultCheck > 0){
				header("Location:../RegisterWebsite1.php?error=emailtaken&fName=".$fName."&lName=".$lName."&pNumber=".$pNumber."&eAddress=".$eAddress);
				exit();
			}
			else{
				$sql="INSERT INTO userinformation (id, fName, lName, pNumber, eAddress, pPermission, password, AdminStatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location:../RegisterWebsite1.php?error=sqlerror&fName=".$fName."&lName=".$lName."&pNumber=".$pNumber."&eAddress=".$eAddress);
					exit();
				}
				else{
					$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "ssssssss", $id, $fName, $lName, $pNumber, $eAddress, $pPermission, $hashedPassword, $AdminStatus);
					mysqli_stmt_execute($stmt);
					header("Location:../LoginWebsite1.php?register=success");
					exit();	
				}
			}
		}
		
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location:../RegisterWebsite1.php");
	exit();	
}