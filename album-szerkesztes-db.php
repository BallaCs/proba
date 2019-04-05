<?php
if(isset($_POST['submit']) && !empty($_POST['ujnev']) && !empty($_GET['id'])){
    
        $id = $_GET['id'];
        $ujnev = $_POST['ujnev'];

        require 'connect.php';

        $sql = "UPDATE album SET albumNev='$ujnev' WHERE Album_ID='$id';";
        mysqli_query($conn, $sql);
    
        $conn->close();

        //var_dump($ujnev);
        header("Location: galeria.php");
}
?>