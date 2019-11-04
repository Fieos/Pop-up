<?php
	if(isset($_POST["CreateSession"])){
		require "dbhAdmin.php";
		$sLocation= strtolower(mysqli_real_escape_string($conn, $_POST["sLocation"]));
		$sLocation= preg_replace("/[^a-zA-Z]/", "", $sLocation);
		$sSize= mysqli_real_escape_string($conn, $_POST["sSize"]);
		$sDate= mysqli_real_escape_string($conn, $_POST["sDate"]);
		$id="";
		if(empty($sLocation) || empty($sSize) || empty($sDate) ){
			header("Location:../AdminMain.php?error=emptyfields&sLocation=".$sLocation."&sSize=".$sSize."&sDate=".$sDate);
			exit();
		}
		else if (!preg_match("/^[0-9]*$/", $sSize)){
			header("Location:../AdminMain.php?error=invalidMaximumSize");
			exit();
		}
		else{
			$sql="INSERT INTO locations (`location`, `capacity`) VALUES (?, ?);";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("Location:../AdminMain.php?error=sqlinsertlocationserror&sLocation=".$sLocation."&sSize=".$sSize."&sDate=".$sDate);
				exit();
			}
			else{
				mysqli_stmt_bind_param($stmt, "ss", $sLocation, $sSize);
				mysqli_stmt_execute($stmt);
				$createTable="CREATE TABLE IF NOT EXISTS `".$sLocation."` (`sessionid` INT AUTO_INCREMENT PRIMARY KEY NOT NULL , `Date` DATE NOT NULL , INDEX (`sessionid`)) ENGINE = InnoDB;";
				if(!mysqli_stmt_prepare($stmt, $createTable)){
					header("Location:../AdminMain.php?error=sqlcreatetableerror&sLocation=".$sLocation."&sSize=".$sSize."&sDate=".$sDate);
					exit();
				}else{
					mysqli_stmt_execute($stmt);
					$insertData="INSERT INTO ".$sLocation." (`sessionid`, `Date`) VALUES (?, ?);";
					if(!mysqli_stmt_prepare($stmt, $insertData)){
						header("Location:../AdminMain.php?error=sqlinserterror&sLocation=".$sLocation."&sSize=".$sSize."&sDate=".$sDate);
						exit();
					}else{
						mysqli_stmt_bind_param($stmt, "ss", $id, $sDate);
						mysqli_stmt_execute($stmt);
						$createSession="CREATE TABLE `".$sLocation."_".$sDate."`(`childid` INT NOT NULL , INDEX (`childid`)) ENGINE = InnoDB;";
						mysqli_query($conn, $createSession);
						$setConstraint="ALTER TABLE `".$sLocation."_".$sDate."` ADD CONSTRAINT `child id` FOREIGN KEY (`childid`) REFERENCES `userinformation`.`participantinformation`(`childid`) ON DELETE RESTRICT ON UPDATE RESTRICT;";
						mysqli_query($conn, $setConstraint);
						header("Location:../AdminMain.php?createSession=success&sessionid=".$sessionid."&Date=".$sDate."");
						exit();
					 }
				 }
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
else{
	header("Location:../AdminMain.php");
	exit();	
}