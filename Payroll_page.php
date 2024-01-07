<?php
include 'process/payroll.php';
include 'process/rian_payroll_fill.php';
include 'process/session_check.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/rian_payroll_save.js"></script>
    <link rel="stylesheet" href="css/global.css">
</head>

<body>
    <div class="d-flex">
        <!-- sidebar -->
        <div class="vh-100 sticky-top " style="width: 320px; background-color:#111927">
            <nav class="navbar my-5 mx-4 px-3">
                <a class="navbar-brand text-white fw-bold" href="#">
                    Rian's Choice Enterprise
                </a>
            </nav>

            <ul class="nav flex-column mb-auto mx-4">
                <li class="">
                    <a href="Admin_page.php" class="nav-link text-white mb-2">
                        Home
                    </a>
                </li>
                <li>
                    <a href="employee_registration_save.php" class="nav-link text-white mb-2 <?php echo $user_privilege == 1 ? '' : 'd-none' ?>">
                        Employee Registration
                    </a>
                </li>
                <li>
                    <a href="employee_report.php" class="nav-link text-white mb-2 <?php echo $user_privilege == 1 ? '' : 'd-none' ?>">
                        Employee Report
                    </a>
                </li>
                <li>
                    <a href="Payroll_page.php" class="nav-link text-white mb-2 <?php echo ($user_privilege == 1 || $user_privilege == 2) ? '' : 'd-none' ?>" style="background-color: #343b47;border-radius: 5px;">
                        Payroll
                    </a>
                </li>
                <li>
                    <a href="payroll_report.php" class="nav-link text-white  mb-2 <?php echo ($user_privilege == 1 || $user_privilege == 2) ? '' : 'd-none' ?>">
                        Payroll Report
                    </a>
                </li>
                <li>
                    <a href="Beefs.php" class="nav-link text-white mb-2 <?php echo ($user_privilege == 1 || $user_privilege == 3) ? '' : 'd-none' ?>">
                        POS
                    </a>
                </li>
                <li>
                    <a href="pos_sales_report.php" class="nav-link text-white mb-2 <?php echo ($user_privilege == 1 || $user_privilege == 3) ? '' : 'd-none' ?>">
                        POS Sales Report
                    </a>
                </li>
                <li>
                    <a href="user_account_page.php" class="nav-link text-white mb-2 <?php echo ($user_privilege == 1) ? '' : 'd-none' ?>">
                        User Account Report
                    </a>
                </li>
                <li>
                    <a href="logout_page.php" class="nav-link text-white  mb-2">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        <!-- main content -->
        <div class="flex-grow-1" style="background-color: #f9fafc;">
            <div class="container">
                <h1 class="d-flex justify-content-center m-2 fw-bold" style="font-size:30px;">Rian's Choice Payroll</h1>
                <!-- form inputs -->
                <form class="row" method="post">
                    <div class="col">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <h1 class="fs-5 mx-4">Employee Basic Info:</h1>
                            <div class="card mb-3 mx-4" style="width: 14rem;">
                                <img src=<?php echo isset($type) ? "$type" : "Images/Assets/placeholder.jpg"; ?> class="card-img" alt="..." height="225">
                            </div>
                        </div>

                        <div class="col d-flex justify-content-center">
                            <ul class="">
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Employee Number:
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3" style="height: 2rem;">
                                                <input type="text" class="form-control" aria-describedby="button-addon2" id='employee_no' name="employee_no" value="<?php echo $employee_no ?>">
                                                <button class="btn btn-outline-secondary clickable <?php echo isset($_GET['id']) ? "disabled" : ""?>" type="button" id="search" name='search'> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24" class="">
                                                        <path d="M 9 2 C 5.1458514 2 2 5.1458514 2 9 C 2 12.854149 5.1458514 16 9 16 C 10.747998 16 12.345009 15.348024 13.574219 14.28125 L 14 14.707031 L 14 16 L 20 22 L 22 20 L 16 14 L 14.707031 14 L 14.28125 13.574219 C 15.348024 12.345009 16 10.747998 16 9 C 16 5.1458514 12.854149 2 9 2 z M 9 4 C 11.773268 4 14 6.2267316 14 9 C 14 11.773268 11.773268 14 9 14 C 6.2267316 14 4 11.773268 4 9 C 4 6.2267316 6.2267316 4 9 4 z"></path>
                                                    </svg></button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Department:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="department" id='department' class="form-control mb-1" style="height:2rem;" value="<?php echo $department ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <h1 class="fs-5 fw-bold">Basic Income:</h1>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Rate / Hour:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="basic_rate_hour" id='basic_rate_hour' value="<?php echo $basic_rate_hour; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            No. of Hours / Cut Off:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="basic_num_hours_cutoff" id='basic_num_hours_cutoff' value="<?php echo $basic_num_hours_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Income / Cut Off:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="basic_income_cutoff" id='basic_income_cutoff' value="<?php echo $basic_income_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <h1 class="fs-5 fw-bold">Honorarium Income:</h1>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Rate / Hour:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="hono_rate_hour" id='hono_rate_hour' value="<?php echo $hono_rate_hour; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            No. of Hours/ Cut off
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="hono_num_hours_cutoff" id='hono_num_hours_cutoff' value="<?php echo $hono_num_hours_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Income / Cut Off:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="hono_income_cutoff" id='hono_income_cutoff' value="<?php echo $hono_income_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <h1 class="fs-5 fw-bold">Other Income:</h1>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Rate / Hour:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="other_rate_hour" id='other_rate_hour' value="<?php echo $other_rate_hour; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            No. of Hours/ Cut off
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="other_num_hours_cutoff" id='other_num_hours_cutoff' value="<?php echo $other_num_hours_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Income / Cut Off:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="other_income_cutoff" id='other_income_cutoff' value="<?php echo $other_income_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <h1 class="fs-5 fw-bold">Summary Income:</h1>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Gross Income:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="gross_income" id='gross_income' value="<?php echo $gross_income; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Net Income:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="net_income" id='net_income' value="<?php echo $net_income; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="col">
                        <div class="col d-flex mt-4">
                            <ul class="">
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Firstname:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="firstname" id='firstname' class="form-control mb-1 w-75" value="<?php echo $firstname ?>" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Middle Name:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="mname" id='mname' class="form-control mb-1 w-75" value="<?php echo $mname ?>" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Surname:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="surname" id='surname' class="form-control mb-1 w-75" value="<?php echo $surname ?>" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Civil Status:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="civil_status" id='civil_status' class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $civil_status ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Designation:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="designation" id='designation' class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $designation ?>" disabled aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Qualified Dependents
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="qualified_dependents" id='qualified_dependents' class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $qualified_dependents ?>" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Paydate:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="paydate" id='paydate' class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $paydate ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Employee Status:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="emp_status" id='emp_status' class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $emp_status ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <h1 class="fs-5 fw-bold">Regular Deduction:</h1>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            SSS Contribution:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="sss_contri" id='sss_contri' class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $sss_contri ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            PhilHealth Contribution:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="philH_contri" id='philH_contri' class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $philH_contri ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Pagibig Contribution:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="pagibig_contri" id='pagibig_contri' class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $pagibig_contri ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Income Tax Contribution:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="tax_contri" id='tax_contri' class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $tax_contri ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <h1 class="fs-5 fw-bold">Other Deduction:</h1>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            SSS Loan:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="sss_loan" id='sss_loan' value="<?php echo $sss_loan; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Pagibig Loan
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="pagibig_loan" id='pagibig_loan' value="<?php echo $pagibig_loan; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Faculty Saving Deposit:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="fs_deposit" id='fs_deposit' value="<?php echo $fs_deposit; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Faculty Saving Loan:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="fs_loan" id='fs_loan' value="<?php echo $fs_loan; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Salary Loan:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="salary_loan" id='salary_loan' value="<?php echo $salary_loan; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Other Loans:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="other_loans" id='other_loans' value="<?php echo $other_loans; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <h1 class="fs-5 fw-bold">Deduction Summary:</h1>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Total Deductions:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="total_deduct" id='total_deduct' value="<?php echo $total_deduct ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row row-cols-3 align-items-center gap-2 mt-3 g-0 pe-4">
                                        <div class="col-4">
                                            <button type="submit" name="calculate_gross_income" class="btn btn-primary w-100" style="white-space: nowrap; font-size:0.9rem;">Calculate Gross Income</button>
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" name="calculate_net_income" class="btn btn-primary  w-100" style="white-space: nowrap; font-size:0.9rem;">Calculate Net Income</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="submit" name="new" class="btn btn-warning w-100" style="white-space: nowrap; font-size:0.9rem;">New</button>
                                        </div>

                                        <div class="col-4">
                                            <button type="submit" name='<?php echo !isset($isNew)  ? "update" : "save"; ?>' id='<?php echo !isset($isNew) ? "update" : "save"; ?>' class="btn btn-success  w-100 " style="white-space: nowrap; font-size:0.9rem;"><?php echo !isset($isNew) ? "Update" : "Save"; ?></button>
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" name="delete" id='delete' class="btn btn-danger  w-100" style="white-space: nowrap; font-size:0.9rem;">Delete</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="submit" name="close" class="btn btn-dark w-100" style="white-space: nowrap; font-size:0.9rem; width:90%;">Close</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<script>
    $(document).ready(function() {
        $(".clickable").click(function() {
            let id = document.getElementById("employee_no").value
            window.location = "Payroll_page.php?search=" + id
        })
    })
</script>

</html>