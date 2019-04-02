<?php require 'fejlec.php'; ?>
<?php
  if (isset($_SESSION['username'])){
    echo 
    '<div class="container">
    <form class="form-inline" action="galeria-feltolt.php" method="post">
      <div class="form-group mb-2">
        <label for="album_nev"  class="sr-only">Új album létrehozása</label>
        <div class="form-group mx-sm-3 mb-2">
          <input type="text" class="form-control"  placeholder="Album név" name="album_nev">
        </div>
        <button name="submit" type="submit" class="btn btn-primary mb-2">Létrehozás</button>
      </div>
    </form>

    <form action="tobb-kep-fel.php" method="post" enctype="multipart/form-data">
      <div class="form-row align-items-center">
        <div class="col-6">
          <div class="custom-file">
            <input type="file" accept=".jpg,.jpeg,.png" data-max-size="4096000000" class="custom-file-input" name="file[]" multiple>
            <label class="custom-file-label" for="file" data-browse="Tallózás...">Válassz képet</label>
            <button name="submit" type="submit" class="btn btn-primary">Képek feltöltése</button>
          </div>
        </div>
          <div class="col-6">
            <select class="form-control" name="album">
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
          </div>
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
                      <a href="album-szerkesztes.php?id=' .$row['Album_ID'] .'">Átnevezés</a>';
                      echo '<a href="album-torles.php?id=' .$row['Album_ID'] .'">Törlés</a>';
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
<?php




    /*http://www.example.com/album.php?a=10&b=plop
Then $_GET will contain :

array
  'a' => string '10' (length=2)
  'b' => string 'plop' (length=4)

Of course, as $_GET is not read-only, you could also set some values from your PHP code, if needed :

$_GET['my_value'] = 'test';*/
?>
<?php require 'lablec.php'; ?>