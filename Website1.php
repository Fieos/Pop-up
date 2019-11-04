<?php
	session_start();
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
    <ul class="navigator">
        <li><a href="#home" class="list-item">Home</a></li>
        <li><a href="#about" class="list-item">About</a></li>
        <li><a href="#contact" class="list-item">Contact Us</a></li>
    </ul>
    <div class="tabbar" id="home">
        <img src="resources/Pop-Up Sports Logo.png" style="float:left;left:14%;position:relative;bottom:2px;" />
        <a href="https://en-gb.facebook.com/popupsports1/"><img class="socialIcon" src="resources/facebookIcon.png" /></a>
        <div class="tabItem">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#contact">Contact Us</a>
			<?php
				if(isset($_SESSION["fName"])){
					echo "<form action='common/logout.php' method='post'>
							<button style='color: black;margin-left:80px;float: left;padding: 4px 12px;font-size: 18px;text-align: center;border-color: #d9d9d9;border-right: solid;position: relative;left: 270pt;top: 5pt;transition:0.3s;' type='submit' name='logout-submit'>Logout</button>
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
				if(isset($_SESSION["AdminStatus"])){
					if($_SESSION["AdminStatus"]=="1"){
						echo"<form action='AdminMain.php' method='post'>
								<button style='margin-left:50px;color: black;float: left;padding: 4px 12px;font-size: 18px;text-align: center;border-color: #d9d9d9;border-right: solid;position: relative;left: 270pt;top: 5pt;transition:0.3s;' type='submit' name='logout-submit'>Admin Page</button>
							 </form>";
					}
				}	
			?>
		</div>
        <div class="bookNow">
            <a href="BookSessions.php">Book Now</a>
        </div>
    </div>
    <div class="backgrounda">
        <h1>Pop-up Sports</h1>
        <a href="RegisterWebsite1.php"><img src="resources/red splat.png" class="signupbtn"></a>
    </div>
        <div class="infobar" id="about">
            <h2>About Pop-up Sports</h2>
            <div class="infogroup">
                <img src="resources/Target.png" />
                <p>We like to do things a little differently here at Pop-Up Sports whether that's pretending to be a slippery snake weaving in and out of cones or playing football in one of our giant inflatable sports pitches at one of our multi-sport camps.  </p>
            </div>
            <div class="infogroup">
                <img src="resources/Target.png" />
                <p>We are a sports coaching company running several sports at schools, holiday camps and events for children between the ages of 5 to 12. Our main goal in all our lessons is to ensure all the children have a great time whilst also learning and improving in each sport we teach.</p>
            </div>
            <div class="infogroup">
                <img src="resources/Target.png" />
                <p>We take pride in our knowledge of each sport we offer, and we deliver the sport in a fun, engaging and professional manner. All our coaches hold the relevant sports qualifications and are first aid trained with an enhanced DBS check.</p>
            </div>
        </div>
        <div class="contactbar" id="contact">
            <h3>Contact Us!</h3>
            <img src="resources/Letter.png" />
            <p>Mobile Number: 0xxxxxxxxxx</p>
            <p>E-mail Address:info@pop-upsports.co.uk</p>
        </div>
    <div class="backgroundb">
        <p>test</p>
    </div>
</body>
</html>