<?php
require_once('payroll.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background:black url(../Images/Assets/pattern.webp);">
    <div class="container w-50">
        <div class="row bg-white vh-100">
            <div class="col-md-12 my-4">
                <div class="text-center lh-1 mb-2">
                    <h6 class="fw-bold">Payslip</h6> <span class="fw-normal">Payment slip</span>
                </div>
                <div class="d-flex justify-content-end"> <span>Department: <?php echo $department?></span> </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-6">
                                <div> <span class="fw-bolder">EMP No</span> <small class="ms-3"><?php echo $employee_no?></small> </div>
                            </div>
                            <div class="col-md-6">
                                <div> <span class="fw-bolder">EMP Name</span> <small class="ms-3"><?php echo $firstname ." " . $mname . " " . $surname?></small> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div> <span class="fw-bolder">Civil Status</span> <small class="ms-3"><?php echo $civil_status?></small> </div>
                            </div>
                            <div class="col-md-6">
                                <div> <span class="fw-bolder">Designation</span> <small class="ms-3"><?php echo $designation?></small> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div> <span class="fw-bolder">Qualified dependent</span> <small class="ms-3"><?php echo $qualified_dependents?></small> </div>
                            </div>
                            <div class="col-md-6">
                                <div> <span class="fw-bolder">Paydate</span> <small class="ms-3"><?php echo $paydate?></small> </div>
                            </div>
                        </div>
                    </div>
                    <table class="mt-4 table table-bordered">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr>
                                <th scope="row">Basic Income:</th>
                                <td><?php echo $_SESSION['basic_income_cutoff'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Honorarium Income:</th>
                                <td><?php echo $_SESSION['hono_income_cutoff'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Other Income:</th>
                                <td><?php echo $_SESSION['other_income_cutoff'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">SSS Contribution:</th>
                                <td><?php echo $_SESSION['sss_contri'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">PhilHealth Contribution:</th>
                                <td><?php echo $_SESSION['philH_contri'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Pagibig Contribution:</th>
                                <td><?php echo $_SESSION['pagibig_contri'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tax Contribution:</th>
                                <td><?php echo $_SESSION['tax_contri'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Total Deduction:</th>
                                <td><?php echo $_SESSION['total_deduct'];?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-4"> <br> <span class="fw-bold">Net Pay : <?php echo $_SESSION['net_income'];?></span> </div>
                </div>
                <div class="row">
                    <div class="col-md-4"> <br> <span class="fw-bold">Net Pay : <?php echo $_SESSION['gross_income'];?></span> </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="d-flex flex-column mt-2"> <span class="fw-bolder">For <?php echo $firstname;?></span> <span class="mt-4">Authorised Signatory</span> </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>