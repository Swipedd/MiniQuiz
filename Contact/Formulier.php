<?php
require "../Database/Contact.php";

$message = "";

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $contact = new Contact();
        $contact->InsertContact(
            $_POST['naam'],
            $_POST['email'],
            $_POST['bericht']
        );

        echo "Je bericht is verzonden";
        header("Refresh:3; url=../Home/Index.php");
        exit;
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
    <title>Register</title>
    <link rel="stylesheet" href="../Css/Register.css">
</head>

<body>
    <div class="container">
        <?php if ($message) echo "<p>" . htmlspecialchars($message) . "</p>"; ?>

        <h1>Contact</h1>
        <form method="POST">
            <label for="naam">Naam:</label>
            <input type="text" name="naam" placeholder="naam" value="<?= htmlspecialchars($_POST['naam'] ?? '') ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>

            <label for="bericht">Bericht:</label>
            <input type="text" name="bericht" placeholder="hier kan je bericht typen" value="<?= htmlspecialchars($_POST['bericht'] ?? '') ?>" required>

            <input type="submit" value="Verzenden">
        </form>
    </div>
</body>

</html>