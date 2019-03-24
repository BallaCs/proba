<?php
if(isset($_POST['submit'])){
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
?>