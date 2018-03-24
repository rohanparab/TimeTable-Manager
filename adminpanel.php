<?php
    session_start();
    if(isset($_SESSION['auid']) and isset($_SESSION['apass'])){
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
        <link rel="stylesheet" href="styles/adminpanel.css">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#myPage">Admin Panel</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php">LOGOUT</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <br>
        <br>
        <br>
        <center>
            <div class="card">
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                    <p>Select year : </p>
                    <select class="form-control" name="year">
                        <option value="one">First</option>
                        <option value="two">Second</option>
                        <option value="three">Third</option>
                        <option value="four">Forth</option>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-success form-control" name="update">Update</button>
                </form>
            </div>


            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST["update"])){
                        $year = $_POST['year'];
                        $file = $year . ".pdf";
            ?>
            <br><br>
            <div class="card">
                <form action="adminpanel.php" method="post" enctype="multipart/form-data">
                    <input class="btn btn-primary" type="file" name="fileToUpload">
                    <input type="hidden" value="<?php echo $file; ?>" name="filename">
                    <br>
                    <button type="submit" class="btn btn-success form-control" name="uploadpdf">Upload</button>
                </form>
            </div>
            <?php
                                
                    }
                }
            ?>
        </center>
    </body>
</html>
<?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            if(isset($_POST['uploadpdf'])){
                $target_dir = "tt/";
                $upfile = $_POST['filename'];
                $target_file = $target_dir . $upfile;
                $filebasename = basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;


                // Check if file already exists
                /*if (file_exists($target_file)) {
                    echo "File already exists.";
                    $uploadOk = 0;
                }*/

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "File was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }

        }
    }
?>
