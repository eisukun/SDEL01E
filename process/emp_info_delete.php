<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fieldArray = [];
    foreach ($_POST as $key => $value) {
        $fieldArray[] = $value;
    }
    include 'db_connection.php';

    $conn = OpenCon();
    $sql = "DELETE FROM personal_infotbl WHERE employee_no = '$fieldArray[13]'";
    $sql1 = "DELETE FROM incometbl WHERE employee_no = '$fieldArray[13]'";
    $sql2 = "DELETE FROM deductiontbl WHERE employee_no = '$fieldArray[13]'";
    $sql3 = "DELETE FROM user_accounttbl WHERE employee_no = '$fieldArray[13]'";

    $conn->query($sql1);
    $conn->query($sql2);
    $conn->query($sql3);
    $conn->query($sql);
    CloseCon($conn);
    echo json_encode([
        'ok' => 1,
    ]);
}
