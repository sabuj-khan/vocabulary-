<?php
session_start();
require_once("functions.php");

$session_idd = isset($_SESSION['id']) ? $_SESSION['id'] : '';
if($session_idd){
    header("location: words.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocabularies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body id="basic-voca">
    
    <div class="container" id="vocabulary">
        <div class="row">
            <div class="header-area  text-center mb-2">
                <h2 class="mb-5"> My Vocabularies</h2>
                <div class="nav-area">
                    <p>
                        <a href="#" id="login">Log In</a> |
                        <a href="#" id="register">Register Account</a> 
                </div>
            </div>
            <div class="project">               
                <div class="form-area">
                    <form action="process.php" method="POST">
                        <h4 class="text-center">Log In</h4>
                        <label for="email">Email</label> <br />
                        <input class="w-100 p-1 mb-2" type="email" name="email" id="email" placeholder="Email address"> <br />
                        <label for="password">Password</label> <br />
                        <input class="w-100 p-1 mb-1" type="password" name="password" id="password" placeholder="Password"> <br />
                       <p class="status">
                       <?php 
                            $statuss = isset($_GET['status']) ? $_GET['status'] : "";
                            if($statuss){
                                echo getStatusMessage($statuss);
                            }
                        ?>
                        </p>
                        <input type="submit" value="Log In" id="submit">
                        <input type="hidden" id="action" name="action" value="login">
                    </form>
                </div>
                         
            </div>           
        </div>          
    </div>

    
    <script src="//code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>