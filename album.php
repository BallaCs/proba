<?php require 'fejlec.php'; ?>
<?php
    $albumNev = $_GET['nev'];
    $albumID = $_GET['id'];
?>
<?php require 'connect.php'; ?>
<div class="album">
<div class="container">

    <h1><?php echo $albumNev?></h1>
    <div class="row">
    <?php
        $sql = "SELECT utvonal FROM kep WHERE Album_ID = " . $albumID . "  ORDER BY Kep_ID DESC;";
        $result = $conn->query($sql);
        $resultCeck = mysqli_num_rows($result);
        if ($resultCeck > 0) {
            while($row = mysqli_fetch_assoc($result))
            {   
                $utvonal = $row['utvonal'];
                echo 
                '<div class="col-3">
                    <div class="kep_framer">               
                        <img src=' . $utvonal . '>             
                    </div>
                </div>';
            }
        }
    ?>
    </div>
</div>
</div>
<?php $conn->close(); ?>
<?php require 'lablec.php'; ?>