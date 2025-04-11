<?php
require "../Database/Quiz.php";

$message = "";

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $quiz = new Quiz();
        $quiz->MaakVraag(
            $_POST['quiz_id'],
            $_POST['quiz_vraag'],
            $_POST['correct_antwoord'],
            $_POST['fout_antwoord'],
            $_POST['fout_antwoord1'],
            $_POST['fout_antwoord2']
        );
        echo "Je vraag en antwoorden zijn toegevoegd!";
        header("refresh:3; url=Overzicht.php?quiz_id=" . $_POST['quiz_id']);
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
    <title>Quizvraag Toevoegen</title>
</head>
<body>
    <h1>Quizvraag Toevoegen</h1>
    <?php if ($message) echo "<p>" . htmlspecialchars($message) . "</p>"; ?>
    
    <form method="POST">

        <input type="hidden" name="quiz_id" value="<?= htmlspecialchars($_GET['quiz_id'] ?? '') ?>" required>

        <label for="quiz_vraag">Quizvraag:</label>
        <input type="text" name="quiz_vraag" required>

        <label for="correct_antwoord">Correct Antwoord:</label>
        <input type="text" name="correct_antwoord" required>

        <label for="fout_antwoord">Fout Antwoord 1:</label>
        <input type="text" name="fout_antwoord" required>

        <label for="fout_antwoord1">Fout Antwoord 2:</label>
        <input type="text" name="fout_antwoord1" required>

        <label for="fout_antwoord2">Fout Antwoord 3:</label>
        <input type="text" name="fout_antwoord2" required>

        <input type="submit" value="Vraag aanmaken">
    </form>
</body>
</html>
