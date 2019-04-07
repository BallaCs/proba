<?php
  require 'connect.php';
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT utvonal FROM kep WHERE Kep_ID = " . $id . ";";
    $resultCeck = mysqli_num_rows($result);
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result2);
    $utvonal = $row['utvonal'];
    unlink($utvonal);

    $sql = "DELETE FROM kep WHERE Kep_ID = ". $id .";";   
    mysqli_query($conn, $sql);

  $conn->close();

  header("Location: galeria.php");

    
//}
?>