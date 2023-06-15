
<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analog Clock</title>
    <link rel="stylesheet" href="style.css">
	<style>
		#clock {
             opacity: 0.3; /* Set the desired transparency value */
			 position: relative; /* Set the position to relative */
			 top: 155px; /* Adjust the top value as needed */
			 width: 200px; /* Set the desired width */
			 height: 200px; /* Set the desired height */
			 }
	</style>
</head>
<body style="background-image: url('background.jpg');" background-repeat: no-repeat background-size: cover>
    <div id="clock">
        <div id="digitalClock"></div>
        <div id="analogClock">
            <div id="hourHand"></div>
            <div id="minuteHand"></div>
            <div id="secondHand"></div>
        </div>
        <button id="backBtn">Back</button>
    </div>

    <script src="script.js"></script>
    <script>
        document.getElementById("backBtn").addEventListener("click", function() {
            window.location.href = "index.html";
        });
        
        // Get the current time and update the clock every second
        setInterval(updateClock, 1000);

        function updateClock() {
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();

            // Update digital clock
            document.getElementById("digitalClock").textContent = formatTime(hours) + ":" + formatTime(minutes) + ":" + formatTime(seconds);

            // Calculate the rotation angles for hour, minute, and second hands
            const hourRotation = (hours * 30) + (minutes * 0.5); // Each hour mark is 30 degrees (360 degrees / 12 hours = 30 degrees)
            const minuteRotation = (minutes * 6) + (seconds * 0.1); // Each minute mark is 6 degrees (360 degrees / 60 minutes = 6 degrees)
            const secondRotation = seconds * 6; // Each second mark is 6 degrees (360 degrees / 60 seconds = 6 degrees)

            // Apply the rotation angles to the clock hands
            document.getElementById("hourHand").style.transform = `rotate(${hourRotation}deg)`;
            document.getElementById("minuteHand").style.transform = `rotate(${minuteRotation}deg)`;
            document.getElementById("secondHand").style.transform = `rotate(${secondRotation}deg)`;
        }

        function formatTime(time) {
            return time.toString().padStart(2, "0");
        }
    </script>
	<script>
        document.getElementById("backBtn").addEventListener("click", function() {
            window.location.href = "index.php";
        });
    </script>
</body>
</html>
