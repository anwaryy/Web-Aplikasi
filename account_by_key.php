<?php

session_start();

include 'fungsi.php';


// create key api key
function getKeyAPI(){
    return ["k3y", "4p1k3y", "4cc0unt", "c0d3"];
}

// function to check input
function isInputValid($inputs){
    $apiKey = $inputs["api_key"];
    if(in_array($apiKey, getKeyAPI())){
        return true;
    }else{
        return false;
    }
}

if(isInputValid($_GET)){
    
    if(empty($_GET['id'])){
        $query = mysqli_query($koneksi, "SELECT * FROM user");
        $result = array();
        while ($row = mysqli_fetch_array($query)){
            array_push($result, array(
                'id : ' => $row['id'],
                'Username : ' => $row['username'],
                'Hashed Pass: ' => $row['password'])
            );
        }
    
        echo json_encode(
            array('result' => $result)
        );
    
    }else{
    
        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id=".$_GET['id']);
        $result = array();
        while ($row = mysqli_fetch_array($query)){
            array_push($result, array(
                'id : ' => $row['id'],
                'Username : ' => $row['username'],
                'Hashed Pass: ' => $row['password'])
            );
        }
    
        echo json_encode(
            array('result' => $result)
        );
    }

}else{
    echo "API keys input is not valid";
}