<?php

session_start();

include 'fungsi.php';


if(empty($_GET)){
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

