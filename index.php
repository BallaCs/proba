<?php
  $_SESSION['username'] = "Admin";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">HGy</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Kezdőlap<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Versek</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Galéria</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Megemlítések</a>
      </li>
    </ul>

  </div>
</nav>
<?php
  if (isset($_SESSION['username'])){
    echo 
    '<div class="container">
      <div class="post-upload">
        <form action="includes/post-upload.inc.php" method="post" enctype="multipart/form-data">
          <input type="text" name="filename" placeholder="">
          <input type="text" name="filetitle" placeholder="">
          <input type="text" name="filedesc" placeholder="">
          <input type="file" name="file">
          <button type="submit" name="submit">Feltölt</button>
        </form>
      </div>
    </div>';
  }
?>


<!--xl, lg, md , sm, ,-->
<!--
  <div class="conatiner">
    <div class="row">
      <div class="col-lg-6">
          <h1>próba1</h1>
      </div>
      <div class="col-lg-6">
          <h1>próba2</h1>
      </div>
    </div>
  </div>
-->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>