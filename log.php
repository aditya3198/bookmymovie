<?php
    session_start();
    if(isset($_SESSION['name']) && $_SESSION['name']=='admin@gg'){
      include('includes/head.php');
      include('includes/nav.php');
?>
<div class="container">
  <div  id="up3">
        <em>
            <?php while(!feof($log)) {
                echo fgets($log) . "<br>";
                } 
            ?>
        </em>
</div></div>
<?php
    }
    else{
        header("location:index.php");
    }
    include('includes/foot.php')
?>
