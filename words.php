<?php
session_start();
require_once("functions.php");

$session_idd = isset($_SESSION['id']) ? $_SESSION['id'] : '';
if(!$session_idd){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Words Vocabularies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body id="basic-words">    
    <div class="left-area">
        <div class="manu-area">
            <nav>
                <h2 class="title">menu</h2>
                <ul class="main-menu nav flex-column">
                
                    <li class="nav-item"><a class="nav-link menu-item" data-target="allwords" href="words.php">all words</a></li>
                    <li class="nav-item"><a class="nav-link menu-item" data-target="addwords" href="#">add new word</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">log out</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="right-area">
        <div class="container">
            <div class="row">
                <div class="header-area text-center"><h2 class="mb-5 mt-5"> My Vocabularies</h2></div>
                <div id="addwords" class="project m-auto helement mt-5 mb-5" style="width:93%; display:none">               
                <div class="form-area">
                    <form action="process.php" method="POST">
                        <h4 class="text-center">Add New Word</h4>
                        <label for="word">New Word</label> <br />
                        <input class="w-100 p-1 mb-2" type="text" name="word" id="word" placeholder="Type Word"> <br />
                        <label for="meaning">Meaning</label> <br />
                        <input class="w-100 p-1 mb-1" type="text" name="meaning" id="meaning" placeholder="Meaning of the word"> <br />
                       <p class="status">
                       <?php 
                            $statuss = isset($_GET['status']) ? $_GET['status'] : "";
                            if($statuss){
                                echo getStatusMessage($statuss);
                            }
                        ?>
                        </p>
                        <input type="submit" value="Add Word" id="submit">
                        <input type="hidden" id="action" name="action" value="addword">
                    </form>
                </div>                         
            </div>
            <div id="allwords" class="project helement m-auto mt-5 mb-5" style="width:93%;">               
                <div class="form-area">
                  <h4 class="text-center">All Words</h4>
                    <div class="top-head">
                        <div class="option-area">
                            <select name="" id="alphabets">
                                <option value="all">All Words</option>
                                <option value="a">A#</option>
                                <option value="b">B#</option>
                                <option value="c">C#</option>
                                <option value="d">D#</option>
                            </select>
                        </div>
                        <div class="search-area">
                            <form action="" method="POST">
                            <input type="text" name="search" placeholder="SEARCH">
                            <input type="submit" value="submit" name="submit">

                            </form>
                        </div>
                        
                    </div>
                    <hr>
                        <div class="word-area">
                            <table class="table" id="twords">
                                <thead>
                                    <tr>
                                        <th class="w-25">Words</th>
                                        <th class="w-75">Definition</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                if(isset($_POST['submit'])){
                                    $serach_word = $_POST['search'];
                                    $wordss = getWords($session_idd, $serach_word);
                                }else{
                                    $wordss = getWords($session_idd);
                                }
                                if(count($wordss) > 0) : ?>
                                   <?php  foreach($wordss as $word) : ?>
                                    
                                    <tr>
                                        <td><?php echo $word['word'];  ?></td>
                                        <td><?php echo $word['meaning'];  ?></td>
                                        
                                    </tr>
                                
                                
                                <?php endforeach; ?>
                                <?php endif; ?>
                                   
                                    
                                </tbody>
                            </table>
                        </div>
                </div>                         
            </div>
            </div>
        </div>
    </div>
    
    <script src="//code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>