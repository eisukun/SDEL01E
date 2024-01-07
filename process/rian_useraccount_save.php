<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fieldArray = [];
    foreach($_POST as $key => $value){
        $fieldArray[] = $value;
    }

    $roleMapping = [
        'Administrator' => 1,
        'Accounting' => 2,
        'Cashier' => 3
    ];

    $privilegeNumber = isset($roleMapping[$fieldArray[3]]) ? $roleMapping[$fieldArray[3]] : 0;

    //echo json_encode($fieldArray);
    include 'db_connection.php';

    $conn = OpenCon();
    $sql1 = "UPDATE user_accounttbl 
    SET username = '$fieldArray[0]',
        password = '$fieldArray[1]',
        confirm_password = '$fieldArray[2]',
        privilege = '$privilegeNumber'
    WHERE employee_no = '$fieldArray[4]'";

   $conn->query($sql1);
    CloseCon($conn);
    echo json_encode([
        'ok' => 1,
    ]);
}
?>