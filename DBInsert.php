<?php

require "DBconnect.php";


  function login($username, $password){
       $conn =connect();
    $sql = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $sql-> bind_param("ss",$username, $password);
    

   $sql->execute();
   $sql->close();
    $conn->close();
  
}

?>