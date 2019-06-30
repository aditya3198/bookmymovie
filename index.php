

<?php
    session_start();
    if(isset($_SESSION['name'])){
        header('location:welcome.php');
    }else{
?>
<!doctype html>
<html>
    <head>
        <title>Book My Movie</title>
        <link href="style.css" rel="stylesheet">
        <script type="text/javascript" src="script.js"></script>
    </head>
    
    <body>
        <div class="loginform">
            <form method="POST" action="login.php">
                <fieldset>
                    <legend>Login</legend>
                    <br><label>Email:</label><br>
                    <input type="email" name="a" size="30" required><br>
                    <label>Password:</label><br>
                    <input type="password" name="b" size="30" required><br><br>
                    <input type="submit" class="button" value="Login"><br>
                </fieldset>
            </form>
        <br>
        <hr>
        <form>
            <fieldset>
                <legend>OR</legend>
                <button value="Signup" class="button" ><a href="signupform.html">Signup</a></button><br>
            </fieldset>
        </form>
        </div>
        
        <script src="js/jquery-2.1.4.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
    </body>
</html>
<?php
    }
?>
