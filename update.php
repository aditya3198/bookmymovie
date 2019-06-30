<?php
    session_start();
    $a=$_POST['a'];
    $b=$_POST['b'];
    $c=$_POST['c'];
    $d=$_POST['d'];
    $n=$_SESSION['name'];
    $e=$_SESSION['email'];
    $p=$_SESSION['password'];
    $m=$_SESSION['phone'];
    include('includes/head.php');
    mysql_connect("localhost","root","");
    mysql_select_db("bookmymovie");
    $qu="UPDATE users SET phone='$d', name='$a', password='$c' WHERE email='$e'";
    mysql_query($qu);
    $t= "user: ".$e.' updated info, from '.$_SESSION['ip'].
        ' at '.date('Y/m/d').' '.date('H:i:s').PHP_EOL;
    include('includes/foot.php');
    header('location:logout.php');
?>