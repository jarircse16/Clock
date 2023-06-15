<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="script.js"></script>
	<style>
        body {
            color: white;
        }
    </style>
</head>
<body style="background-image: url('background.jpg');" background-repeat: no-repeat background-size: cover>
    <br><br><br><br><br><br><h1>Home</h1>
    <nav>
        <a href="stopwatch.php">Stopwatch</a>
        <a href="clock.php">Clock</a>
        <a href="timer.php">Timer</a>
        <a href="worldclock.php">World Clock</a>
    </nav>
    <br>
    <center><a href="logout.php">Logout</a></center>
</body>
</html>
