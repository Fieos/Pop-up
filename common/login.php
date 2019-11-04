<?php
if(isset($_POST["loginSubmit"])){
	require "dbh.php";
	$eAddress = $_POST["eAddress"];
	$password = $_POST["password"];
	
	if(empty($eAddress) || empty($password)){
		header("Location:../LoginWebsite1.php?error=emptyfields");
		exit();
	}
	else{
		$sql="SELECT * FROM userinformation WHERE eAddress=?;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location:../LoginWebsite1.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $eAddress);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				$pwdCheck = password_verify($password, $row["password"]);
				if($pwdCheck == false){
					header("Location:../LoginWebsite1.php?error=invalidpassword");
					exit();
				}
				elseif($pwdCheck == true){
					session_start();
					$_SESSION["id"]= $row["id"]	;
					$_SESSION["fName"]= $row["fName"];
					$_SESSION["AdminStatus"] = $row["AdminStatus"];
					if($_SESSION["AdminStatus"] == "1"){
						header("Location:../AdminMain.php?login=success");
					}
					else{
						header("Location:../Website1.php?login=success");
					}
				}
				else{
					header("Location:../LoginWebsite1.php?error=invalidpwdcheck");
					exit();
				}
			}
			else{
				header("Location:../LoginWebsite1.php?error=nouserfound");
				exit();
			}
		}
	}
}
else{
	header("Location:../Website1.php");
	exit();
}