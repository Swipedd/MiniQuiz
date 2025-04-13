<?php
require "../Database/Quiz.php";
$quiz = new Quiz();

$quiz_naam = $quiz->HaalQuizNaam($_GET['quiz_id']);
$quizvragen = $quiz->HaalQuizVragen($_GET['quiz_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht</title>
</head>

<body>
    <h1>Overzicht</h1>

    <table class="Overzicht" border="1">
        <tr>
            <th>ID</th>
            <th>Onderwerp</th>
            <th>Vraag</th>
            <th>Antwoord A</th>
            <th>Antwoord B</th>
            <th>Antwoord C</th>
            <th>Antwoord D</th>
            <th>Correcte Antwoord</th>
            <th colspan="2">Knoppen</th>
        </tr>
        <?php
        foreach ($quizvragen as $quiz) {
            echo "<tr>";
            echo "<td>" . $quiz['id'] . "</td>";
            echo "<td>" . $quiz_naam . "</td>";
            echo "<td>" . $quiz['quiz_vraag'] . "</td>";
            echo "<td>" . $quiz['correct_antwoord'] . "</td>";
            echo "<td>" . $quiz['fout_antwoord'] . "</td>";
            echo "<td>" . $quiz['fout_antwoord1'] . "</td>";
            echo "<td>" . $quiz['fout_antwoord2'] . "</td>";
            echo "<td>" . $quiz['correct_antwoord'] . "</td>";
            echo "<td><a class='btn btn-success' href='Update.php?id=" . $quiz['id'] . "'>Update</a></td>";
            echo "<td><a class='btn btn-danger' href='Delete.php?id=" . $quiz['id'] . "'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>