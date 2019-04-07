<?php require 'connect.php'; ?>
<div class="container">
    <?php
        $sql = "SELECT cim, szoveg, Kep_ID, datum, Post_ID, video,DATE_FORMAT(datum, '%Y-%m-%d') AS date FROM post ORDER BY `date` DESC, `Post_ID` DESC;";
        $result = $conn->query($sql);
        $resultCeck = mysqli_num_rows($result);
        if ($resultCeck > 0) {
            while($row = mysqli_fetch_assoc($result))
            {   
                echo '<div class="poszt">';
                if ($row['cim'] != NULL) {
                    echo   '<h2>' . $row['cim'] . '</h2>';
                }

                if ($row['Kep_ID'] != 0) {
                    $kep_id = $row['Kep_ID'];
                    $sql = "SELECT utvonal FROM kep WHERE Kep_ID = '$kep_id' ORDER BY Kep_ID DESC LIMIT 1;";
                    $result2 = mysqli_query($conn, $sql);
                    $row2 = mysqli_fetch_assoc($result2);
                    $utvonal = $row2['utvonal'];

                    echo '<img src=' . $utvonal . '>';
                }
                
                if ($row['szoveg'] != NULL) {
                    echo   '<p>' . $row['szoveg'] . '</p>';
                }

                if ($row['video'] != NULL) {
                    $video = $row['video'];
                    echo '<iframe width="1110" height="625"  src="https://www.youtube.com/embed/' . $video . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                }

                if (isset($_SESSION['username'])){
                    echo '<div class ="row"><div class="col-6">
                    <a href="poszt-szerkesztes.php?id=' .$row['Post_ID'] .'"><i class="fas fa-edit"></i> Szerkesztés</a>';
                    echo '<a href="poszt-torles.php?id=' .$row['Post_ID'] .'"><i class="fas fa-trash-alt"></i> Törlés</a></div>';
                    echo '<div class="col-6"><p class="date">' . $row['datum'] . '</p></div></div>';
                }else {
                    echo '<p class="date">' . $row['datum'] . '</p>';
                }
 
                echo '</div>';
            }
        }
    ?>
</div>
<?php $conn->close(); ?>