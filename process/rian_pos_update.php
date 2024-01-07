<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fieldArray = [];
    foreach ($_POST as $key => $value) {
        $fieldArray[] = $value;
    }
    //echo json_encode($fieldArray);
    include 'db_connection.php';

    $conn = OpenCon();
    $sql1 = "UPDATE salestbl SET 
                  discount_option = '$fieldArray[0]',
                  quantity = '$fieldArray[2]',
                  price = '$fieldArray[3]',
                  discount_amount = '$fieldArray[4]',
                  discounted_amount = '$fieldArray[5]',
                  total_quantity = '$fieldArray[6]',
                  total_discount_given = '$fieldArray[7]',
                  total_discounted_amount = '$fieldArray[8]',
                  cash_given = '$fieldArray[9]',
                  customer_change = '$fieldArray[10]',
                  employee_no = '$fieldArray[11]',
                  item_type = '$fieldArray[12]'
                  WHERE item_name = '$fieldArray[1]'";
    $conn->query($sql1);
    CloseCon($conn);
    echo json_encode([
        'ok' => 1,
    ]);
}
