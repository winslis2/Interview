<?php
class SingleTon {
    private static $instance = null;
    private function __construct() {
        echo 'not allowed';
    }
    
    private function __clone() {
        echo 'not allowed';
    }

    public static function getInstance() {
        if(self::$instance) {
            return self::$instance;
        }else {
            return new self;
        }
    }
}