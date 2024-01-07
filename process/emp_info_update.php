<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fieldArray = [];
    foreach ($_POST as $key => $value) {
        $fieldArray[] = $value;
    }
    // echo json_encode($fieldArray);
    $picpath = $fieldArray[24];

    if (str_starts_with($picpath, "temp/")) {
        $pic_filename = explode('temp/', $picpath)[1];
        rename('../' . $picpath, '../uploads/' . $pic_filename);
        $picpath = 'uploads/' . $pic_filename;
    }

    include 'db_connection.php';

    $conn = OpenCon();
    $sql = "UPDATE personal_infotbl 
         SET 
            fname = '$fieldArray[0]',
            mname = '$fieldArray[1]',
            lname = '$fieldArray[2]',
            suffix = '$fieldArray[3]',
            birth_date = '$fieldArray[4]',
            gender = '$fieldArray[5]',
            nationality = '$fieldArray[6]',
            civil_status = '$fieldArray[7]',
            department = '$fieldArray[8]',
            designation = '$fieldArray[9]',
            qualified_dependent_status = '$fieldArray[10]',
            employee_status = '$fieldArray[11]',
            pay_date = '$fieldArray[12]',
            employee_no = '$fieldArray[13]',
            contact_no = '$fieldArray[14]',
            email_address = '$fieldArray[15]',
            other_social_media_account = '$fieldArray[16]',
            social_media_account_id = '$fieldArray[17]',
            address_line1 = '$fieldArray[18]',
            address_line2 = '$fieldArray[19]',
            municipality = '$fieldArray[20]',
            state_province = '$fieldArray[21]',
            country = '$fieldArray[22]',
            zip_code = '$fieldArray[23]',
            picpath = '$picpath'
         WHERE 
            employee_no = '$fieldArray[13]'";

    $conn->query($sql);

    CloseCon($conn);
    echo json_encode([
        'ok' => 1,
    ]);
}
