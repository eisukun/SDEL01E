<?php
include 'process/rian_pos_fill.php';
include 'process/session_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body style="background:black url(Images/Assets/pattern.webp);">
    <div class="d-flex">
        <div class="vh-100 sticky-top" style="width: 320px; background-color:#111927">
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
                    <a href="Payroll_page.php" class="nav-link text-white mb-2 <?php echo ($user_privilege == 1 || $user_privilege == 2) ? '' : 'd-none' ?>">
                        Payroll
                    </a>
                </li>
                <li>
                    <a href="payroll_report.php" class="nav-link text-white  mb-2 <?php echo ($user_privilege == 1 || $user_privilege == 2) ? '' : 'd-none' ?>">
                        Payroll Report
                    </a>
                </li>
                <li>
                    <a href="Beefs.php" class="nav-link text-white mb-2 <?php echo ($user_privilege == 1 || $user_privilege == 3) ? '' : 'd-none' ?> "style="background-color: #343b47;border-radius: 5px;">
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
        <div class="flex-grow-1 w-100">
            <main class="container border bg-white">

                <div class="">
                    <!-- dropdown -->
                    <div class="px-3">
                        <div class="btn-group d-flex justify-content-center align-items-center">
                            <div>
                                <button class="btn btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Products
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="Laptops.php">Laptops</a></li>
                                    <li><a class="dropdown-item" href="Beefs.php">Beefs</a></li>
                                    <li><a class="dropdown-item" href="Pastas.php">Pastas</a></li>
                                    <li><a class="dropdown-item" href="Utensils.php">Utensils</a></li>
                                    <li><a class="dropdown-item" href="Clothes.php">Clothes</a></li>
                                </ul>
                            </div>
                            <div class="mx-auto my-2">
                                <h1 class="text-center">Rian's Choice store</h1>
                            </div>
                        </div>
                    </div>
                    <!-- cards -->
                    <div class="row mx-auto row-cols-5">
                        <?php
                        require_once('Prices.php');
                        for ($i = 1; $i < 21; $i++) {
                            $label = "Beef Dish $i";
                            $price = "$Beefs_prices[$i]";
                            echo "
                            <div class='col' onclick='handleItems(\"$label\", \"$price\")' role='button'>
                                <div class='card mb-3 mx-3 ' style='max-width: 300px;'>
                                    <div class='row g-0'>
                                        <img src='Images/Beefs/$i.jpg' class='card-img-top rounded-start' alt='...' height='100' style='width:100%;height:5.2vw;object-fit:contain'/>
                                        <div class='form-check d-flex justify-content-center align-items-center'>
                                            <label class='form-check-label px-3' for='checkbox$i'>
                                                $label - <span style='font-weight:bold;'>₱$price</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                        ?>
                    </div>
                    <!-- inputs -->
                    <div class="row">
                        <div class="col-6 d-flex">
                            <ul class="list-group">
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6" style="white-space:nowrap;">
                                            Name of an Item:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name='item_name' value='<?php echo $item_name ?>' aria-label="Amount (to the nearest dollar)" disabled id="ItemName">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Quantity:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name='quantity' value='<?php echo $quantity ?>' aria-label="Amount (to the nearest dollar)" id="Quantity" min="1">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Price:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name='Itemprice' value='<?php echo $Itemprice ?>' aria-label="Amount (to the nearest dollar)" disabled id="ItemPrice">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6" style="white-space:nowrap;">
                                            Discount Amount:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name='discount_amount' value='<?php echo $discount_amount ?>' aria-label="Amount (to the nearest dollar)" disabled id="Discount">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Discounted Amount:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name='discounted_amount' value='<?php echo $discounted_amount ?>' aria-label="Amount (to the nearest dollar)" disabled id="Discounted">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group">
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Total Quantity:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name='total_quantity' value='<?php echo $total_quantity ?>' aria-label="Amount (to the nearest dollar)" disabled id="totalQuantity">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6" style="white-space:nowrap;">
                                            Total Discount Given:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name='total_discount_given' value='<?php echo $total_discount_given ?>' aria-label="Amount (to the nearest dollar)" disabled id="totalDiscount">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Total Discounted Amount:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name='total_discounted_amount' value='<?php echo $total_discounted_amount ?>' aria-label="Amount (to the nearest dollar)" disabled id="totalDiscounted">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Cash Given:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name='cash_given' value='<?php echo $cash_given ?>' aria-label="Amount (to the nearest dollar)" id="Cash">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Change:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name='customer_change' value='<?php echo $customer_change ?>' aria-label="Amount (to the nearest dollar)" disabled id="Change">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- calculator -->
                        <div class="col-6">
                            <!-- radio -->
                            <div>
                                <ul class="list-group list-group-horizontal gap-5">
                                    <li class="" style="list-style-type: none;">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="senior" value='Senior Citizen' onclick="handleDiscounts(0.30)">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Senior Citizen
                                        </label>
                                    </li>
                                    <li class="" style="list-style-type: none;"> <input class="form-check-input" type="radio" name="flexRadioDefault" value='Discount Card' id="discountCard" onclick="handleDiscounts(0.20)">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            With Disc. Card
                                        </label>
                                    </li>
                                    <li class="" style="list-style-type: none;"> <input class="form-check-input" type="radio" name="flexRadioDefault" value='Employee Discount' id="employee" onclick="handleDiscounts(0.15)">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Employee Disc.
                                        </label>
                                    </li>
                                    <li class="" style="list-style-type: none;"> <input class="form-check-input" type="radio" name="flexRadioDefault" value='No discount' id="noDiscount" onclick="handleDiscounts(0)">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            No Disc.
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <!-- buttons -->
                            <div class="my-3 w-100">
                                <div class="row row-cols-4 mb-3">
                                    <div class="col">
                                        <button type="button" class="btn btn-primary " style="white-space:nowrap" onclick="handleChange()">Calculate Change</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-danger w-100" onclick="handleNew()">New</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-warning w-100" id='save'>Save</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-dark w-100">Update</button>
                                        <input type="text" class="form-control d-none" name='employee_no' value='<?php echo $user_employee_name ?>' aria-label="Amount (to the nearest dollar)" disabled id="employee_no">
                                    </div>
                                </div>
                                <div class="row row-cols-5">
                                    <div class="col-3">
                                        <button type="button" class="btn btn-primary h-100 w-100" onclick="handleCalculator()">Enter</button>
                                    </div>
                                    <div class="col-9">
                                        <div class="row row-cols-3">
                                            <div class="col">
                                                <button type="button" class="btn btn-dark w-100 mb-1" onclick="document.getElementById('Cash').value += '/'">/</button>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark w-100 mb-1" onclick="document.getElementById('Cash').value += '*'">*</button>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark w-100 mb-1" onclick="document.getElementById('Cash').value += '-'">-</button>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark w-100 mb-1" onclick="document.getElementById('Cash').value += '+'">+</button>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark w-100 mb-1" onclick="document.getElementById('Cash').value += '9'">9</button>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark w-100 mb-1" onclick="document.getElementById('Cash').value += '8'">8</button>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark w-100 mb-1" onclick="document.getElementById('Cash').value += '7'">7</button>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark w-100 mb-1" onclick="document.getElementById('Cash').value += '6'">6</button>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark w-100 mb-1" onclick="document.getElementById('Cash').value += '5'">5</button>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark w-100 mb-1" onclick="document.getElementById('Cash').value += '4'">4</button>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark w-100 mb-1" onclick="document.getElementById('Cash').value += '3'">3</button>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark w-100 mb-1" onclick="document.getElementById('Cash').value += '2'">2</button>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark w-100 mb-1" onclick="document.getElementById('Cash').value += '1'">1</button>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark w-100 mb-1" onclick="document.getElementById('Cash').value += '0'">0</button>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark w-100 mb-1" onclick="document.getElementById('Cash').value += '.'">.</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        totalQuantity = 0
        totalDiscount = 0
        totalDiscounted = 0
    </script>
    <script src="js/calculator.js" defer></script>
    <script src="js/change.js" defer></script>
    <script src="js/new.js" defer></script>
    <script src="js/discounts.js" defer></script>
    <script src="js/Items.js" defer></script>
    <script src="js/rian_pos_save.js"></script>
</body>

</html>