<?php require 'fejlec.php'; ?>
<?php
  if (isset($_SESSION['username'])){
    echo 
    '<div class="container">
    <form class="form-inline" action="galeria-feltolt.php" method="post">
      <div class="form-group">
        <label for="album_nev">Új album létrehozása</label>
        <input type="text" class="form-control" placeholder="Album név" name="album_nev">
        <button name="submit" type="submit" class="btn btn-primary">Létrehozás</button>
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
                    <a href="album.php?id=' . $row['Album_ID'] . '&nev=' . $row['albumNev'] . '"><img src=' . $utvonal . '><p>' . $row['albumNev'] . '</p></a>               
                  </div>
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