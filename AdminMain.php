<?php
	session_start();
	if($_SESSION["AdminStatus"] != "1"){
		header("Location:../Website1.php?error=unauthorizeduser");	
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Pop-up Sports</title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
	
</head>
<body>
    <div class="tabbar" id="home">
        <img src="resources/Pop-Up Sports Logo.png" style="float:left;left:14%;position:relative;bottom:2px;" />
        <a href="https://en-gb.facebook.com/popupsports1/"><img class="socialIcon" src="resources/facebookIcon.png" /></a>
        <div class="tabItem">
            <a href="Website1.php#home">Home</a>
            <a href="Website1.php#about">About</a>
            <a href="Website1.php#contact">Contact Us</a>
			<?php
				if(isset($_SESSION["fName"])){
					echo "<form action='common/logout.php' method='post'>
							<button style='color: black;float: left;padding: 4px 12px;font-size: 18px;text-align: center;border-color: #d9d9d9;border-right: solid;position: relative;left: 270pt;top: 7pt;transition:0.3s;' type='submit' name='logout-submit'>Logout</button>
						  </form>";
				}
			?>
		</div>
        <div class="bookNow">
            <a href="RegisterWebsite1.php">Book Now</a>
        </div>
	</div>
	<form style ="width:200pt;height:auto;margin-left:50pt;margin-top:50pt; padding:20px;"action="common/createSession.php" method="post">
		<label for="sLocation">Session Location</label>
		<br>
        <input style="margin-top:5px;" type="text" id="sLocation" name="sLocation" />
		<br>

        <label for="sSize">Session Size</label>
		<br>
        <input style="margin-top:5px;" type="integer" id="sSize" name="sSize" />
		<br>
		<label for="sDate">Date Chooser</label>
		<br>
        <input style="margin-top:5px;" type="date" id="sDates" name="sDate" />

		<br>
		<button style="margin-top:5px;" type="submit" name="CreateSession">Create Session</button>
	</form>
	<form style ="width:200pt;height:auto;margin-left:50pt;margin-top:50pt; padding:20px;"action="common/returnDetails.php" method="post">
		<label for="cheLocation">Session Location</label>
		<br>
        <input style="margin-top:5px;" type="text" id="cheLocation" name="cheLocation" />
		<br>
		<label for="cheDate">Date Chooser</label>
		<br>
        <input style="margin-top:5px;" type="date" id="cheDate" name="cheDate" />
		<br>
		<button style="margin-top:5px;" type="submit" name="returnDetails">Return Details</button>
	</form>
    <div class="backgrounda">
	<?php
	if(isset($_SESSION["data"])){
		echo "<table style='border:1px solid black;padding:100pt;background-color:white;'>";
		echo "<th style='border:1px solid black'>e-mail address</th>";
		echo "<th style='border:1px solid black'>Child Name</th>";
		foreach($_SESSION["data"] as $key => $row) {
			
			echo "<tr>";
				
				echo "<td style='border:1px solid black'>" . $row[0] . "</td>";
				
				echo "<td style='border:1px solid black'>" . $row[1] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	?>
</body>
</html>