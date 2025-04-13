<?php
require "../Database/Quiz.php";

$quiz = new Quiz();

if (isset($_POST['delete'])) {
    $quiz->deleteQuiz($_POST['id']);
    echo "Het is verwijderd!";
    header("refresh:3; url=:Overzicht.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>

<body>
    <h1>Hier kan je alles gaan deleten</h1>
</body>

</html>