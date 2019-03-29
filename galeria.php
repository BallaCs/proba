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

<?php
    /*http://www.example.com/test.php?a=10&b=plop
Then $_GET will contain :

array
  'a' => string '10' (length=2)
  'b' => string 'plop' (length=4)

Of course, as $_GET is not read-only, you could also set some values from your PHP code, if needed :

$_GET['my_value'] = 'test';*/
?>
<?php require 'lablec.php'; ?>