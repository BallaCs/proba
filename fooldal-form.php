<?php
  if (isset($_SESSION['username'])){
    echo 
    '<div class="container">
      <form action="includes/post-upload.inc.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" class="form-control" id="cim" placeholder="Cím">
        </div>
        <div class="form-row align-items-center">
          <div class="col-6">
            <div class="custom-file">
                <input type="file" accept=".jpg,.jpeg,.png" class="custom-file-input" id="file">
                <label class="custom-file-label" for="file" data-browse="Tallózás...">Válassz képet</label>
            </div>
          </div>
          <div class="col-5">
            <select class="form-control" id="album">
              <option value="" disabled selected>Melyik albumba kerüljön?</option>
              <option>1</option>
              <option>2</option>
            </select>
          </div>
          <div class="col-1">
            <div class="checkbox">
              <label style="margin-bottom:0;"><input type="checkbox"> Vers</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="15" placeholder="Vers/Szöveg"></textarea>
        </div>
        <div class="bootstrap-iso">
            <div class="form-group ">
              <div class="input-group">
                <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
              </div>
            </div>  
        </div>'
        ?>      

        <script>
          $(document).ready(function(){
            var date_input=$('input[name="date"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
              format: 'mm/dd/yyyy',
              container: container,
              todayHighlight: true,
              autoclose: true,
            })
          })
        </script>
      <?php
      echo
      '<button type="submit" class="btn btn-primary">Közzétesz</button>
      </form>
    </div>';
  }
?>