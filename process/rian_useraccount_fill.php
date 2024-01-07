<?php 
$fname = '';
$mname = '';
$lname = '';
$department = '';
$designation = '';
$email_address = '';
$employee_status = '';
$suffix = '';
$employee_no = '';
$username = '';
$password = '';
$confirm_password = '';
$privilege = '';

if (isset($_GET['id'])) {
    include 'process/db_connection.php';
    $conn = OpenCon();
    $id = $_GET['id'];
    $sql = "SELECT * FROM user_accounttbl JOIN personal_infotbl ON user_accounttbl.employee_no = personal_infotbl.employee_no WHERE user_accounttbl.employee_no = $id;";
    $result = mysqli_fetch_assoc($conn->query($sql));
    $fname = $result['fname'];
    $mname = $result['mname'];
    $lname = $result['lname'];
    $employee_no = $result['employee_no'];
    $suffix = $result['suffix'];
    $civil_status = $result['civil_status'];
    $department = $result['department'];
    $designation = $result['designation'];
    $email_address = $result['email_address'];
    $employee_status = $result['employee_status'];
    $username = $result['username'];
    $password = $result['password'];
    $confirm_password = $result['confirm_password'];
    $privilege = $result['privilege'];
    $type = $result['picpath'];
}   
?>