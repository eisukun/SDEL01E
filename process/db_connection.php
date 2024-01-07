<?php

function OpenCon(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "pos_applicationdb";
    $conn = new mysqli($dbhost,$dbuser,$dbpass,$db);
    return $conn;
}

function CloseCon($conn){
    $conn->close();
}
