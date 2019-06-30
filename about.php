<?php
    session_start();
    include('includes/head.php');
    if(isset($_SESSION['name'])){
        include('includes/nav.php');
?>

<div class="cover">
    <div class="cover-text">
        <h3>An online movie booking system website designed by <u>Aditya Garg,</u> using HTML, CSS, Bootstrap and jQuery
            on front-end and PHP on the back-end.</h3>
        <h3>A project initiated by Netcamp Solutions Private Limited, under the guidance of</h3>
            <h3><u>Mr. Santu Purkait, Director, Netcamp Solutions Private Limited.</u>
        </h3>
    </div>
</div>

<?php
    }
    else{
        header("location:index.html");
    }
    include('includes/foot.php')
?>