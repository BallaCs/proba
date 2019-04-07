<?php require 'fejlec.php'; ?>
<?php require 'connect.php'; ?>
<?php
if (isset($_GET['nev']) && isset($_GET['id'])) {
    $albumNev = mysqli_real_escape_string($conn, $_GET['nev']);
    $albumID = mysqli_real_escape_string($conn, $_GET['id']);
}else {
    header("Location: galeria.php");
}
   
?>

<div class="album">
<div class="container">

    <h1><?php echo $albumNev?></h1>
    <div class="row">
    <?php
        $sql = "SELECT utvonal, Kep_ID FROM kep WHERE Album_ID = " . $albumID . "  ORDER BY Kep_ID DESC;";
        $result = $conn->query($sql);
        $resultCeck = mysqli_num_rows($result);
        if ($resultCeck > 0) {
            $i = 1;
            while($row = mysqli_fetch_assoc($result))
            {   
                $utvonal = $row['utvonal'];
                echo 
                '<div class="col-3">
                    <div class="kep_framer">               
                        <img src=' . $utvonal . ' onclick="openModal();currentSlide('.$i.')">';  
                        if (isset($_SESSION['username'])){
                            echo '
                            <a href="kep-szerkesztes.php?id=' .$row['Kep_ID'] .'"><i class="fas fa-edit"></i> Áthelyezés</a>';
                            echo '<a href="kep-torles.php?id=' .$row['Kep_ID'] .'"><i class="fas fa-trash-alt"></i> Törlés</a>';
                        }            
                    echo '</div>
                </div>';
                $i++;
            }
        }
    ?>
    </div>

    <div id="myModal" class="modal">
        <span class="close cursor" onclick="closeModal()">&times;</span>
        <div class="modal-content">


        <?php
            $sql = "SELECT utvonal FROM kep WHERE Album_ID = " . $albumID . "  ORDER BY Kep_ID DESC;";
            $result = $conn->query($sql);
            $resultCeck = mysqli_num_rows($result);
            if ($resultCeck > 0) {
                $i = 1;
                while($row = mysqli_fetch_assoc($result))
                {   
                    $utvonal = $row['utvonal'];
                    echo 
                    '<div class="mySlides">
                        <img src=' . $utvonal . '>
                    </div>';
                }
            }
        ?>
   
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <div class="caption-container">
            <p id="caption"></p>
        </div>


    
  </div>
        

</div>
</div>
</div>

<script>
    function openModal() {
    document.getElementById('myModal').style.display = "block";
    }

    function closeModal() {
    document.getElementById('myModal').style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
    showSlides(slideIndex += n);
    }

    function currentSlide(n) {
    showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex-1].style.display = "block";
    }
</script>
<?php $conn->close(); ?>
<?php require 'lablec.php'; ?>