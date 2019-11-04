<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Pop-up Sports</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body class="backgrounda" style="overflow-y:auto;">
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
            <a href="BookSessions.php">Book Now</a>
        </div>
    </div>
    <div class="register">
        <h2 style="text-align:center;">Login</h2>
        <form action="common/login.php" method="post">
            <label for="eMail">E-mail Address</label>
            <input type="text" id="eAddress" name="eAddress" />

            <label for="password">Password</label>
            <input type="password" id="password" name="password" />
			<p></p>
			<button type="submit" name="loginSubmit">Login</button>
        </form>


		<!--
		<form action="common/logout.php" method="post">
			<button type="submit" name="logoutSubmit">Logout</button>
		</form>-->
    </div>
</body>
</html>
