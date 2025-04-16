<?php
require "../Database/gebruiker.php";

$message = "";
session_start();
$gebruiker = new Gebruiker();
$result = $gebruiker->SelectGebruiker($_SESSION['gebruikerid']);

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            // Data verzamelen
            $naam = $_POST['naam'];
            $achternaam = $_POST['achternaam'];
            $email = $_POST['email'];
            $wachtwoord = $_POST['wachtwoord'];

            // Update user information
            $gebruiker->UpdateGebruiker($_SESSION['gebruikerid'], $wachtwoord);
            echo "Je wachtwoord word geupdate";
            header("Refresh:3; url=../Authenticatie/Login.php");
            exit;
        } catch (Exception $e) {
            $message = "Error: " . $e->getMessage();
        }
    }
} catch (Exception $e) {
    $message = "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Register.css">
    <title>Profiel</title>
</head>

<body>
    <div class="container">
        <h1>Profiel</h1>
        <?php if ($message) echo "<p>$message</p>"; ?>
        <form method="POST">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" value="<?php echo htmlspecialchars($_SESSION['naam']); ?>" required>

            <label for="achternaam">Achternaam:</label>
            <input type="text" id="achternaam" name="achternaam" value="<?php echo htmlspecialchars($_SESSION['achternaam']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?>" required>

            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required>

            <input type="submit" value="Updaten">
        </form>
    </div>
</body>

</html>