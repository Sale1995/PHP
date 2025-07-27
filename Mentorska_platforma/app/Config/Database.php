<?php
namespace App\Config;

use PDO;

class Database
{
    public static function getConnection()
    {
        return new PDO("mysql:host=localhost;dbname=mentorska_platforma;charset=utf8", "root", "root");
    }
}
