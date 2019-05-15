<?php
    class Hash{
        public static function make($password){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            return $hash;
        }
    }
?>