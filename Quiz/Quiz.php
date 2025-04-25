<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Quiz.css">
    <title>Quiz</title>
</head>

<body>
    <header>
        <div class="top-buttons">
            <button class="uitloggen" onclick="buttonClick()">Uitloggen</button>
            <button class="profiel"><a href="../Profiel/Profiel.php">Profiel</a></button>
        </div>
    </header>

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
        <p>Ben je ready voor de vragen?</p>
        <button onclick="msg();window.location.href='https://www.google.com/search?q=great+job'">JA</button>
        <button onclick="msg1();window.location.href='https://www.google.com/search?q=ga+leren+'">NEE</button>
    </div>

    <div class="Vragen">
        <button onclick="buttonVraag()">Rekenen</button>
    </div>

    <!-- Javascript -->
    <script src="../Javascript/Quiz.js"></script>
</body>

</html>