﻿<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<section class="HeadBar">
		<a href="Main.php"><img src="resources/Pop-Up Sports Logo.png"></a>
		<div class="NavigationItems">
			<ul class="NavigationItem">
				<li><a href="">Schools</a><li>
				<li class="dropcontent"><a href="Schools.php#Bookings">Bookings</a><li>
				<li class="dropcontent"><a href="Schools.php#Curricular">Curricular</a><li>
				<li class="dropcontent"><a href="Schools.php#ExtraCurricular">Extra-Curricular</a><li>
			</ul>
			<ul class="NavigationItem">
				<li><a href="">Camps</a><li>
				<li class="dropcontent"><a href="Camps.php#Bookings">Bookings</a><li>
				<li class="dropcontent"><a href="Camps.php#Venues">Venues</a><li>
			</ul>
			<ul class="NavigationItem">
				<li><a href="">Events</a><li>
				<li class="dropcontent"><a href="Events.php#Parties">Parties</a><li>
				<li class="dropcontent"><a href="Events.php#SportEvents">Sport Events</a><li>
			</ul>
			<ul class="NavigationItem">
				<li><a href="">Community</a><li>
				<li class="dropcontent"><a href="Community.php#Projects">Projects</a><li>
				<li class="dropcontent"><a href="Community.php#Blog">Blog</a><li>
			</ul>
			<ul class="NavigationItem">
				<li><a href="">About</a><li>
				<li class="dropcontent"><a href="About.php#Coaches">Coaches</a><li>
				<li class="dropcontent"><a href="About.php#Information">Information</a><li>
			</ul>
			<a class="NavigationItem2" href ="FindACamp.php">Find a Camp</a>
			<a class="LogRegBtn" id="LogRegBtn" href="#Login" onclick='showBox()'>Login/Register
			<img src="resources/Blank Profile.jpg"></a>
		</div>
	</section>
	<div class="LogRegBox" id="LogRegBox" >
		<a href="#" onclick="hideBox()" class="Cross" id="Cross"><img src ="resources/Cross.png"></a>
		<h1 id="LogHeading">Login</h1>
		<h1 id="RegHeading">Register</h1>
		<form id="LoginForm">
			<label for="EADDRESS">E-Mail Address</label>
			<input type="text" id="EADDRESS" name="EADDRESS" placeholder="someone@example.com">

			<label for="PASSWORD">Password</label>
			<input type="password" id="PASSWORD" name="PASSWORD" placeholder="Must be at least 8 characters">
		</form>
		<form id="RegisterForm" style="display:none;">
			<label for="EADDRESS">E-Mail Address</label>
			<input type="text" id="EADDRESS" name="EADDRESS" placeholder="someone@example.com">

			<label for="CONFEADDRESS">Confirm E-mail Address</label>
			<input type="text" id="CONFEADDRESS" name="CONFEADDRESS" placeholder="someone@example.com">

			<label for="PASSWORD">Password</label>
			<input type="password" id="PASSWORD" name="PASSWORD" placeholder="Must be at least 8 characters">

			<label for="CONFPASSWORD">Confirm Password</label>
			<input type="password" id="CONFPASSWORD" name="CONFPASSWORD" placeholder="Must be at least 8 characters">
		</form>
		<a id ="RegHere" href="#Register" onclick="register()" class="RegHere">Register Here!</a>
		<a id ="LogHere" href="#Login" onclick="showBox()" class="RegHere">Login</a>
		<script  type='text/javascript'>
			var LogRegBox = document.getElementById("LogRegBox");
			var form1 = document.getElementById("LoginForm");
			var form2 = document.getElementById("RegisterForm");
			var RegHeading = document.getElementById("RegHeading");
			var LogHeading = document.getElementById("LogHeading");
			var RegHere = document.getElementById("RegHere");
			var LogHere = document.getElementById("LogHere");
			function showBox(){
				LogRegBox.style.display = "flex";
				form1.style.display = "flex";
				form2.style.display ="none";
				RegHeading.style.display="none";
				LogHeading.style.display="flex";
				RegHere.style.display="flex";
				LogHere.style.display="none";
			}
			function hideBox(){
				LogRegBox.style.display = "none";
				form1.style.display = "flex";
				form2.style.display = "none";
				LogHeading.style.display="flex";
				RegHeading.style.display="none";
				LogHere.style.display="none";
				
			}
			function register(){
				form1.style.display = "none";
				form2.style.display = "flex";
				LogHeading.style.display="none";
				RegHeading.style.display="flex";
				RegHere.style.display="none";
				LogHere.style.display="flex";
			}
		</script>
	</div>
	<section class="content">

	</section>
</body>
</html>