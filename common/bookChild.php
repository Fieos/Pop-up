<?php
if(isset($_POST["bookChild"])){
	session_start();
	require "dbh.php";
	$cFName = mysqli_real_escape_string($conn, $_POST["cFName"]);
	$cLName = mysqli_real_escape_string($conn, $_POST["cLName"]);
	$bookedSession = mysqli_real_escape_string($conn, $_POST["availableSessions"]);
	$childid = "";
	$id = $_SESSION["id"];
	if(empty($cLName) || empty($cFName) || empty($bookedSession) ){
		header("Location:../BookSessions.php?error=emptyfields");
		exit();
	}
	elseif(!preg_match("/^[a-zA-Z]*$/", $cFName) or (!preg_match("/^[a-zA-Z]*$/", $cLName))){
		header("Location:../BookSessions.php?error=namecontainsnonalphabets");
		exit();
	}else{
		$sql="SELECT cFName FROM `participantinformation` WHERE id=".$id."";
		$result = mysqli_query($conn,$sql);
		$namesArray=array();
		while($row=mysqli_fetch_assoc($result)){
			$testcFName=implode("", $row);
			array_push($namesArray, $testcFName);
		}
		if(in_array($cFName, $namesArray)){
			
		}else{
			$sql="INSERT INTO `participantinformation` (`childid`, `id`, `cFName`, `cLName`) VALUES (?, ?, ?, ?);";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("Location:../BookSessions.php?error=insertparticipantinformationfailed");
				exit();
			}
			else{
				mysqli_stmt_bind_param($stmt, "ssss", $childid, $id, $cFName, $cLName);
				mysqli_stmt_execute($stmt);
			}
		}
		$sql = "SELECT childid FROM `participantinformation` WHERE id=".$id." AND cFName='".$cFName."' LIMIT 1;";
		$result = mysqli_query($conn,$sql);
		if(!$result){
			header("Location:../BookSessions.php?error=selectidfailed&childid=".$childid."&cFName=".$cFName."");
			exit();
		}
		$row=mysqli_fetch_assoc($result);
		$childid=implode("", $row);
		mysqli_close($conn);
		$conn2 = mysqli_connect("localhost", "root", "","sessions");
		$testchildid = "SELECT childid FROM `".$bookedSession."` WHERE childid=".$childid.";";
		$result = mysqli_query($conn2, $testchildid);
		if(mysqli_num_rows($result)==0){
			$sql= "INSERT INTO `".$bookedSession."` (`childid`) VALUES (".$childid.");";
			mysqli_query($conn2,$sql);
			header("Location:../BookSessions.php?error=insertidfailed&childid=".$testcFName."&name=".$cFName);
			exit();
		}else{
			header("Location:../BookSessions.php?error=alreadybooked&id=");
			exit();
		}
	}
mysqli_close($conn2);
}