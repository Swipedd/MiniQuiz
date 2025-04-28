<?php
session_start();
require "../Database/Quiz.php";
$quiz = new Quiz();

$quiz_id = $_POST['quiz_id'];
$vragen = $quiz->HaalQuizVragen($quiz_id);
$score = 0;

foreach ($vragen as $index => $vraag) {
    if ($_POST["vraag_$index"] == $vraag['correct_antwoord']) {
        $score++;
    }
}

// Sla de score op in de sessie
$_SESSION['score'] = $score;

// Redirect naar de resultatenpagina
header("Location: Result.php");
exit();
