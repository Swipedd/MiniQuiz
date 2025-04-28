<?php
require "../Database/Quiz.php";
session_start();
$quiz = new Quiz();

// Eerst het ID van de quiz 'Rekenen' ophalen
$quiz_id = $quiz->HaalQuizIdOpNaam('Rekenen');

// Alle vragen van deze quiz ophalen
$vragen = $quiz->HaalQuizVragen($quiz_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reken Quiz</title>
</head>

<body>
    <h1>Rekenen</h1>

    <?php if ($vragen): ?>
        <form method="POST" action="verwerk_reken_quiz.php">
            <?php foreach ($vragen as $index => $vraag): ?>
                <div>
                    <p><strong><?= htmlspecialchars($vraag['quiz_vraag']) ?></strong></p>
                    <?php
                    // Antwoorden random shuffelen
                    $antwoorden = [
                        $vraag['correct_antwoord'],
                        $vraag['fout_antwoord'],
                        $vraag['fout_antwoord1'],
                        $vraag['fout_antwoord2']
                    ];
                    shuffle($antwoorden);
                    ?>
                    <?php foreach ($antwoorden as $antwoord): ?>
                        <label>
                            <input type="radio" name="vraag_<?= $index ?>" value="<?= htmlspecialchars($antwoord) ?>" required>
                            <?= htmlspecialchars($antwoord) ?>
                        </label><br>
                    <?php endforeach; ?>
                </div>
                <br>
            <?php endforeach; ?>

            <input type="hidden" name="quiz_id" value="<?= htmlspecialchars($quiz_id) ?>">
            <button type="submit">Quiz Inleveren</button>
        </form>
    <?php else: ?>
        <p>Er zijn nog geen vragen voor deze quiz.</p>
    <?php endif; ?>
</body>

</html>