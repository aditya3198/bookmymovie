<?php
    session_start();
    if(isset($_SESSION['name']) && $_SESSION['name']=='admin@gg'){
      include('includes/head.php');
      include('includes/nav.php');
?>
<div class='cover'>
  <div class="cover-text">
        <h2>Welcome</h2>  
        <a class="btn btn-danger" href="admovies.php">Movies</a>
        <a class="btn btn-danger" href="aduser.php">Confirm User</a>
        <a class="btn btn-danger" href="alluser.php">User List</a>
        <a class="btn btn-danger" href="log.php">Log</a>
  </div>
</div>
<?php
    }
    else{
        header("location:index.php");
    }
    include('includes/foot.php')
?>
