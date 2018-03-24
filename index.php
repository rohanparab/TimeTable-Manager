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
        <link rel="stylesheet" href="styles/index.css">
    </head>
    <body>

        <div class="main">
            <h2>TimeTable</h2>
            <center>
            <div class="browse">
                <form action="index.php" method="post">

                    <p>Select year : </p>
                    <select class="form-control" name="year">
                        <option value="one">First</option>
                        <option value="two">Second</option>
                        <option value="three">Third</option>
                        <option value="four">Forth</option>
                    </select>

                    <br>

                    <button type="submit" class="btn btn-success form-control" name="showtt">GO</button>
                </form>
                <br>
            </div>
        </center>
        </div>
    </body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['showtt'])){
            if(isset($_POST['year'])){
                if(!empty($_POST['year'])){
                    $year = $_POST['year'];
                    
                    switch($year){
                        case "one":
                            echo "<script>document.location='tt/one.pdf'</script>";
                            break;
                        case "two":
                            echo "<script>document.location='tt/two.pdf'</script>";
                            break;
                        case "three":
                            echo "<script>document.location='tt/three.pdf'</script>";
                            break;
                        case "four":
                            echo "<script>document.location='tt/four.pdf'</script>";
                            break;
                    }
                    
                }
            }
        }
    }
?>