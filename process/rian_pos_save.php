<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fieldArray = [];
    foreach($_POST as $key => $value){
        $fieldArray[] = $value;
    }
    // echo json_encode($fieldArray);
    include 'db_connection.php';
    $conn = OpenCon();
    $sql1 = "INSERT INTO salestbl(discount_option, item_name, quantity, price, discount_amount, discounted_amount, total_quantity, total_discount_given, total_discounted_amount, cash_given, customer_change, employee_no,item_type)
            VALUES('$fieldArray[0]','$fieldArray[1]','$fieldArray[2]','$fieldArray[3]','$fieldArray[4]','$fieldArray[5]','$fieldArray[6]', '$fieldArray[7]', '$fieldArray[8]', '$fieldArray[9]', '$fieldArray[10]', '$fieldArray[11]', '$fieldArray[12]')";
    $conn->query($sql1);
    
    CloseCon($conn);
    echo json_encode([
        'ok' => 1,
    ]);
}
?>