<?php
  if (isset($_SESSION['username'])){
    echo 
    '<div class="container">
      <form action="includes/post-upload.inc.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" class="form-control" id="cim" placeholder="Cím">
        </div>
        <div class="form-row">
          <div class="col">
            <div class="custom-file">
                <input type="file" accept=".jpg,.jpeg,.png" class="custom-file-input" id="file">
                <label class="custom-file-label" for="file" data-browse="Tallózás...">Válassz képet</label>
            </div>
          </div>
          <div class="col">
            <select class="form-control" id="album">
              <option value="" disabled selected>Melyik albumba kerüljön?</option>
              <option>1</option>
              <option>2</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="15" placeholder="Vers/Szöveg"></textarea>
        </div>
      <button type="submit" class="btn btn-primary">Közzétesz</button>
      </form>
    </div>';
  }
?>