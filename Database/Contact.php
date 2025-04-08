<?php
require "db.php";

class Contact extends DB{

    // Hier kan je contactformulier invullen
    public function InsertContact($naam, $email, $bericht){
        $this->run("INSERT INTO contact (naam, email, bericht) VALUES (:naam, :email, :bericht)", [
            'naam' => $naam,
            'email' => $email,
            'bericht' => $bericht
        ]);
    }

    // als admin zijnde kan je de contactformulieren bekijken
    public function GetContact(){
        return $this->run("SELECT * FROM contact")->fetchAll();
    }
}

?>