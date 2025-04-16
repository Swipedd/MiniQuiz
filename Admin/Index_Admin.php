<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Index_Admin.css">
    <title>Admin</title>
</head>

<body>
    <div class="container">
        <h1>Welkom
            <?php
            if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true) {
                echo htmlspecialchars($_SESSION['naam'] . ' ' . $_SESSION['achternaam']);
            }
            ?>!
        </h1>

        <button class="Onderwerp"><a href="Add_Onderwerp.php">Toevoeg Onderwerp</a></button>
        <button class="Update"><a href="Update.php">Update</a></button>
        <button class="Overzicht"><a href="Overzicht.php">Overzicht</a></button>
        <button class="Logout"><a href="../Authenticatie/Login.php">Logout</a></button>
    </div>
</body>

</html>