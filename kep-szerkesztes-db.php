<?php
if(isset($_POST['submit']) && !empty($_POST['album']) && !empty($_GET['id'])){
    
        $id = $_GET['id'];
        $album = $_POST['album'];

        require 'connect.php';

        $sql = "SELECT Album_ID FROM album WHERE albumNev = '$album' ORDER BY Album_ID DESC LIMIT 1;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $album_id = $row["Album_ID"];


        $sql = "UPDATE kep SET Album_ID='$album_id' WHERE Kep_ID='$id';";
        mysqli_query($conn, $sql);
    
        $conn->close();

        header("Location: galeria.php");
}
?>