<?php 
$link_type = $_GET['type'];
if(isset($_POST['submit']) && !empty($_POST['link'])){
    require 'connect.php';
    $link=mysqli_real_escape_string($conn, $_POST['link']); 

    $sql = "INSERT INTO linkmegoszt (link, tipus) VALUES ('$link', '$link_type');";
    mysqli_query($conn, $sql);

    $conn->close();
}
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