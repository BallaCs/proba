<?php
//if (isset($_SESSION['username'])){
    $id = $_GET['id'];

  require 'connect.php';

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