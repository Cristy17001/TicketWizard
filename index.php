<?php
/*
    echo 'entrei';
    $name= $_GET["name"];
    $username= $_GET["username"];
    $email= $_GET["email"];
    try{
        $db = new PDO('sqlite:database/database.db');
        // $sql= "INSERT INTO User(id,username,password,email,full_name,created_at)  VALUES (10,:name,:username,:email,'teste','20120618 10:34:09 AM')";
        $sql= "SELECT * FROM User";
        $statment = $db->prepare($sql);
        // $statment->bindParam(':name', $name);
        // $statment->bindParam(':username', $username);
        // $statment->bindParam(':email', $email);
        $statment->execute();
        $articles = $statment->fetchAll();
        foreach( $articles as $article) {
            echo '<h1>' . $article['id'] . '</h1>';
            echo '<p>' . $article['username'] . '</p>';
          }
        echo '<p>' .$name . '</p>';
        echo '<p>' .$username . '</p>';
        echo '<p>' . $email . '</p>';
        echo "LEzGo";
    } catch(PDOException $e){
        echo "fack";
    }
*/

    require_once 'database/connection.db.php';

    $db = getDatabaseConnection();
    
    $stmt = $db->query('SELECT * FROM User');
    $results = $stmt->fetchAll();
    
    // If we got here without any errors, then the connection is working
    // and the query executed successfully
    var_dump($results);


    
?>