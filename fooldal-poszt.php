<?php require 'connect.php'; ?>
<div class="container">
    <?php
        $sql = "SELECT cim, szoveg, Kep_ID, datum, Post_ID, DATE_FORMAT(datum, '%Y-%m-%d') AS date FROM post ORDER BY `date` DESC, `Post_ID` DESC;";
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

                echo '<p class="date">' . $row['datum'] . '</p>';
                
                echo '</div>';
            }
        }
    ?>
</div>
<?php $conn->close(); ?>