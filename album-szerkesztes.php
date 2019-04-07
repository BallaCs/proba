<?php require 'fejlec.php'; ?>
<?php if (isset($_SESSION['username'])){ ?>
<?php

    require 'connect.php';
    $id = mysqli_real_escape_string($conn, $_GET['id']);

  $sql = "SELECT albumNev FROM album WHERE Album_ID = " . $id . ";";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $album_nev = $row["albumNev"];


  $conn->close();

?>

    <div class="container">
        <div class="row justify-content-center">
            <form action="album-szerkesztes-db.php?id=<?php echo $id; ?>" method="post">
                <input class="col-6 url-sor" type="text" name="ujnev" id="ujnev" value="<?php echo $album_nev?>">
                <button type="submit" name="submit" class="form-gomb col-5">Átnevezés</button>
            </form>
        </div>
    </div>
<?php };?>