<?php
require_once("config.php");

if( !$connection ){
    throw new Exception("Can not connet to database");
}


function getStatusMessage($statusCode=0){
    $status = array(
        '0' => "",
        '1' => "User added successfully",
        '2' => "The email you enter already exists, try another email",
        '3' => "Email and Password are empty",
        '4' => "Email and Password didn't match",
        '5' => "User doesn't exist",
    );
    return $status[$statusCode];
}

function getWords($current_user_id, $search=''){
    global $connection; 
    if($search){
        $query = "SELECT * FROM addword WHERE user_id='$current_user_id' AND word LIKE '{$search}%' ORDER BY word";
    }else{
        $query = "SELECT * FROM addword WHERE user_id='$current_user_id'ORDER BY word";
    }

      
    $data = array();
    $result = mysqli_query($connection, $query);
    
    while($_data = mysqli_fetch_assoc($result)){
        array_push($data, $_data);
    }
    return $data;

}