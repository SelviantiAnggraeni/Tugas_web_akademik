<?php 
    session_start();
    $NIM = $_POST['nim'];
    $PASSWORD = $_POST['password'];

    include "../config/db_connection.php";
    $query = "SELECT * from mahasiswa where NIM='$NIM' and password='$PASSWORD'";

    $res = $conn->query($query);

    if($row = $res->fetch_row()){
        echo $row[1];

        $_SESSION['logged-in'] = true;
        $_SESSION['nim'] = $row[0];
        $_SESSION['username'] = $row[1];
        header('location: homw_page.php?page=dashboard');
    }
    else{
        $_SESSION['salah'] = 'salah' ;
        header('location: index.php');
    }
?>