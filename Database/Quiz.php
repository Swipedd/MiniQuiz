<?php
require "db.php";

class Quiz extends DB
{

    public function MaakQuiz($quiz_naam)
    {
        $this->run("INSERT INTO quiznaam (quiz_naam) VALUES (:quiz_naam)", [
            "quiz_naam" => $quiz_naam
        ]);
        return $this->pdo->lastInsertId();
    }

    public function MaakVraag($quiz_id, $quiz_vraag, $correct_antwoord, $fout_antwoord, $fout_antwoord1, $fout_antwoord2)
    {
        $this->run("INSERT INTO quizvraag (quiz_id, quiz_vraag, correct_antwoord, fout_antwoord, fout_antwoord1, fout_antwoord2)
        VALUES (:quiz_id, :quiz_vraag, :correct_antwoord, :fout_antwoord, :fout_antwoord1, :fout_antwoord2)", [
            "quiz_id" => $quiz_id,
            "quiz_vraag" => $quiz_vraag,
            "correct_antwoord" => $correct_antwoord,
            "fout_antwoord" => $fout_antwoord,
            "fout_antwoord1" => $fout_antwoord1,
            "fout_antwoord2" => $fout_antwoord2
        ]);
    }

    public function HaalQuizNaam($quiz_id)
    {
        return $this->run("SELECT quiz_naam FROM quiznaam WHERE id = :id", [
            "id" => $quiz_id
        ])->fetchColumn();
    }

    public function HaalQuizVragen($quiz_id)
    {
        return $this->run("SELECT * FROM quizvraag WHERE quiz_id = :quiz_id", [
            "quiz_id" => $quiz_id
        ])->fetchAll(PDO::FETCH_ASSOC);
    }

    public function UpdateQuiz($id, $quiz_naam, $quiz_vraag, $correct_antwoord, $fout_antwoord, $fout_antwoord1, $fout_antwoord2)
    {
        $this->run("UPDATE quiznaam SET quiz_naam = :quiz_naam WHERE id = :id", [
            "id" => $id,
            "quiz_naam" => $quiz_naam
        ]);

        $this->run("UPDATE quizvraag SET quiz_vraag = :quiz_vraag, correct_antwoord = :correct_antwoord, fout_antwoord = :fout_antwoord, fout_antwoord1 = :fout_antwoord1, fout_antwoord2 = :fout_antwoord2 
        WHERE quiz_id = :quiz_id", [
            "quiz_id" => $id,
            "quiz_vraag" => $quiz_vraag,
            "correct_antwoord" => $correct_antwoord,
            "fout_antwoord" => $fout_antwoord,
            "fout_antwoord1" => $fout_antwoord1,
            "fout_antwoord2" => $fout_antwoord2
        ]);
    }

    public function DeleteQuiz($id)
    {
        $this->run("DELETE FROM quizvraag WHERE quiz_id = :id", [
            "id" => $id
        ]);

        $this->run("DELETE FROM quiznaam WHERE id = :id", [
            "id" => $id
        ]);
    }
}
