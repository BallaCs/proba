<?php
if(isset($_POST['submit']) && (!empty($_POST['cim']) || !empty($_POST['album']) || !empty($_POST['vers']) || !empty($_POST['szoveg']) || !empty($_POST['file']))){
    var_dump(!empty($_POST['file']));
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
    if (!empty($_POST['file'])) {
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
            if ($fileError === 0) {
                if ($fileSize < 2000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'assets/kepek/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: index.php");
                } else {
                    echo "Túl nagy fájl méret (nagyobb mint 2mb)";
                }
            } else {
                echo "Sikertelen fájl feltöltés!";
            }
        } else {
            echo "Nem megengedett fájl formátum!";
        }
    }
}else{
    echo 'nononono';
}
?>