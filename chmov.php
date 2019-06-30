<?php
    session_start();
    include('includes/head.php');
    include('includes/nav.php');
    $s= $_POST['a'];
    $n= $_POST['b'];
    $d= $_POST['c'];
    $i= $_POST['d'];
    $r= $_POST['e'];
    $p="";
    if(isset($_SESSION['name']) && $_SESSION['name']=='admin@gg'){
        mysql_connect("localhost","root","");
        mysql_select_db("bookmymovie");

        if($_POST['mvbt']=='add'){
            $query="SELECT * FROM movie WHERE sr=$s";
            $res=mysql_query($query);
            $row= mysql_num_rows($res);
            if($row==0){
                $q="INSERT INTO movie VALUES ($s,'$n','$d','$i','$r', 120)";
            }
            else{
                $q="UPDATE movie SET name='$n', description='$d', image='$i', rating='$r' WHERE sr=$s";
            }
        }
        else if($_POST['mvbt']=='del'){
            $q="DELETE FROM movie where sr=$s";
        }
        mysql_query($q);
        echo "db updated";
        header('location:welcome.php');
    }
    else{
        header( "refresh:3;url=index.php" );
        echo "<h2>Unauthorized Access</h2>";
        echo "<h6>Redirecting in 5 seconds...</h6>";  
    }
    include('includes/foot.php');
?>