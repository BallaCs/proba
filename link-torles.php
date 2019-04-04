<?php
//if (isset($_SESSION['username'])){
    $id = $_GET['id'];
    $link_type = $_GET['type'];

  require 'connect.php';

    $sql = "DELETE FROM linkmegoszt WHERE Link_ID = ". $id .";";
    mysqli_query($conn, $sql);

  $conn->close();

  if ($link_type == 1) {
    header("Location: kepilelegeztetes.php");
} elseif ($link_type == 2) {
    header("Location: egyeb-publikaciok.php");
}elseif ($link_type == 3) {
    header("Location: megemlitesek.php");
}else {
    header("Location: index.php");
}

    
//}
?>