<?php
    session_start();
    include('includes/head.php');
    if(isset($_SESSION['name']) && isset($_GET['x'])){
        $x=$_GET['x'];
        include('includes/nav.php');
        mysql_connect("localhost","root","");
        mysql_select_db("bookmymovie");
        $t= "user: ".$x.' confirmed by admin, from '.$_SESSION['ip'].
        ' at '.date('Y/m/d').' '.date('H:i:s').PHP_EOL;
        $q="UPDATE users SET confirm=1 WHERE email='$x'";
        mysql_query($q);
        header('location: aduser.php');
    }
    else{
        header("location:index.html");
    }
    include('includes/foot.php')
?>