<?php
require "../Database/Quiz.php";
$quiz = new Quiz();

// Haal de quizgegevens op
if (isset($_GET['id'])) {
    $quiz_id = $_GET['id'];
    $quiz_naam = $quiz->HaalQuizNaam($quiz_id);
    $quiz_vragen = $quiz->HaalQuizVragen($quiz_id);
} else {
    echo "Geen quiz ID opgegeven.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        $quiz->UpdateQuiz(
            $quiz_id,
            $_POST['quiz_naam'],
            $_POST['quiz_vraag'],
            $_POST['correct_antwoord'],
            $_POST['fout_antwoord'],
            $_POST['fout_antwoord1'],
            $_POST['fout_antwoord2']
        );

        echo "De quiz is succesvol geüpdatet!";
        header("refresh:2; url= Overzicht.php?quiz_id=" . $quiz_id);
        exit();
    } catch (Exception $e) {
        echo "Fout bij het updaten van de quiz: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Quiz</title>
</head>

<body>
    <h1>Update Quiz: <?= htmlspecialchars($quiz_naam) ?></h1>

    <form method="POST">
        <label for="quiz_naam">Quiznaam:</label>
        <input type="text" name="quiz_naam" value="<?= htmlspecialchars($quiz_naam) ?>" required>

        <label for="quiz_vraag">Quizvraag:</label>
        <input type="text" name="quiz_vraag" value="<?= htmlspecialchars($quiz_vragen['quiz_vraag']) ?>" required>

        <label for="correct_antwoord">Correct Antwoord:</label>
        <input type="text" name="correct_antwoord" value="<?= htmlspecialchars($quiz_vragen['correct_antwoord']) ?>" required>

        <label for="fout_antwoord">Fout Antwoord 1:</label>
        <input type="text" name="fout_antwoord" value="<?= htmlspecialchars($quiz_vragen['fout_antwoord']) ?>" required>

        <label for="fout_antwoord1">Fout Antwoord 2:</label>
        <input type="text" name="fout_antwoord1" value="<?= htmlspecialchars($quiz_vragen['fout_antwoord1']) ?>" required>

        <label for="fout_antwoord2">Fout Antwoord 3:</label>
        <input type="text" name="fout_antwoord2" value="<?= htmlspecialchars($quiz_vragen['fout_antwoord2']) ?>" required>

        <input type="submit" value="Quiz Updaten">
    </form>
</body>

</html>