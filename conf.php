<?php
    session_start();
    include('includes/head.php');
    include('includes/nav.php');
    if(isset($_SESSION['name']) && $_SESSION['name']!='admin@gg' && isset($_SESSION['mov'])){
        $m=$_SESSION['mov'];
        $s= $_POST['a'];
        mysql_connect('localhost','root','');
        mysql_select_db('bookmymovie');
        if($m==1)
        $qu="INSERT INTO s1 VALUES('$s');";
        else if($m==2)
        $qu="INSERT INTO s2 VALUES('$s')";
        else
        $qu="INSERT INTO s3 VALUES('$s')";
        mysql_query($qu);
        mysql_query("DELETE FROM s1 where s=' '");
        mysql_query("DELETE FROM s2 where s=' '");
        mysql_query("DELETE FROM s3 where s=' '");
        $qu="SELECT * from movie where sr=$m";
        $res=mysql_query($qu);
        $row=mysql_fetch_array($res);
        $t= "user: ".$_SESSION['email'].' booked seat '.$s.' for '.$row[1].', from '.$_SESSION['ip'].
                ' at '.date('Y/m/d').' '.date('H:i:s').PHP_EOL;
        ?>
    <div class="cover">
        <div class="cover-text">
            <a href="movies.php" class="btn btn-danger">Book More</a>
            <a href="index.php" class="btn btn-danger">Home</a>
        </div>
    </div>

<?php
    }
    else{
        header("location:index.php");
    }
    include('includes/foot.php')
?>