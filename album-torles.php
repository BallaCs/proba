<?php
  require 'connect.php';
  
  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $sql = "SELECT utvonal FROM kep WHERE Album_ID = " . $id . ";";
  $result = $conn->query($sql);
  $resultCeck = mysqli_num_rows($result);
  if ($resultCeck > 0) {
      $i = 1;
      while($row = mysqli_fetch_assoc($result))
      {   
          $utvonal = $row['utvonal'];
          unlink($utvonal);
      }
  }

    $sql = "DELETE FROM album WHERE Album_ID = ". $id .";";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM kep WHERE kep.Album_ID = ". $id .";";   
    mysqli_query($conn, $sql);

  $conn->close();

  header("Location: galeria.php");
?>