<?php

    require_once "Baza.php";

    class Korisnik extends Baza
    {

        private $name = "Aleksandar";

        public function getName()
        {
            return $this->name;
        }

        public function setName($newName)
        {
            $this->name = ucfirst($newName);
        }

        public function register($email, $password)
        {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $email = $this->sql->real_escape_string($email);
            $password = $this->sql->real_escape_string($password);
            $this->sql->query("INSERT INTO korisnici (email, sifra) VALUES ('$email', '$password')");
        }

        public function emailExists($email)
        {
            $email = $this->sql->real_escape_string($email);
            $result = $this->sql->query("SELECT * FROM korisnici WHERE email = '$email'");

            if($result->num_rows)
            {
                return true;
            } else 
            {
                return false;
            }
        }

        public function delete($email)
        {
            $email = $this->sql->real_escape_string($email);

            $this->sql->query("DELETE FROM korisnici WHERE email = '$email'");
        }
        // $userEmailk - email korisnika koga zelimo trenutno promeniti
        // $email - nova email adresa
        public function update($userEmail, $email, $password)
        {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $email = $this->sql->real_escape_string($email);
            $password = $this->sql->real_escape_string($password);
            $userEmail = $this->sql->real_escape_string($userEmail);

            $this->sql->query("UPDATE korisnici SET email = '$email', sifra = '$password' WHERE email = '$userEmail'");
        }

    }