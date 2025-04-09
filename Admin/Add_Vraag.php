<?php
require "../Database/Quiz.php";

$message = "";

try{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $quiz = new Quiz();
        $quiz->MaakVraag(
            $_POST['quiz_id'],
            $_POST['quiz_vraag'],
            $_POST['correct_antwoord'],
            $_POST['fout_antwoord'],
            $_POST['fout_antwoord1'],
            $_POST['fout_antwoord2']
        );
        $message = "Je vraag en antwoord is gemaakt. Je wordt nu verzonden naar de Overzicht pagina.";
        echo "<meta http-equiv='refresh' content='3;url=Overzicht_Vraag.php'>";
    }
}catch (Exception $e) {
    $message = "Error: " . $e->getMessage();
}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizvraag</title>
</head>
<body>
    <h1>Quizvraag Toevoegen</h1>
    <?php if ($message) echo "<p>" . htmlspecialchars($message) . "</p>"; ?>
    <form method="POST">
    
    <label for="quiz_id">Quiz ID:</label>
    <input type="number" name="quiz_id" placeholder="quiz id" value="<?= htmlspecialchars($_POST['quiz_id'] ?? '') ?>" required>

    <label for="quiz_vraag">Quizvraag:</label>
    <input type="text" name="quiz_vraag" placeholder="vraag" value="<?= htmlspecialchars($_POST['quiz_vraag'] ?? '')?>" required>
    
    <label for="correct_antwoord">Correct Antwoord:</label>
    <input type="text" name="correct_antwoord" placeholder="correct antwoord" value="<?= htmlspecialchars($_POST['correct_antwoord'] ?? '')?>" required>
    
    <label for="fout_antwoord">Fout Antwoord 1:</label>
    <input type="text" name="fout_antwoord" placeholder="fout antwoord" value="<?= htmlspecialchars($_POST['fout_antwoord'] ?? '')?>" required>
    
    <label for="fout_antwoord1">Fout Antwoord 2:</label>
    <input type="text" name="fout_antwoord1" placeholder="fout antwoord 1" value="<?= htmlspecialchars($_POST['fout_antwoord1'] ?? '')?>" required>
    
    <label for="fout_antwoord2">Fout Antwoord 3:</label>
    <input type="text" name="fout_antwoord2" placeholder="fout antwoord 2" value="<?= htmlspecialchars($_POST['fout_antwoord2'] ?? '')?>" required>
    
    <input type="submit" value="Vraag aanmaken">
</form>

</body>
</html>