<?php
	session_start();
	require "common/dbhAdmin.php";
	$sql="SELECT table_name FROM information_schema.tables where table_name like '%-%' and table_schema='sessions';";
	$result = mysqli_query($conn, $sql);
	$data = array();
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
			$data[]=$row;
		}
	}
	foreach($data[0] as $value){
		array_push($data[0], $value);
	}
	$_SESSION["availableSessions"]=array_values($data);
	$test=$_SESSION["availableSessions"][0]['table_name'];
	$_SESSION["sizeof"] = sizeof($_SESSION["availableSessions"], 0);
	$_SESSION["JSONavailableSessions"]=json_encode($data);
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
				else{
					 echo"<div class='dropdown'>
					 		<a href='#home'>Login/register</a>
							<ul class='dropdown-content'>
								<li><a href='LoginWebsite1.php'style='padding-left:45px;padding-right:44px;border-right:hidden;border-top:solid;border-color: black;'>Login</a></li>
								<li><a href='RegisterWebsite1.php'style='padding-left:33px;padding-right:33px;border-right:hidden;border-top:solid;border-color: black;'>Register</a></li>
							</ul>
						  </div>";
				}
			?>
		</div>
        <div class="bookNow">
            <a href="RegisterWebsite1.php">Book Now</a>
        </div>
    </div>
	<form style ="" action="common/bookChild.php" method="post">
		<label for="cFName">Child First Name</label>
		<br>
        <input style="width:30%" type="text" id="cFName" name="cFName" />
		<br>
        <label for="cLName">Child Last Name</label>
		<br>
        <input style="width:30%" type="text" id="cLName" name="cLName" />
		<br>
		<label>Select list</label>
		<br>
             <select style="width:30%;" name = "availableSessions" id = "availableSessions">
				 <script language="javascript">
					 var sessions = {};
					 var count;
					 <?php
						echo "sessions= ".$_SESSION["JSONavailableSessions"].";";
						echo "count= ".$_SESSION["sizeof"].";";
					 ?>
					 for(var i =0; i<count; i++){
						var x = document.createElement("OPTION");
						x.setAttribute("name", "availableSessions");
						var t = document.createTextNode(sessions[i]["table_name"]);
						x.appendChild(t);
						document.getElementById("availableSessions").appendChild(x);
					 }
					 
				 </script>
             </select>
		<br>
		<button type="submit" name="bookChild">Book Session</button>
		<br>
	</form>
    <div class="backgrounda">
</body>
</html>