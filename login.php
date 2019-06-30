<!doctype html>
<html>

<head>
    <title>Book My Movie</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <center>
        <?php
    session_start();
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
    $p= $_POST['b'];

    mysql_connect("localhost","root","");
    mysql_select_db("bookmymovie");

    $q="SELECT * FROM admin WHERE password='$p' AND email='$n'";
    $res=mysql_query($q);
    $row= mysql_num_rows($res);
    if($row!=0){
        $_SESSION['name']=$n;
        header("location:adwel.php");
        $_SESSION['email']="admin";
        $_SESSION['ip']=getUserIpAddr();
        $t= "admin logged in from ".getUserIpAddr().
        ' at '.date('Y/m/d').' '.date('H:i:s').PHP_EOL;
        fwrite($log, $t);
        fclose($log);
    }
    else{
        $query="SELECT * FROM users WHERE password='$p' AND email='$n'";
        $res=mysql_query($query);
        $row= mysql_fetch_array($res);
        if($row!=0){
            if($row[3]!=1){
                header( "refresh:3;url=index.php" );
                echo "<h2>Account not yet confirmed</h2>";
                echo "<h6>Redirecting in 5 seconds...</h6>";   
            }
            else{
                $_SESSION['name']=$row[0];
                $_SESSION['email']= $row[1];
                $_SESSION['password']= $row[2];
                $_SESSION['phone']= $row[4];
                $_SESSION['ip']=getUserIpAddr();
                header("location:welcome.php");
                $t= "user:".$_SESSION['email'].' logged in from '.$_SESSION['ip'].
                ' at '.date('Y/m/d').' '.date('H:i:s').PHP_EOL;
                fwrite($log, $t);
                fclose($log);
            }
        }
        else{
            header( "refresh:3;url=index.php" );
            echo "<h2>Invalid email or password</h2>";
            echo "<h6>Redirecting in 3 seconds...</h6>";   
        }
    }
?>
    </center>
</body>

</html>