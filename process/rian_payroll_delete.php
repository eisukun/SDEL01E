<?php

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $employee_number = $_POST['employee_no'];
        //add db_connections codes
        include 'db_connection.php';
        $conn = OpenCon();

        // save employee record to database
        $sql1 = "DELETE FROM incometbl WHERE employee_no = '$employee_number'";

        $conn->query($sql1);

        // Update query for deductiontbl
        $sql2 = "DELETE FROM deductiontbl WHERE employee_no = '$employee_number'";

        $conn->query($sql2);

        CloseCon($conn);
        echo json_encode([
            'ok' => 1,
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'error' => $e
    ]);
}
