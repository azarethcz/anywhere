<?php

namespace CMS\Article;

use CMS\Database\Connection;

class Article {
    
    private $database;
    
    public function __construct(Connection $database) {
        $this->database = $database;
    }
    
    public function create($title,$url,$content) {
        $sql = 'INSERT INTO articles(title,url,content,created_at) VALUES (?,?,?,?)';
        $date = date('Y-m-d H:i:s');
        $params = [$title,$url,$content,$date];
        return $this->database->query($sql, $params);
    }
    
    public function edit($title,$url,$content) {
        $id = $_GET['id'];
        $sql = 'UPDATE articles SET title = ?, url = ?, content = ? WHERE id = ?';
        $params = [$title,$url,$content,$id];
        return $this->database->query($sql,$params);
    }
    
    public function load() {
        $id = $_GET['id'];
        $sql = 'SELECT * FROM articles WHERE id = ?';
        $params = [$id];
        return $this->database->fetch($sql,$params);
    }

    public function show(){
        $sql = 'SELECT * FROM articles';
        return $this->database->run($sql);
    }
    
    public function view() {
        foreach ($this->show() as $articles) {
            echo '<h3>'.$articles['title'].'</h3>';
            echo $articles['content'];
        }
    }
}

