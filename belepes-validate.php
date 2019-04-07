<?php
session_start();

if(isset($_POST['submit']) && !empty($_POST['nev']) && !empty($_POST['jelszo'])){
    
        require 'connect.php';

        $nev = mysqli_real_escape_string($conn, $_POST['nev']);
        $jelszo = mysqli_real_escape_string($conn, $_POST['jelszo']);
        $jelszo = sha1($jelszo);

        
        /*
        $sql = "INSERT INTO szerkeszto (FelhasznaloNev, Jelszo) VALUES ('$nev' , '$jelszo');";
        mysqli_query($conn, $sql);
        $conn->close();
        
        echo $nev . $jelszo;
        */
        
        $sql = "SELECT FelhasznaloNev, Jelszo FROM szerkeszto WHERE (FelhasznaloNev = '$nev') AND (Jelszo = '$jelszo');";
        $result = $conn->query($sql);
        $resultCeck = mysqli_num_rows($result);
        if ($resultCeck > 0) {
                while($row = mysqli_fetch_assoc($result))
                {
                        $_SESSION['username'] = $row['FelhasznaloNev'];
                        $conn->close();
                        header("Location: index.php?login=succes");
                }
        }else{
                $conn->close();
		header("Location: index.php?login=error"); 
        }        
}
?>