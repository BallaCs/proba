<?php
  require 'connect.php';

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "DELETE FROM `post` WHERE `post`.`Post_ID` = ". $id .";";
    mysqli_query($conn, $sql);

  $conn->close();

  header("Location: index.php");
?>