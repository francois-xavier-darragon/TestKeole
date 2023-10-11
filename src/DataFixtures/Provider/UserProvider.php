<?php

namespace App\DataFixtures\Provider;

class UserProvider
{
    public static function UserFirstName()
    {
        $prenom = [
            'Martin', 'Jean-Luc', 'Franck', 'Denis', 'Georges', 'Tom', 'Félicien', 'Paul', 'Morgan', 'Thomas',
            'François-Xavier', 'Philippe', 'Arnaud', 'Lucien', 'Michel', 'Jacques', 'Fabien', 'Pascal', 'Benjamin', 'Luc',
            'Agnès', 'Sarah', 'Elsa', 'Julie', 'Adeline', 'Noémie', 'Delphine', 'Jessica', 'Audrey', 'Lucie',
            'Isabelle', 'Laura', 'Juliette', 'Alison', 'Celia', 'Sophie', 'Hélène', 'Gwendoline', 'Marina', 'Léa'
        ];
        shuffle($prenom);
        return $prenom[0];
    }

    public static function UserLastName()
    {
        $nom = [
            'Varda', 'Coppola', 'Jenkins', 'Wachowski', 'Wang', 'Dupont', 'Pereira', 'Vincent', 'Facci', 'Lacroix',
            'Labaquère', 'Henry', 'Rodrigues', 'Di Palma', 'De Marcillac', 'Lortz', 'Schwartz', 'Chevalier', 'Meyer', 'De Oliveira',
            'Dumeil', 'Olezsak', 'Prost', 'Etienne', 'Dugrillon', 'Dubourg', 'Bocaut', 'Faure', 'Sanders', 'Müller',
            'Canziani', 'Darnis', 'Gillet', 'Rudelle', 'Rebelle', 'Calvi', 'Pitre', 'Charpentier', 'Laval', 'Gilles'
        ];
        shuffle($nom);
        return $nom[0];
    }
}