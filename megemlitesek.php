<?php require 'fejlec.php'; ?>
<?php if (isset($_SESSION['username'])){ ?>
    <div class="container">
        <div class="row justify-content-center">
            <form action="link-feltolt.php?type=3" method="post">
                <input class="col-6 url-sor" type="url" name="link" id="link" placeholder="Megosztani kívánt link:">
                <button type="submit" name="submit" class="form-gomb col-5">Közzétesz</button>
            </form>
        </div>
    </div>
<?php } ?>
<div class=link-oldal>
    <div class="container">
        <h2>Cikkek rólam</h2>
        <div class="row">
            <?php 
            require 'connect.php';

            $sql = "SELECT link, Link_ID FROM linkmegoszt WHERE tipus=3 ORDER BY Link_ID DESC;";
            $result = $conn->query($sql);
            $resultCeck = mysqli_num_rows($result);
            if ($resultCeck > 0) {
                while($row = mysqli_fetch_assoc($result))
                {   
                    echo '<div class="col-6">';
                    if (isset($_SESSION['username'])){
                        echo '<a href="link-torles.php?id=' .$row['Link_ID'] .'&type=3"><i class="fas fa-trash-alt"></i> Törlés</a>';
                    } 
                    $received_url = $row['link'];
                    include 'link-preview.php';
                    
                    echo '</div>';
                }
            }
            ?>
            <?php $conn->close(); ?>

        </div>
    </div>
</div>
<?php require 'lablec.php'; ?>