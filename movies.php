<?php
    session_start();
    include('includes/head.php');
    if(isset($_SESSION['name'])){
        include('includes/nav.php');
        mysql_connect("localhost","root","");
        mysql_select_db("bookmymovie");

?>

<div class="container cover" id="movielist">
    <h2>Currently Showing</h2><hr>    

<?php

    $q="SELECT * FROM movie";
    $result=mysql_query($q);
    while($row=mysql_fetch_array($result)){
        $x=$row[3];
        echo"<a href='seatsel.php?value=$row[0]'><img class='col-lg-4 img-thumbnail' src='$x'></a>";
    }
?>
</div>

<?php
    }
    else{
        header("location:index.html");
    }
    include('includes/foot.php');
?>