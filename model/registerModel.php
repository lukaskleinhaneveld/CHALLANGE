<?php

function registerUser($Firstname, $Lastname, $Password, $Email){
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM users";

    $query = $db->prepare($sql);
    $query->execute();

    $emailDB = ;


    //if(){
    if(isset($Firstname) && isset($Lastname) && isset($Password) && isset($Email)){
        $db = openDatabaseConnection();

        $sql = "INSERT INTO users (Firstname, Lastname, Password, Email, Active) VALUES (:Firstname, :Lastname, :Password, :Email)";

        $query = $db->prepare($sql);
        $query->execute(array(
            ':Firstname' => $Firstname,
            ':Lastname' => $Lastname,
            ':Password' => $Password,
            ':Email' => $Email
        ));

        $db = null;
        //header('Location: login/profile');
    }else{
        $db = null;
        echo "<h1>It seems like you have not filled in all fields. Please fill in all fields and try again.</h1>";
    }
    //}
}