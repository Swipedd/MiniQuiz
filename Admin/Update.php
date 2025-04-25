<?php
require "../Database/Quiz.php";
session_start();

// Check of quiz_id is meegegeven
if (!isset($_GET['quiz_id'])) {
    echo "Geen quiz geselecteerd.";
    header("refresh:2;url= Overzicht.php");
    exit;
}

$quiz_id = $_GET['quiz_id'];
$quiz = new Quiz();

// Haal quiznaam en vragen op
$quiz_naam = $quiz->HaalQuizNaam($quiz_id);
$quiz_vragen = $quiz->HaalQuizVragen($quiz_id);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nieuwe_quiz_naam = htmlspecialchars($_POST['quiz_naam']);
    $quiz_vraag = htmlspecialchars($_POST['quiz_vraag']);
    $correct_antwoord = htmlspecialchars($_POST['correct_antwoord']);
    $fout_antwoord = htmlspecialchars($_POST['fout_antwoord']);
    $fout_antwoord1 = htmlspecialchars($_POST['fout_antwoord1']);
    $fout_antwoord2 = htmlspecialchars($_POST['fout_antwoord2']);

    try {
        $quiz->UpdateQuiz($quiz_id, $nieuwe_quiz_naam, $quiz_vraag, $correct_antwoord, $fout_antwoord, $fout_antwoord1, $fout_antwoord2);
        echo "Quiz succesvol bijgewerkt!";
        header("refresh:2;url= Overzicht.php");
        exit;
    } catch (Exception $e) {
        echo "Fout bij bijwerken: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Quiz Bewerken</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <a class='btn btn-danger mb-4' href='../user/user-logout.php'>Logout</a>
    <h1>Quiz Bewerken</h1>

    <form method="POST">
        <div class="mb-3">
            <label for="quiz_naam" class="form-label">Quiznaam:</label>
            <input type="text" class="form-control" name="quiz_naam" value="<?= htmlspecialchars($quiz_naam) ?>" required>
        </div>

        <div class="mb-3">
            <label for="quiz_vraag" class="form-label">Quizvraag:</label>
            <input type="text" class="form-control" name="quiz_vraag" value="<?= htmlspecialchars($eersteVraag['quiz_vraag'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label for="correct_antwoord" class="form-label">Correct Antwoord:</label>
            <input type="text" class="form-control" name="correct_antwoord" value="<?= htmlspecialchars($eersteVraag['correct_antwoord'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label for="fout_antwoord" class="form-label">Fout Antwoord 1:</label>
            <input type="text" class="form-control" name="fout_antwoord" value="<?= htmlspecialchars($eersteVraag['fout_antwoord'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label for="fout_antwoord1" class="form-label">Fout Antwoord 2:</label>
            <input type="text" class="form-control" name="fout_antwoord1" value="<?= htmlspecialchars($eersteVraag['fout_antwoord1'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label for="fout_antwoord2" class="form-label">Fout Antwoord 3:</label>
            <input type="text" class="form-control" name="fout_antwoord2" value="<?= htmlspecialchars($eersteVraag['fout_antwoord2'] ?? '') ?>" required>
        </div>

        <input type="submit" class="btn btn-primary" value="Quiz Updaten">
    </form>
</body>

</html>