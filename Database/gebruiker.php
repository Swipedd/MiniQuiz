<?php
require "db.php";

class gebruiker extends DB
{

    // Gebruiker registreren
    public function register($naam, $achternaam, $email, $wachtwoord)
    {
        $this->run("INSERT INTO gebruiker (naam, achternaam, email, wachtwoord, functie) 
        VALUES (:naam, :achternaam, :email, :wachtwoord, :functie)", [
            "naam" => $naam,
            "achternaam" => $achternaam,
            "email" => $email,
            "wachtwoord" => password_hash($wachtwoord, PASSWORD_DEFAULT),
            "functie" => "gebruiker"
        ]);
    }

    // Gebruiker inloggen
    public function login($email, $wachtwoord)
    {
        $gebruiker = $this->run("SELECT * FROM gebruiker WHERE email = :email", [
            "email" => $email
        ])->fetch();

        if ($gebruiker && password_verify($wachtwoord, $gebruiker['wachtwoord'])) {
            return $gebruiker;
        }

        return null;
    }

    // Haal gegevens op van gebruiker
    public function SelectGebruiker($id)
    {
        return $this->run("SELECT * FROM gebruiker WHERE id = :id", [
            "id" => $id
        ])->fetch();
    }

    // Wachtwoord updaten
    public function UpdateGebruiker($id, $wachtwoord)
    {
        $hashedWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
        return $this->run("UPDATE gebruiker SET wachtwoord = :wachtwoord WHERE id = :id", [
            "wachtwoord" => $hashedWachtwoord,
            "id" => $id
        ]);
    }
}
