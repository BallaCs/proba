<?php
if(isset($_POST['submit']) && !empty($_POST['album']) && !empty($_GET['id'])){
        
        require 'connect.php';

        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $album = mysqli_real_escape_string($conn, $_POST['album']);

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