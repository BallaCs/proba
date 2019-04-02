<?php require 'fejlec.php'; ?>
<?php 
require 'connect.php';
$id = $_GET['id']; 
$sql = "SELECT cim, szoveg, Kep_ID, datum, Post_ID, video, vers FROM post WHERE Post_ID = " .$id .";";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
        if ($row['cim'] != NULL) {
            $cim = $row['cim'];
        }
        if ($row['Kep_ID'] != 0) {
            $kep = $row['Kep_ID'];
        }
        if ($row['szoveg'] != NULL) {
            $szoveg = $row['szoveg'];
        }
        if ($row['video'] != NULL) {
            $video = $row['video'];
        }
        $datum = $row['datum'];

        $conn->close();
?>
<div class="container">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <input type="text" class="form-control" name="cim" placeholder="Cím" value="<?php echo $cim?>">
    </div>
    <div class="form-row align-items-center">
      <div class="col-6">
        <div class="custom-file">
            <input type="file" accept=".jpg,.jpeg,.png" class="custom-file-input" name="file">
            <label class="custom-file-label" for="file" data-browse="Tallózás...">Válassz képet</label>
        </div>
      </div>
      <div class="col-5">
        <select class="form-control" name="album">
        <option value="" disabled selected>Melyik albumba kerüljön?</option>'
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
      </div>
      <div class="col-1">
        <div class="checkbox">
          <label style="margin-bottom:0;"><input type="checkbox" name="vers"> Vers</label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <textarea class="form-control" rows="15" placeholder="Vers/Szöveg" name="szoveg" value="<?php echo $szoveg ?>"></textarea>
    </div>
    <div class="bootstrap-iso">
        <div class="form-group ">
          <div class="input-group">
            <input class="form-control" name="date" id="date" placeholder="YYYY-MM-DD" type="text"/>
          </div>
        </div>  
    </div>
    <script>
      $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
          format: 'yyyy-mm-dd',
          container: container,
          todayHighlight: true,
          autoclose: true,
        })
      })
    </script>
 <div class="form-group">
    <input type="url" class="form-control" name="video" placeholder="Youtube video link">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Módosít</button>
  </form>
</div>';
<?php require 'lablec.php'; ?>