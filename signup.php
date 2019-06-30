<!doctype html>
<html>

    <head>
        <title>Book My Movie</title>
        <link href="style.css" rel="stylesheet">
    </head>
    
    <body>
<?php
    echo "<center>";
    function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    $log= fopen('log.txt','a');
    date_default_timezone_set('Asia/Kolkata');
    $n= $_POST['a'];
    $e= $_POST['b'];
    $p= $_POST['c'];
    $c= 0;
    $m= $_POST['d'];

    mysql_connect("localhost","root","");
    mysql_select_db("bookmymovie");

    $query="SELECT * from users where name='$n' AND email='$e'";
    $res=mysql_query($query);
    $row= mysql_num_rows($res);
    if($row==0){
        $query="INSERT INTO users VALUES ('$n', '$e','$p', '$c','$m')";
        mysql_query($query);
        mysql_query("DELETE FROM users where email=' '");
        header( "refresh:5;url=index.php" );
        echo '<h2>Signed Up Successfully</h2>';
        echo '<h4>Your Account will be Confirmed in a few Hours</h4>';
        echo "<h6>Redirecting in 5 seconds...</h6>";
        $t= "user: ".$e.' created (unconfirmed), from '.getUserIpAddr().
        ' at '.date('Y/m/d').' '.date('H:i:s').PHP_EOL;
        fwrite($log, $t);
        fclose($log);
        
    }
    else{      
        header( "refresh:5;url=signupform.html" );
        echo '<h2>User Already Exists</h2>';
        echo "<h6>Redirecting in 5 seconds...</h6>";  
    }
    echo "</center>";
?>
</body>
</html>