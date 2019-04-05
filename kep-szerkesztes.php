<?php require 'fejlec.php'; ?>
<?php if (isset($_SESSION['username'])){ ?>
<?php

    $id = $_GET['id'];

?>

    <div class="container">
        <div class="row justify-content-center">
            <form action="kep-szerkesztes-db.php?id=<?php echo $id; ?>" method="post">

            <select class="col-6 url-sor" name="album">
            <option value="" disabled selected>Melyik albumba kerüljön?</option>
            <?php require 'connect.php';
            $sql = "SELECT albumNev FROM album";
            $result = $conn->query($sql);
            $resultCeck = mysqli_num_rows($result);
            if ($resultCeck > 0) {
                while($row = mysqli_fetch_assoc($result))
                {
                echo  '<option>' . $row['albumNev'] . '</option>';
                }
            }           
            $conn->close(); ?>
            <option value="" disabled>Új album létrehozása a Galériában!</option>
            </select>
                <button type="submit" name="submit" class="form-gomb col-5">Áthelyezés</button>
            </form>
        </div>
    </div>
<?php };?>