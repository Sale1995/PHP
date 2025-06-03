<?php

    class Baza
    {
        const HOST = "localhost";
        const DB_USER = "root";
        const PASSWORD = "root";
        const DB_NAME = "web_shop";

        protected $sql;

        public function __construct() 
        {
            $this->sql =  mysqli_connect(self::HOST, self::DB_USER, self::PASSWORD, self::DB_NAME);
        }

    
    }