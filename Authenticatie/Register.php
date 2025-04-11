<?php
require "../Database/gebruiker.php";

$message = "";

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $gebruiker = new Gebruiker();
        $gebruiker->register(
            $_POST['naam'], 
            $_POST['achternaam'],  
            $_POST['email'],
            $_POST['wachtwoord']
        );

        header("Location: ../Authenticatie/Login.php");
        exit;
    }
} catch (Exception $e) {
    $message = "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <link rel="stylesheet" href="../Css/Register.css">
</head>
<body>
    <div class="container">
        <?php if ($message) echo "<p>" . htmlspecialchars($message) . "</p>"; ?>
        
        <h1>Account aanmaken</h1>
        <form method="POST">
            <label for="naam">Naam:</label>
            <input type="text" name="naam" placeholder="naam" value="<?= htmlspecialchars($_POST['naam'] ?? '')?>" required>

            <label for="achternaam">Achternaam:</label>
            <input type="text" name="achternaam" placeholder="achternaam" value="<?= htmlspecialchars($_POST['achternaam'] ?? '')?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="email" value="<?= htmlspecialchars($_POST['email'] ?? '')?>" required>

            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" name="wachtwoord" placeholder="wachtwoord" required>

            <input type="submit" value="Account aanmaken">
        </form>
    </div>
</body>
</html>
