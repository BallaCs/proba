<?php
  require 'connect.php';  

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $link_type = mysqli_real_escape_string($conn, $_GET['type']);

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
?>