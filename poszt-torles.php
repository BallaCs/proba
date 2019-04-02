<?php
//if (isset($_SESSION['username'])){
    $id = $_GET['id'];

  require 'connect.php';

    $sql = "DELETE FROM `post` WHERE `post`.`Post_ID` = ". $id .";";
    mysqli_query($conn, $sql);

  $conn->close();

  header("Location: index.php");

    
//}
?>