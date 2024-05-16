<?php
    $dsn = 'mysql:host=localhost;dbname=circuitfinal';
    $username_db = 'user_final';
    $password_db = 'pa55word';
    try {
    $db = new PDO($dsn, $username_db, $password_db);
    } catch (PDOException $e) {
    $error_message = $e->getMessage();
    
    exit();
    }
?>
