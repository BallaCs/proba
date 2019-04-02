<?php

$id = $_GET['id']; 
?>
<?php
if(isset($_POST['submit'])){
    if (!empty($_POST['cim'])) {
        $cim = $_POST['cim'];
    } else {
        $cim = NULL;
    }

    if (!empty($_POST['album'])) {
        $album = $_POST['album'];
    } else {
        $album = 'Egyéb';
    }

    if (!empty($_POST['vers'])) {
        $vers = true;
    } else {
        $vers = false;
    }
    
    if (!empty($_POST['szoveg'])) {
        $szoveg = $_POST['szoveg'];
    } else {
        $szoveg = NULL;
    }

    if (!empty($_POST['video'])) {
        $video_array = explode('=', $_POST['video']);
        $video = end($video_array);
    } else {
        $video = NULL;
    }

    if (!empty($_POST['date'])) {
        $date = $_POST['date'];
    } else {
        $date = date("Y-m-d");
    }

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
            if ($fileSize < 2097152) {
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
        //album id lekérése
            $sql = "SELECT Album_ID FROM album WHERE albumNev = '$album' ORDER BY Album_ID DESC LIMIT 1;";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $album_id = $row["Album_ID"];
        //képet kép táblába feltölteni
        if ($_FILES["file"]["error"] == 0) {
            $sql = "INSERT INTO kep (utvonal, Album_ID) VALUES ('$fileDestination', '$album_id');";
            mysqli_query($conn, $sql);
            //kép id-t lekérni
            $sql = "SELECT Kep_ID FROM kep WHERE utvonal = '$fileDestination' ORDER BY Kep_ID DESC LIMIT 1;";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $kep_id = $row["Kep_ID"];
        }else {
            $kep_id = NULL;
        }
        //post táblába feltöltés
        $sql = "UPDATE post SET cim='$cim', szoveg='$szoveg', vers='$vers', datum='$date', video='$video' WHERE Post_ID=". $id ."";
        mysqli_query($conn, $sql);
        if ($kep_id!=NULL) {
            $sql = "UPDATE post SET Kep_ID='$kep_id' WHERE Post_ID=". $id ."";
            mysqli_query($conn, $sql);
        }
    
    ?>
    <?php $conn->close(); ?>
    <!--adatbázisba end-->


    <?php
    header("Location: index.php");
}
?>