<?php 
session_start();
require_once("config.php");
require_once("functions.php");
$action = isset($_POST['action']) ? $_POST['action'] : '';
$status = '';

if( !$connection ){
    throw new Exception("Can not connet to database");
}else{
    if( 'register' == $action ){
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        if( $email && $password ){
            $hash_password = password_hash($password, PASSWORD_BCRYPT);        
        
            $query = "INSERT INTO users(email, password) VALUES('$email','$hash_password')";
            $insert_query = mysqli_query($connection, $query);
            if($insert_query){
                $status = 1;
                header("location: index.php?status={$status}");
            }else{
                $status= 2;
                header("location: index.php?status={$status}");
            }
    
        }else{
            $status= 3;
                header("location: index.php?status={$status}");
        }

    }elseif( 'login' == $action ){
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        if( $email && $password ){
            $query_data = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");

            if( mysqli_num_rows($query_data) > 0 ){
                $data = mysqli_fetch_assoc($query_data);
                $q_password = $data['password'];
                $q_id = $data['id'];
                if(password_verify($password, $q_password)){
                    $_SESSION['id'] = $q_id;
                    header("location: words.php");
                   
                    die();
                }else{
                    $status= 4;
                    header("location: index.php?status={$status}");
                }

            }else{
                $status= 5;
                header("location: index.php?status={$status}");
            }
        }else{
            $status= 3;
            header("location: index.php?status={$status}");
        }

    }elseif('addword' == $action){
        $word    = isset($_POST['word']) ? $_POST['word'] : '';
        $meaning = isset($_POST['meaning']) ? $_POST['meaning'] : '';
        $user_id = $_SESSION['id'];
        if($word && $meaning && $user_id){
            $query = mysqli_query($connection, "INSERT INTO addword(user_id, word, meaning) VALUES('$user_id', '$word', '$meaning')");
            if($query){
                header("location:words.php");
            }
            echo "Failed Insert word";
        }
    }

    }

    mysqli_close($connection);