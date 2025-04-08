<?php
require "../Database/Quiz.php";

$message = "";

try{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $quiz = new Quiz();
        $quiz->MaakQuiz(
            $_POST['quiz_naam']
        );

        echo "Je onderwerp is gemaakt. Je word nu verzonden naar de Quizvraag pagina";
        header("Refresh:3; url=Add_Vraag.php");
        exit;
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
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1>Hier kan je onderwerp toevoegen</h1>

    <form method="POST">
    <?php if ($message) echo "<p>" . htmlspecialchars($message) . "</p>"; ?>
        <label for="quiz_naam'">Onderwerp:</label>
        <input type="text" name="quiz_naam'" placeholder="onderwerp" value="<?= htmlspecialchars($_POST['quiz_naam'] ?? '')?>" required>
        <input type="submit" value="Onderwerp aanmaken">
    </form>
    </div>
</body>
</html>