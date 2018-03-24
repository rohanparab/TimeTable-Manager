<?php
    session_start();
?>
<html>
    <head>
        <title>AtItle</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- bootstrap include -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Done -->

        <link rel="stylesheet" href="styles/adminlogin.css">
    </head>
    <body>
        <div class="cellcenterparent">
            <div class="cellcentercontent">
                <center>
                    <div class="loginbox">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                            <h1>Admin Login</h1>
                            <p>Enter user ID : </p>
                            <input type="text" name="userid" class="form-control" required>
                            <p>Enter Password : </p>
                            <input type="password" name="pass" class="form-control" required>
                            <br>
                            <button type="submit" class="btn btn-success form-control" name="login">Login</button>
                        </form>
                    </div>
                </center>
            </div>
        </div>
    </body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['login'])){
            $uid = $_POST['userid'];
            $pass = $_POST['pass'];
            
            if($pass == "admin"){
                $_SESSION['auid'] = $uid;
                $_SESSION['apass'] = $pass;

                echo "<script>document.location='adminpanel.php';</script>";
            }
        }
    }
?>