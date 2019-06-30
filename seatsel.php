<?php
    session_start();
    include('includes/head.php');
    include('includes/nav.php');
    if(isset($_GET['value']) && isset($_SESSION['name']) && $_SESSION['name']!='admin@gg'){
        $m = $_GET['value'];
        $_SESSION['mov']=$m;
        mysql_connect('localhost','root','');
        mysql_select_db('bookmymovie');
        if($m==1)
        $qu="SELECT * FROM s1";
        else if($m==2)
        $qu="SELECT * FROM s2";
        else
        $qu="SELECT * FROM s3";
        $query="SELECT * FROM movie WHERE sr='$m'";
        $res= mysql_query($query);
        $res2=mysql_query($qu);
        $row2=mysql_num_rows($res2);
        $row=mysql_fetch_array($res);
        $avail=$row[5]-$row2;
        $th=array(
            array('1A','2A','3A','4A','5A','6A','7A','8A','9A','10A','11A','12A'),
            array('1B','2B','3B','4B','5B','6B','7B','8B','9B','10B','11B','12B'),
            array('1C','2C','3C','4C','5C','6C','7C','8C','9C','10C','11C','12C'),
            array('1D','2D','3D','4D','5D','6D','7D','8D','9D','10D','11D','12D'),
            array('1E','2E','3E','4E','5E','6E','7E','8E','9E','10E','11E','12E'),
            array('1F','2F','3F','4F','5F','6F','7F','8F','9F','10F','11F','12F'),
            array('1G','2G','3G','4G','5G','6G','7G','8G','9G','10G','11G','12G'),
            array('1H','2H','3H','4H','5H','6H','7H','8H','9H','10H','11H','12H'),
            array('1I','2I','3I','4I','5I','6I','7I','8I','9I','10I','11I','12I'),
            array('1J','2J','3J','4J','5J','6J','7J','8J','9J','10J','11J','12J')
        );
        
?>
<div class="cover">
    <div class="cover-text">
        <h4>Total Seats: 120</h4>
        <h4>Available Seats: <?php echo "$avail";?></h4><br>

        <form method="post" action="conf.php">
            <div class="form-group">
                <label for="sr">Select Seats:</label>
                <select id="sr" class="form-control" type="text" name="a">
                    <?php
                foreach($th as $r){
                    foreach($r as $c){
                        if($m==1)
                        $qu="SELECT * from s1 where s='$c'";
                        else if($m==2)
                        $qu="SELECT * from s2 where s='$c'";
                        else
                        $qu="SELECT * from s3 where s='$c'";
                        
                        $res= mysql_query($qu);
                        $row=mysql_num_rows($res);
                        if($row==0)
                        echo "<option>$c</option>";
                    }
                }
                ?>
                </select>
            </div>
            <?php
        echo '<button class="btn btn-danger" name="c" type="submit">Book Seat</button>';
    ?>
        </form>
    </div>
</div>

<?php
        
               
    }
    else{
        header("location:index.php");
    }
    include('includes/foot.php')
?>