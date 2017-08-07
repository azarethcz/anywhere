<?php

namespace CMS\User;

use CMS\Database\Connection;

class Profile {
    
    private $database;
    
    public function __construct(Connection $database) {
        $this->database = $database;
    }
    
    public function show() {
        $sql = 'SELECT * FROM users';
        return $this->database->run($sql);
    }
    
    public function update($username,$email,$oldpassword,$newpassword,$verifypassword) {
        $sql = 'UPDATE users set username = ?, email = ?, password = ? WHERE id = ?';
        $sql2 = 'UPDATE users set username = ?, email = ? WHERE id = ?';
        $paramsOld = [$username,$email,$_SESSION['id']];
        $paramsNew = [$username,$email, password_hash($newpassword, PASSWORD_BCRYPT,["cost" => 12]),$_SESSION['id']];
        if(empty($oldpassword && $newpassword && $verifypassword)) {
           $this->database->query($sql2,$paramsOld);              
        } elseif($this->verifyPassword($oldpassword)){
            $this->database->query($sql,$paramsNew);
        }
    }
    
    public function verifyPassword($oldPassword) {
        $sql = 'SELECT * FROM users';
        $hash = $this->database->fetch($sql);
        if(password_verify($oldPassword, $hash['password'])) {
            return true;
        }
    }
    
}

