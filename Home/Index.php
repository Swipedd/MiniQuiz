<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Index.css">
    <title>Home</title>
</head>
<body>
<div class="container">
    <h1>Welkom 
        <?php 
        if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true) {
            echo htmlspecialchars($_SESSION['naam'] . ' ' . $_SESSION['achternaam']);

        } else {
            echo "Gast";
        }
        ?>!
    </h1>
    <p>Op deze site worden er hele moeilijke quizzes gesteld</p>
    
    <?php
    if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true) {
        // Laat de knop zien als de gebruiker is ingelogd
        echo '<button class ="Begin"><a href="../Quiz/Quiz.php">Start Quiz</a></button>';
        echo '<button class="logout"><a href="../Authenticatie/Login.php">Logout</a></button>';
    } else {
        // Toon login en registratie knoppen als de gebruiker niet ingelogd is
        echo '<p>Je moet eerst inloggen of registreren om de quiz te starten.</p>';
        echo '<button><a href="../Authenticatie/Login.php">Login</a></button>';
        echo '<button><a href="../Authenticatie/Register.php">Registreer</a></button>';
    } 
    ?>
<br>
<button><a href="../Meer weten/About.php">Wil je meer weten klik hier op!</a></button>
</div>    

</body>
</html>
