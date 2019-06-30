<?php
    session_start();
    session_unset();
    session_destroy();
    $log= fopen('log.txt','a');
    date_default_timezone_set('Asia/Kolkata');
    $t= "user:".$_SESSION['email'].' logged out, from '.$_SESSION['ip'].
    ' at '.date('Y/m/d').' '.date('H:i:s').PHP_EOL;
    fwrite($log, $t);
    fclose($log);
    header("location:index.php");
?>