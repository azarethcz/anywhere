<?php

namespace CMS\User;

use CMS\Database\Connection,
    CMS\User\IUser;

class User implements IUser {
    
    private $database;
    
    public function __construct(Connection $database) {
       $this->database = $database;
    }
       
    public function create($username,$email,$password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
        $sql = 'INSERT INTO users(username, email, password) VALUES (?,?,?)';
        $params = array($username,$email,$hashed_password);
            if($this->exist($username,$email)) {
                return $this->database->query($sql, $params);
            }
        echo '<div class="error-message">Uživatelské jméno nebo email již existuje.</div>';
        return false;
    }
    
    public function login($username,$password) {
        $sql = 'SELECT * FROM users WHERE username = ?';
        $params = array($username);
        $row = $this->database->fetch($sql,$params);
        $rowCount = $this->database->rowCount($sql,$params);
        if($rowCount > 0) {
            if(password_verify($password, $row['password'])) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                // $_SESSION['role'] = $row['role'];
                return true;
            }
        }
    }
    
    public function exist($username,$email) {
        $sql = 'SELECT * FROM users WHERE username = ? OR email = ?';
        $params = array($username,$email);
        $exist = $this->database->rowCount($sql,$params);
            if($exist != 0) {
                return false;
            }
        return true;
    }
    
    public function checkPassword($password,$confirmPassword) {
        if($password == $confirmPassword) {
            return true;
        }
    }

    public function isLoggedIn() {
        return (!empty($_SESSION['username']));
    }
    
    public function isAuthenticated() {
        
    }
    
    public function load() {
        $id = $_SESSION['id'];
        $sql = 'SELECT * FROM users WHERE id = ?';
        $params = [$id];
        return $this->database->fetch($sql,$params);
    }
    
    public function logout() {
        session_unset();
        session_destroy();
        header('Location:login.php');
    }

}
