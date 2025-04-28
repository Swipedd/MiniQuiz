<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultaten</title>
</head>

<body>
    <h1>Hier kan je resultaten zien</h1>

    <?php if (isset($_SESSION['score'])): ?>
        <p>Je score is: <?= htmlspecialchars($_SESSION['score']) ?></p>
        <?php unset($_SESSION['score']); // Verwijder de score na weergave 
        ?>
    <?php else: ?>
        <p>Geen resultaten beschikbaar.</p>
    <?php endif; ?>

    <table class="ResultView">
        <tr>
            <th> </th>
        </tr>
    </table>
</body>

</html>