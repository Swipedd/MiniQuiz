<?php
require "db.php";

class gebruiker extends DB {

    // Gebruiker registreren
    public function register($naam, $achternaam, $email, $wachtwoord) {
        $this->run("INSERT INTO gebruiker (naam, achternaam) VALUES (:naam, :achternaam)", [
            "naam" => $naam,
            "achternaam" => $achternaam
        ]);

        // Haal laatste ID op
        $gebruiker_id = $this->pdo->lastInsertId();
        $hashedwachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

        // voeg dat de gebruiker_id inloggen tabel is toegevoegd
        return $this->run("INSERT INTO inloggen (gebruiker_id, email, wachtwoord, functie) 
                           VALUES (:gebruiker_id, :email, :wachtwoord, :functie)", [
            "gebruiker_id" => $gebruiker_id,
            "email" => $email,
            "wachtwoord" => $hashedwachtwoord,
            "functie" => "gebruiker"
        ]);
    }

    // Gebruiker inloggen
    public function login($email, $wachtwoord) {
        $gebruiker = $this->run("SELECT * FROM inloggen WHERE email = :email", [
            "email" => $email
        ])->fetch();

        if ($gebruiker && password_verify($wachtwoord, $gebruiker['wachtwoord'])) {
            return $gebruiker;
        }

        return null;
    }

    // Haal gegevens op van gebruiker
    public function SelectGebruiker($id) {
        return $this->run("SELECT * FROM gebruiker WHERE id = :id", [
            "id" => $id
        ])->fetch();
    }

    // Wachtwoord updaten
    public function UpdateGebruiker($id, $wachtwoord) {
        $hashedWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
        return $this->run("UPDATE inloggen SET wachtwoord = :wachtwoord WHERE gebruiker_id = :id", [
            "wachtwoord" => $hashedWachtwoord,
            "id" => $id
        ]);
    }
}
?>
