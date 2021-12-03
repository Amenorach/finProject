<?php
//connect to database class
require_once (dirname(__FILE__)).'/../settings/db_class.php';

class User extends db_connection {
    // registers new user
    public function register($name, $telephone, $email, $pass){
        $sql = "INSERT INTO `users`(`name`, `telephone`,`email`, `password` ) VALUES ('$name', '$telephone', '$email', '$pass')";

        return $this->db_query($sql);

    }
}