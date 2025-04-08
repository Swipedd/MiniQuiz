<?php
require "../Database/Quiz.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Vragen</title>
</head>
<body>
    <h1>Overzicht vragen</h1>
    
    <table class="OverzichtQuiz" border="1">
        <tr>
            <th>ID</th>
            <th>Vraag</th>
            <th>Antwoord A</th>
            <th>Antwoord B</th>
            <th>Antwoord C</th>
            <th>Antwoord D</th>
            <th>Correcte Antwoord</th>
            <th colspan="2">Actie</th>
        </tr>
        <?php
        $quiz = new Quiz();
        $quizs = $quiz->HaalQuizOp($quiz_id);
        foreach ($quizs as $quiz) {
            echo "<tr>";
            echo "<td>" . $quiz['ID'] . "</td>";
            echo "<td>" . $quiz['Vraag'] . "</td>";
            echo "<td>" . $quiz['Antwoord A'] . "</td>";
            echo "<td>" . $quiz['Antwoord B'] . "</td>";
            echo "<td>" . $quiz['Antwoord C'] . "</td>";
            echo "<td>" . $quiz['Antwoord D'] . "</td>";
            echo "<td>" . $quiz['CorrecteAntwoord'] . "</td>";
            echo "<td><a class='btn btn-success' href='bewerken.php?id=" . $quiz['ID'] . "'>Bewerken</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
