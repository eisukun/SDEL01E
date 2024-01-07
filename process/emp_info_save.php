<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fieldArray = [];
    foreach ($_POST as $key => $value) {
        $fieldArray[] = $value;
    }
    //echo json_encode($fieldArray);
    $picpath = "";
    if ($fieldArray[24]) {
        $picpath = "../" . $fieldArray[24];
    }

    if (file_exists($picpath)) {
        $pic_filename = explode('temp/', $picpath)[1];
        rename($picpath, '../uploads/' . $pic_filename);
        $picpath = 'uploads/' . $pic_filename;
    }

    include 'db_connection.php';

    $conn = OpenCon();
    $sql1 = "INSERT INTO personal_infotbl(fname, mname, lname, suffix, birth_date, gender, nationality, civil_status ,department, designation, qualified_dependent_status, employee_status, pay_date, employee_no, contact_no, email_address,other_social_media_account ,social_media_account_id, address_line1, address_line2, municipality, state_province,country ,zip_code, picpath)
            VALUES('$fieldArray[0]','$fieldArray[1]','$fieldArray[2]','$fieldArray[3]','$fieldArray[4]','$fieldArray[5]','$fieldArray[6]', '$fieldArray[7]', '$fieldArray[8]', '$fieldArray[9]', '$fieldArray[10]','$fieldArray[11]','$fieldArray[12]','$fieldArray[13]', '$fieldArray[14]', '$fieldArray[15]', '$fieldArray[16]', '$fieldArray[17]', '$fieldArray[18]', '$fieldArray[19]', '$fieldArray[20]', '$fieldArray[21]', '$fieldArray[22]', '$fieldArray[23]', '$picpath')";
    $conn->query($sql1);

    $sql2 = "INSERT INTO user_accounttbl(employee_no) VALUES('$fieldArray[13]')";
    $conn->query($sql2);

    CloseCon($conn);
    echo json_encode([
        'ok' => 1,
    ]);
}
