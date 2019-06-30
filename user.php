<?php
    session_start();
    include('includes/head.php');
    if(isset($_SESSION['name'])){
        include('includes/nav.php');
        $n=$_SESSION['name'];
        $e=$_SESSION['email'];
        $p=$_SESSION['password'];
        $m=$_SESSION['phone'];
?>

<form method="post" action="update.php" id="up">
    <div class="form-group">
        <label for="name">Name:</label>
        <input id="name" class="form-control" value="<?php echo "$n";?>" type="text" name="a">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input id="email" class="form-control" value="<?php echo "$e";?>" type="email" name="b" disabled>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input id="password" class="form-control" value="<?php echo "$p";?>" type="password" name="c">
    </div>
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input id="phone" class="form-control" value="<?php echo "$m";?>" type="tel" name="d">
    </div>
    <div class="form-actions">
        <button class="btn btn-danger" id="upd" type="submit">Update</button>
    </div>

</form>

<?php
    }
    include('includes/foot.php');
?>