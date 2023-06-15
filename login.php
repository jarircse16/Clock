<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $credentials = file("login_credentials.txt", FILE_IGNORE_NEW_LINES);

    foreach ($credentials as $credential) {
        list($storedUsername, $storedPassword) = explode(":", $credential);
        if ($username == $storedUsername && $password == $storedPassword) {
            $_SESSION["username"] = $username;
            header("Location: index.php");
            exit();
        }
    }

    // If login fails, redirect back to login page
    header("Location: login.html");
    exit();
}

// If already logged in, redirect to index.html
if (isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
?>
