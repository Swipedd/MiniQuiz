<?php
require "db.php";

Class Quiz extends DB{

    // Quiz naam bedenken
    public function MaakQuiz($quiz_naam){
        $this->run("INSERT INTO quiznaam (quiz_naam)
        VALUES (:quiz_naam)", [
            "quiz_naam" => $quiz_naam
        ]);
    }

    // Verzin de quiz vragen
    public function Maakvraag($quiz_id, $quiz_vraag, $correct_antwoord, $fout_antwoord, $fout_antwoord1, $fout_antwoord2){
        $this->run("INSERT INTO quizvragen (quiz_id, naam, correct_antwoord, fout_antwoord, fout_antwoord1, fout_antwoord2)
        VALUES (:quiz_id, :naam, :correct_antwoord, :fout_antwoord, :fout_antwoord1, :fout_antwoord2)", [
            "quiz_id" => $quiz_id,
            "naam" => $quiz_vraag,
            "correct_antwoord" => $correct_antwoord,
            "fout_antwoord" => $fout_antwoord,
            "fout_antwoord1" => $fout_antwoord1,
            "fout_antwoord2" => $fout_antwoord2
        ]);
    }

    // quiz vraag/onderwerp ophalen
    public function HaalQuizOp($quiz_id){
        return $this->run("SELECT naam FROM quiznaam WHERE quiz_id = :quiz_id", [
            "quiz_id" => $quiz_id
        ])->fetchAll(PDO::FETCH_ASSOC);
    }

    // quiz Update
    public function UpdateQuiz($id, $quiz_naam, $quiz_vraag, $correct_antwoord, $fout_antwoord, $fout_antwoord1, $fout_antwoord2){
        $this->run("UPDATE quiznaam SET naam = :quiz_naam WHERE id = :id", [
            "id" => $id,
            "quiz_naam" => $quiz_naam
        ]);

        $this->run("UPDATE quizvragen SET naam = :quiz_vraag, correct_antwoord = :correct_antwoord, fout_antwoord = :fout_antwoord, fout_antwoord1 = :fout_antwoord1, fout_antwoord2 = :fout_antwoord2 
        WHERE quiz_id = :quiz_id", [
            "id" => $id,
            "quiz_vraag" => $quiz_vraag,
            "correct_antwoord" => $correct_antwoord,
            "fout_antwoord" => $fout_antwoord,
            "fout_antwoord1" => $fout_antwoord1,
            "fout_antwoord2" => $fout_antwoord2
        ]);
    }

    // quiz verwijderen
    public function VerwijderQuiz($id){
        $this->run("DELETE FROM quiznaam WHERE id = :id", [
            "id" => $id
        ]);

        $this->run("DELETE FROM quizvragen WHERE quiz_id = :id", [
            "id" => $id
        ]);
    }
}
?>