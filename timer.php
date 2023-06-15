<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE HTML>
<html>
<head>
<style>
body {
	text-align: center;
	background: #00ECB9;
	font-family: sans-serif;
	font-weight: 100;
}
h1 {
	color: #396;
	font-weight: 100;
	font-size: 40px;
	margin: 40px 0px 20px;
}
#clockdiv {
	font-family: sans-serif;
	color: #fff;
	display: inline-block;
	font-weight: 100;
	text-align: center;
	font-size: 30px;
}
#clockdiv > div {
	padding: 10px;
	border-radius: 3px;
	background: #00BF96;
	display: inline-block;
}
#clockdiv div > span {
	padding: 15px;
	border-radius: 3px;
	background: #00816A;
	display: inline-block;
}
smalltext {
	padding-top: 5px;
	font-size: 16px;
}
</style>
</head>
<body style="background-image: url('background.jpg');" background-repeat: no-repeat background-size: cover>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1>Countdown Clock</h1>
<div id="clockdiv">
	<div>
		<span class="days" id="day"></span>
		<div class="smalltext">Days</div>
	</div>
	<div>
		<span class="hours" id="hour"></span>
		<div class="smalltext">Hours</div>
	</div>
	<div>
		<span class="minutes" id="minute"></span>
		<div class="smalltext">Minutes</div>
	</div>
	<div>
		<span class="seconds" id="second"></span>
		<div class="smalltext">Seconds</div>
	</div>
</div>

<p id="demo"></p>

<input type="number" id="yearInput" placeholder="Year">
<input type="number" id="monthInput" placeholder="Month">
<input type="number" id="dayInput" placeholder="Day">
<input type="number" id="hourInput" placeholder="Hour">
<input type="number" id="minuteInput" placeholder="Minute">
<input type="number" id="secondInput" placeholder="Second">
<button onclick="startCountdown()">Start Countdown</button>

<p>Or</p>

<input type="number" id="customTimerInput" placeholder="Custom Timer (in minutes)">
<button onclick="startCustomCountdown()">Start Custom Countdown</button>

<audio id="alarmSound" src="alarm_sound.mp3" preload="auto"></audio>

<script>
function startCountdown() {
	var year = parseInt(document.getElementById("yearInput").value);
	var month = parseInt(document.getElementById("monthInput").value) - 1; // Month is 0-based in JavaScript
	var day = parseInt(document.getElementById("dayInput").value);
	var hour = parseInt(document.getElementById("hourInput").value);
	var minute = parseInt(document.getElementById("minuteInput").value);
	var second = parseInt(document.getElementById("secondInput").value);

	// Validate inputs
	if (isNaN(year) || isNaN(month) || isNaN(day) || isNaN(hour) || isNaN(minute) || isNaN(second)) {
		alert("Please enter valid numbers for all input fields.");
		return;
	}

	var deadline = new Date(year, month, day, hour, minute, second).getTime();

	// Check if the entered date is valid
	if (isNaN(deadline)) {
		alert("Invalid deadline. Please enter a valid date and time.");
		return;
	}

	startTimer(deadline);
}

function startCustomCountdown() {
	var customTimerMinutes = parseInt(document.getElementById("customTimerInput").value);

	// Validate input
	if (isNaN(customTimerMinutes)) {
		alert("Please enter a valid number for the custom timer.");
		return;
	}

	var currentTime = new Date().getTime();
	var deadline = currentTime + customTimerMinutes * 60000; // Convert minutes to milliseconds

	startTimer(deadline);
}

function startTimer(deadline) {
	var x = setInterval(function() {
		var now = new Date().getTime();
		var t = deadline - now;
		var days = Math.floor(t / (1000 * 60 * 60 * 24));
		var hours = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((t % (1000 * 60)) / 1000);
		document.getElementById("day").innerHTML = days;
		document.getElementById("hour").innerHTML = hours;
		document.getElementById("minute").innerHTML = minutes;
		document.getElementById("second").innerHTML = seconds;
		if (t < 0) {
			clearInterval(x);
			document.getElementById("demo").innerHTML = "TIME UP";
			document.getElementById("day").innerHTML = '0';
			document.getElementById("hour").innerHTML = '0';
			document.getElementById("minute").innerHTML = '0';
			document.getElementById("second").innerHTML = '0';

			// Play alarm sound
			document.getElementById("alarmSound").play();
		}
	}, 1000);
}
</script>
<br><br>
 </div>
        <button id="backBtn"><a href=index.php>Back</a></button>
    </div>
</body>
</html>
