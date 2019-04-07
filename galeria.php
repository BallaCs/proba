<?php require 'fejlec.php'; ?>
<?php
  if (isset($_SESSION['username'])){
    echo 
    '<div class="container">
    <div class="row justify-content-center">
    <form action="galeria-feltolt.php" method="post">
        <input type="text" class="col-6 url-sor"  placeholder="ÚJ Album név" name="album_nev">       
        <button name="submit" type="submit" class="form-gomb col-5">Létrehozás</button>
    </form>
    </div>

    <form action="tobb-kep-fel.php" method="post" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div class="col-5">
          <div class="custom-file">
            <input type="file" accept=".jpg,.jpeg,.png" data-max-size="4096000000" class="custom-file-input" name="file[]" multiple>
            <label class="custom-file-label" for="file" data-browse="Tallózás...">Válassz képet</label>       
          </div>
        </div>
        <select class="col-4 url-sor" name="album">
        <option value="" disabled selected>Melyik albumba kerüljön?</option>';
        require 'connect.php';

            $sql = "SELECT albumNev FROM album";
            $result = $conn->query($sql);
            $resultCeck = mysqli_num_rows($result);
            if ($resultCeck > 0) {
                while($row = mysqli_fetch_assoc($result))
                {
                  echo  '<option>' . $row['albumNev'] . '</option>';
                }
            }
            ?>
        <?php $conn->close(); ?>
        <?php echo
        '</select>
        <button name="submit" type="submit" class="form-gomb col-3">Képek feltöltése</button>
      </div>
    </form>
  </div>';
  }
?>
<?php require 'connect.php'; ?>
<div class="galeria">
<div class="container">
<div class="row">
    <?php
        $sql = "SELECT Album_ID, albumNev FROM album  ORDER BY Album_ID DESC;";
        $result = $conn->query($sql);
        $resultCeck = mysqli_num_rows($result);
        if ($resultCeck > 0) {
            while($row = mysqli_fetch_assoc($result))
            {   
                $sql2 = "SELECT utvonal FROM kep WHERE Album_ID = " . $row['Album_ID'] . "  ORDER BY Kep_ID DESC LIMIT 1;";
                $result2 = $conn->query($sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $utvonal = $row2["utvonal"];
                echo 
                '<div class="col-4">
                  <div class="album_framer">               
                    <a href="album.php?id=' . $row['Album_ID'] . '&nev=' . $row['albumNev'] . '"><img src=' . $utvonal . '><p>' . $row['albumNev'] . '</p></a>';               
                    if (isset($_SESSION['username'])){
                      echo '
                      <a href="album-szerkesztes.php?id=' .$row['Album_ID'] .'"><i class="fas fa-edit"></i> Átnevezés</a>';
                      echo '<a href="album-torles.php?id=' .$row['Album_ID'] .'"><i class="fas fa-trash-alt"></i> Törlés</a>';
                  } 
                    echo '</div>
                </div>';
            }
        }
    ?>
</div>
</div>
</div>
<?php $conn->close(); ?>
<?php require 'lablec.php'; ?>