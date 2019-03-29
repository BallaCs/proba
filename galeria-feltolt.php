<?php
if(isset($_POST['submit']) && (!empty($_POST['album_nev'])) ){
    
    $album_nev = $_POST['album_nev'];
    
    ?>
    <!--adatbázisba-->
    <?php require 'connect.php'; ?>
    <?php
        //album táblába feltöltés
        $sql = "SELECT albumNev FROM album";
        $result = $conn->query($sql);
        $resultCeck = mysqli_num_rows($result);
        $volt = false;
        if ($resultCeck > 0) {
            while($row = mysqli_fetch_assoc($result))
		    {
			    if ( $album_nev == $row['albumNev']) {
                    $volt = true;
                } 
		    }
        }
        
        if ($volt == false) {
            $sql = "INSERT INTO album (albumNev) VALUES ('$album_nev');";
            mysqli_query($conn, $sql);
        }        
		    
    ?>
    <?php $conn->close(); ?>
    <!--adatbázisba end-->


    <?php
    header("Location: galeria.php");
}else{
    echo 'nononono';
}
?>