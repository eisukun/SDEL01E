<?php

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $employee_number = $_POST['employee_no'];
        $basic_rate_hour = $_POST['basic_rate_hour'];
        $basic_num_hours_cutoff = $_POST['basic_num_hours_cutoff'];
        $basic_income_cutoff = $_POST['basic_income_cutoff'];
        $hono_rate_hour = $_POST['hono_rate_hour'];
        $hono_num_hours_cutoff = $_POST['hono_num_hours_cutoff'];
        $hono_income_cutoff = $_POST['hono_income_cutoff'];
        $other_rate_hour = $_POST['other_rate_hour'];
        $other_num_hours_cutoff = $_POST['other_num_hours_cutoff'];
        $other_income_cutoff = $_POST['other_income_cutoff'];
        $gross_income = $_POST['gross_income'];
        $net_income = $_POST['net_income'];


        // getting data from employee personal information
        $pay_date = $_POST['paydate'];

        // getting data from input textboxes for employee deduction
        $sss_contri = $_POST['sss_contri'];
        $pagibig_contri = $_POST['pagibig_contri'];
        $philH_contri = $_POST['philH_contri'];
        $tax_contri = $_POST['tax_contri'];
        $sss_loan = $_POST['sss_loan'];
        $pagibig_loan = $_POST['pagibig_loan'];
        $fs_deposit = $_POST['fs_deposit'];
        $fs_loan = $_POST['fs_loan'];
        $salary_loan = $_POST['salary_loan'];
        $other_loans = $_POST['other_loans'];
        $total_deduction = $_POST['total_deduct'];

        //add db_connections codes
        include 'db_connection.php';
        $conn = OpenCon();

        // Update query for incometbl
        $sql1 = "UPDATE incometbl 
         SET income_date = '$pay_date',
             basic_rate_hour = '$basic_rate_hour',
             basic_income = '$basic_income_cutoff',
             hono_rate_hour = '$hono_rate_hour',
             hono_num_hrs = '$hono_num_hours_cutoff',
             hono_income = '$hono_income_cutoff',
             other_rate_hour = '$other_rate_hour',
             other_num_hrs = '$other_num_hours_cutoff',
             other_income = '$other_income_cutoff',
             gross_income = '$gross_income',
             net_income = '$net_income',
             basic_num_hrs = '$basic_num_hours_cutoff'
         WHERE employee_no = '$employee_number'";

        $conn->query($sql1);

        // Update query for deductiontbl
        $sql2 = "UPDATE deductiontbl 
         SET deduction_date = '$pay_date',
             sss_contri = '$sss_contri',
             philHealth_contri = '$philH_contri',
             pagibig_contri = '$pagibig_loan',
             income_tax_contri = '$tax_contri',
             sss_loan = '$sss_loan',
             pagibig_loan = '$pagibig_loan',
             faculty_savings_deposit = '$fs_deposit',
             faculty_savings_loan = '$fs_loan',
             salary_loan = '$salary_loan',
             other_loans = '$other_loans',
             total_deduction = '$total_deduction'
         WHERE employee_no = '$employee_number'";

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
