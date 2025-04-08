<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welkom Speler</h1>
    <p>Op deze site worden er hele moeilijke quizzes gesteld</p>

    <?php
    session_start();
    if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true) {
        // Laat de knop zien als de gebruiker is ingelogd
        echo '<button><a href="Quiz.php">Start Quiz</a></button>';
        echo '<button><a href="../Authenticatie/Logout.php">Logout</a></button>';
    } else {
        // Toon login en registratie knoppen als de gebruiker niet ingelogd is
        echo '<p>Je moet eerst inloggen of registreren om de quiz te starten.</p>';
        echo '<button><a href="../Authenticatie/Login.php">Login</a></button>';
        echo '<button><a href="../Authenticatie/Register.php">Registreer</a></button>';
    }
    ?>
</body>
</html>
