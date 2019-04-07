<?php
if(isset($_POST['submit']) && !empty($_POST['ujnev']) && !empty($_GET['id'])){
    
        require 'connect.php';

        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $ujnev = mysqli_real_escape_string($conn, $_POST['ujnev']);

        $sql = "UPDATE album SET albumNev='$ujnev' WHERE Album_ID='$id';";
        mysqli_query($conn, $sql);
    
        $conn->close();

        //var_dump($ujnev);
        header("Location: galeria.php");
}
?>