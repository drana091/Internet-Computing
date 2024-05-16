<?php
    $dsn = 'mysql:host=localhost;dbname=msu_movies';
    $username = 'mgs_user';
    $password = 'pa55word';
    try {
    $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
    $error_message = $e->getMessage();
    
    exit();
    }
?>
