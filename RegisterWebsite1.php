<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Pop-up Sports</title>
    <link rel='stylesheet' type='text/css' href='style.css'/>
</head>
<body class="backgrounda"  style="overflow-y:auto;">
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
    </div>
    <div class ="register">
        <h2 style="text-align:center;margin-bottom:0px;">Register</h2>
		<?php
			if(isset($_GET['error'])){
				if($_GET['error']=="emptyfields"){
				echo'<p class="errormessage">Please fill in all fields</p>';
				}
				else if($_GET['error']=="invalidpasseAddress"){
				echo'<p class="errormessage">Please enter a valid e-mail address and password</p>';
				}
				else if($_GET['error']=="invalidemail"){
				echo'<p class="errormessage">Please enter a valid email address</p>';
				}
				else if($_GET['error']=="invalidpass"){
				echo'<p class="errormessage">Please enter a valid password</p>';
				}
				else if($_GET['error']=="passnotmatch"){
				echo'<p class="errormessage"Please make sure your passwords match</p>';
				}
				else if($_GET['error']=="passnotmatch"){
				echo'<p class="errormessage">Please make sure your E-mails match</p>';
				}
				else if($_GET['error']=="emailtaken"){
				echo'<p class="errormessage">Sorry that e-mail address is taken</p>';
				}
			}
			
			else if(isset($_GET['register'])){
				if($_GET['register']=="success"){
					echo'<p class="errormessage">Register successful</p>';
				}
			}
		?>
        <form action="common/register.php" method="post">
            <label for="fName">First Name</label>
            <input type="text" id="fName" name="fName" />

            <label for="lName">Last Name</label>
            <input type="text" id="lName" name="lName" />

			<label for="pNumber">Phone Number</label>
            <input type="text" id="pNumber" name="pNumber" />

            <label for="eMail">E-mail Address</label>
            <input type="text" id="eMail" name="eMail" />

            <label for="confEMail">Confirm E-mail Address</label>
            <input type="text" id="confEMail" name="confEMail" />

            <label for="password">Password</label>
            <input type="password" id="password" name="password" />

            <label for="confPassword">Confirm Password</label>
            <input type="password" id="confPassword" name="confPassword" />
			<label class="styledBox" for="pPermission">Do you give permission for photographs to be taken of your child at our events?
			<input type="checkbox" id="pPermission" name ="pPermission" value="Yes" />
			</label>
			<button style="position:relative;display:block;left:40%;top:3%;" type="submit" name="registerSubmit">Register</button>
        </form>
    </div>
</body>
</html>