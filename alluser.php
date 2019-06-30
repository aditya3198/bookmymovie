<?php
    session_start();
    if(isset($_SESSION['name']) && $_SESSION['name']=='admin@gg'){
        include('includes/head.php');
        include('includes/nav.php');
        mysql_connect("localhost","root","");
        mysql_select_db("bookmymovie");
?>

<div class="container cover">
    <?php
        $query="SELECT * FROM users";
        $res=mysql_query($query);
        $row= mysql_num_rows($res);
        if($row!=0){
    ?>
    
    <table class="table table-dark" id="up2">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Phone No.</th>
                <th>Confirmed?</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row= mysql_fetch_array($res)){
                echo '<tr>';
                echo '<td>'.$row[0].'</td>';
                echo '<td>'.$row[1].'</td>';
                echo '<td>'.$row[4].'</td>';
                echo '<td>'.$row[3].'</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <?php
        }
        else{
            echo '<div class="cover-text">No Users</div>';
        }
    ?>
            
</div>

<?php
    }
    else if(isset($_SESSION['name'])){
        header('location:index.php');
    }
    else{
        header( "refresh:3;url=index.php" );
        echo "<h2>Unauthorized Access</h2>";
        echo "<h6>Redirecting in 5 seconds...</h6>";  
    }
    include('includes/foot.php');
?>
