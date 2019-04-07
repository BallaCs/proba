<?php 
if(isset($_POST['submit']) && $_FILES["file"]["error"][0] != 4 && !empty($_POST['album'])){
    
    require 'connect.php';

    $album = mysqli_real_escape_string($conn, $_POST['album']);
    //Count total files
    $countfiles = mysqli_real_escape_string($conn, count($_FILES['file']['name']));

 //Looping all files
 for($i=0;$i<$countfiles;$i++){
 
     if ($_FILES["file"]["error"][$i] == 0) {
        //$file = $_FILES['file'][$i];

        $fileName = mysqli_real_escape_string($conn, $_FILES['file']['name'][$i]);
        $fileTmpName = mysqli_real_escape_string($conn, $_FILES['file']['tmp_name'][$i]);
        $fileSize = mysqli_real_escape_string($conn, $_FILES['file']['size'][$i]);
        $fileError = mysqli_real_escape_string($conn, $_FILES['file']['error'][$i]);
        $fileType = mysqli_real_escape_string($conn, $_FILES['file']['type'][$i]);

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
            echo 'átment';
            
            $sql = "SELECT Album_ID FROM album WHERE albumNev = '$album' ORDER BY Album_ID DESC LIMIT 1;";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $album_id = $row["Album_ID"];
        //képet kép táblába feltölteni
            $sql = "INSERT INTO kep (utvonal, Album_ID) VALUES ('$fileDestination', '$album_id');";
            mysqli_query($conn, $sql);
            $conn->close();
        } else {
            echo "Nem megengedett fájl formátum!";
        }
    }
  echo 'bent';





 }
}else {
    echo 'kint';
    var_dump(isset($_POST['submit']));
    var_dump($_FILES["file"]["error"][0] == 0 );
    echo $_FILES["file"]["error"][0];
    var_dump(!empty($_POST['album']));
}
//header("Location: index.php");

?>