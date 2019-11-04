<?php
	if(isset($_POST["returnDetails"])){
		require "dbh.php";
		$cheLocation= strtolower(mysqli_real_escape_string($conn, $_POST["cheLocation"]));
		$cheLocation = preg_replace("/[^a-zA-Z]/", "", $cheLocation);
		$cheDate= mysqli_real_escape_string($conn, $_POST["cheDate"]);
		if(empty($cheLocation) || empty($cheDate)){
			header("Location:../AdminMain.php?error=emptyfields");
			exit();
		}else{
			$sql="SELECT childid FROM `".$cheLocation."_".$cheDate."`";
			$result=mysqli_query($conn2,$sql);
			if(!$result){
				header("Location:../AdminMain.php?error=invalidsession");
				exit();
			}
			$childidArray=array();
			while($row=mysqli_fetch_assoc($result)){
				$currentchildid=implode("", $row);
				array_push($childidArray, $currentchildid);
			}
			$childidVals = implode(",",$childidArray);
			$sql="SELECT userinformation.userinformation.eAddress, userinformation.participantinformation.cFName FROM userinformation.userinformation INNER JOIN userinformation.participantinformation ON userinformation.userinformation.id=userinformation.participantinformation.id AND userinformation.participantinformation.childid IN (".$childidVals.") ORDER BY userinformation.userinformation.eAddress";
			session_start();
			$result=mysqli_query($connMain,$sql);
			$data = array();
			while($row=mysqli_fetch_assoc($result)){
				$data[]=array($row["eAddress"],$row["cFName"]);
				/*$data[$row["eAddress"]]["eAddress"] = $row["eAddress"];
				$data[$row["eAddress"]]["cFName"] = $row["cFName"];*/
			}
			$_SESSION["data"]=$data;
			$data=implode(",",$data);
			header("Location:../AdminMain.php?data=".$data["eAddress"]);

		}
	}else{
		header("Location:../AdminMain.php");
	}