
<?php
$item_name = '';
$quantity= '';
$discount_amount = '';
$discounted_amount  = '';
$total_quantity  ="";
$total_discount_given  = "";
$total_discounted_amount  = "";
$cash_given = '';
$customer_change = '';
$Itemprice = '';

if (isset($_GET['id'])) {
    include 'process/db_connection.php';
    $conn = OpenCon();
    $id = $_GET['id'];
    $sql = "SELECT * FROM `salestbl` where id = $id";
    $result = mysqli_fetch_assoc($conn->query($sql));
    $item_name = $result['item_name'];
    $quantity = $result['quantity'];
    $discount_amount = $result['discount_amount'];
    $discounted_amount = $result['discounted_amount'];
    $total_quantity = $result['total_quantity'];
    $total_discount_given = $result['total_discount_given'];
    $total_discounted_amount = $result['total_discounted_amount'];
    $cash_given = $result['cash_given'];
    $customer_change = $result['customer_change'];
    $Itemprice = $result['price'];
}
