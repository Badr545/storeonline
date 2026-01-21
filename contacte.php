<?php 
session_start();
include "db.php";
include "header.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="contacte.css">
</head>

<body>
    <div class="head">
        <h3>contact us if you meet any problem please.</h3>
    </div>
    <div>
        <center>
                <form class="form-container" method="POST">
                    <div class="form-group">
                    <label for="textarea">How Can We Help You?</label>
                    <textarea name="textarea" id="textarea" rows="10" cols="50" required="">          </textarea>
                    </div>
                    <button class="form-submit-btn" type="submit" name="submite">Submit</button>
                </form>
             
        </center>
    </div>

    <?php 
    
    if(isset($_POST["submite"])){
        $FEEDBACK = $_POST["textarea"];
        $insert = "INSERT INTO feedback (feedback) VALUES ('$FEEDBACK')";
        mysqli_query($conn, $insert);
    }
    
    
    
    
    
    
    
    ?>
</body>
</html>