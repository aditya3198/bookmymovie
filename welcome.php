
<?php
    session_start();
    if(isset($_SESSION['name']) && $_SESSION['name']=='admin@gg'){
      header('location:adwel.php');
    }
    else if(isset($_SESSION['name'])){
      include('includes/head.php');
      include('includes/nav.php');
?>
<div class='cover'>
  <div class="cover-text">
    <h1>You probably haven&rsquo;t heard of us.</h1>
    <p class="lead">BookMyMovie offers showtimes, movie tickets, reviews, trailers, concert tickets and events near you. Also features promotional offers, coupons and mobile app.</p>
    <a href="movies.php" role="button" class="btn btn-danger btn-lg">Browse Movies</a>
  </div>
</div>
<?php
    }
    else{
        header("location:index.php");
    }
    include('includes/foot.php')
?>
