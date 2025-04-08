<?php
require "db.php";

Class Quiz extends DB{

    // Quiz naam bedenken
    public function MaakQuiz($naam){
        $this->run("INSERT INTO quiznaam (naam)
        VALUES (:naam)", [
            "naam" => $naam
        ]);
    }

    // Verzin de quiz vragen
    public function Maakvraag($quiz_id, $naam, $correct_antwoord, $fout_antwoord, $fout_antwoord1, $fout_antwoord2){
        $this->run("INSERT INTO quizvragen (quiz_id, naam, correct_antwoord, fout_antwoord, fout_antwoord1, fout_antwoord2)
        VALUES (:quiz_id, :naam, :correct_antwoord, :fout_antwoord, :fout_antwoord1, :fout_antwoord2)", [
            "quiz_id" => $quiz_id,
            "naam" => $naam,
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
}
?>