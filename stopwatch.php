
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
    <title>Stopwatch</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-image: url('background.jpg');" background-repeat: no-repeat background-size: cover>
    <div id="stopwatch">
       <br><br><br><br><br><br> <div id="display">00:00:00</div>
        <button id="startBtn">Start</button>
        <button id="splitBtn">Split Time</button>
        <button id="lapBtn">Lap Time</button>
        <button id="resetBtn">Reset</button>
        <ul id="splits"></ul>
        <button id="backBtn">Back</button>
    </div>

    <script src="script.js"></script>
    <script>
        document.getElementById("backBtn").addEventListener("click", function() {
            window.location.href = "index.php";
        });
    </script>
</body>
</html>
