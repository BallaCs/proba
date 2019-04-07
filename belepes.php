<?php require 'fejlec.php'; ?>
<div class="container">
    <div class="row justify-content-center">
        <form action="belepes-validate.php" method="post">
            <input type="text" class="col-5 url-sor"  placeholder="Név:" name="nev">     
            <input type="password" class="col-5 url-sor" name="jelszo" placeholder="Jelszó:">  
            <button name="submit" type="submit" class="form-gomb col-2">Belépés</button>
        </form>
    </div>
</div>
<?php require 'lablec.php'; ?>