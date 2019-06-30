<?php
    session_start();
    if(isset($_SESSION['name']) && $_SESSION['name']=='admin@gg'){
        include('includes/head.php');
        include('includes/nav.php');
        mysql_connect("localhost","root","");
        mysql_select_db("bookmymovie");
        echo"<center>";

?>

<form method="post" action="chmov.php" id="up2">
    <div class="form-group">
        <label for="sr">Movie Slot:</label>
        <select id="sr" class="form-control" type="text" name="a">
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
    </div>
    <div class="form-group">
        <label for="mv-name">Movie Name:</label>
        <input id="mv-name" class="form-control" type="text" name="b">
    </div>
    <div class="form-group">
        <label for="mv-description">Movie Description:</label>
        <textarea class="form-control" rows="5" id="mv-description" name="c"></textarea>
    </div>
    <div class="form-group">
        <label for="mv-img">Image-URL:</label>
        <input id="mv-img" class="form-control" type="text" name="d">
    </div>
    <div class="form-group">
        <label for="mv-rationg">Rating:</label>
        <input id="mv-rationg" class="form-control" type="number" name="e">
    </div>
    <button class="btn btn-danger form-actions" type="submit" name="mvbt" value="add">Add Movie</button>
    <button class="btn btn-danger form-actions" type="submit" name="mvbt" value="del">Remove Movie</button>
</form>

<?php
    }
    else if(isset($_SESSION['name'])){
        header('location:movies.php');
    }
    else{
        header( "refresh:3;url=index.php" );
        echo "<h2>Unauthorized Access</h2>";
        echo "<h6>Redirecting in 5 seconds...</h6>";  
    }
    include('includes/foot.php')
?>