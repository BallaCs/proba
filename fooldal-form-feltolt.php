<?php
if(isset($_POST['submit']) && (!empty($_POST['cim']) || !empty($_POST['vers']) || !empty($_POST['szoveg']) || $_FILES["file"]["error"] == 0)){
    
    if (!empty($_POST['cim'])) {
        $cim = $_POST['cim'];
    } else {
        $cim = NULL;
    }

    if (!empty($_POST['album'])) {
        $album = $_POST['album'];
    } else {
        $album = NULL;
    }

    if (!empty($_POST['vers'])) {
        $vers = $_POST['vers'];
    } else {
        $vers = false;
    }
    
    if (!empty($_POST['szoveg'])) {
        $szoveg = $_POST['szoveg'];
    } else {
        $szoveg = NULL;
    }

    if (!empty($_POST['date'])) {
        $date = $_POST['date'];
    } else {
        $date = NULL;
    }

    //echo $cim . $album . $vers . $szoveg . $date;
    if ($_FILES["file"]["error"] == 0) {
        $file = $_FILES['file'];

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg','jpeg','png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileSize < 2000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'assets/kepek/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                echo "Túl nagy fájl méret (nagyobb mint 2mb)";
            }
        } else {
            echo "Nem megengedett fájl formátum!";
        }
    }
    ?>
    <!--adatbázisba-->
    <?php require 'connect.php'; ?>
    <?php
        $sql = "INSERT INTO kep (utvonal) VALUES ('$fileDestination');";
        mysqli_query($conn, $sql);
    
        $sql = "SELECT Kep_ID FROM kep WHERE utvonal = '$fileDestination' ORDER BY Kep_ID DESC LIMIT 1;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $Kep_ID = row['Kep_ID'];
        echo $Kep_ID;
    
    ?>
    <?php $conn->close(); ?>
    <!--adatbázisba end-->


    <?php
    //header("Location: index.php");
}else{
    echo 'nononono';
}
?>