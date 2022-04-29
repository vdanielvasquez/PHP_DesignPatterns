<?php

class DBConnection{
    private function __construct(){
        echo "New DBConnection created \n";
    }

    public static function getInstance(){
        static $instance = null;
        if (null == $instance){
            $instance = new static();
        } else {
            echo "Using same DBConnection already created \n";
        }
        return $instance;
    }
}

$objectA = DBConnection::getInstance();
$objectB = DBConnection::getInstance();
$objectC = DBConnection::getInstance();
