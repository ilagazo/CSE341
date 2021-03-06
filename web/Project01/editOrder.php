<?php
include "../Project01/dbConnect.php";
$db = get_db();

$id = $_GET['order_id'];
$emp_id = $_GET['transfer_id']
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- Local CSS -->
    <link rel="stylesheet" href="project01.css">
    <title>JMSR: Customer Order Information</title>
</head>

<body>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <h1><a href="../Project01/homepage.php">Josie's Mountain Spa Retreat</a></h1>
    <?php include('navbar.php'); ?>
    <div class="heroImg">
        <img src="../Project01/Images/hero_editOrders.jpg" alt="Josie's Mountain Spa Retreat Edit Orders">
    </div>
    <h2>Customer Order Information:</h2>
    <?php
    echo " <div class=\"order_container\">";
    // Retrieve data from each column and table
    $statement = $db->query("SELECT customer_order.order_id, customer_order.customer_id, customer_order.payment_id, customer_order.product_id, customer_order.address_id,
                                customer.first_name, customer.last_name, customer.email, customer.phone_number, 
                                product.product_name, product.price, product.quantity,
                                address.address_st, address.city, address.postal_code, address.state,
                                payment.payment_type, payment.card_number, payment.name_on_card
                                FROM customer_order 
                                INNER JOIN customer ON customer_order.customer_id = customer.customer_id
                                INNER JOIN payment ON customer_order.payment_id = payment.payment_id
                                INNER JOIN address ON customer_order.address_id = address.address_id
                                INNER JOIN product ON customer_order.product_id = product.product_id
                                WHERE customer_order.order_id = '{$id}'");
    $statement->execute();

    // Display the table into a "neat" table
    echo "<div class=\"order_container\"><table><tr><th>Order Number</th><th>Customer ID</th><th>Payment ID</th><th>Product ID</th><th>Address ID</th></tr>";
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        // Order Info Row
        $order_id = $row['order_id'];
        $cust_id = $row['customer_id'];
        $pay_id = $row['payment_id'];
        $prod_id = $row['product_id'];
        $add_id = $row['address_id'];
        echo "<tr><td>$order_id</td><td>$cust_id</td><td>$pay_id</td><td>$prod_id</td><td>$add_id</td></tr></table></div>";
        // / Customer Info Row
        echo "<div class=\"order_container\"><table><tr><th>Customer's First Name</th><th>Last Name</th><th>Email</th><th>Phone #</th></tr>";
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $phone = $row['phone_number'];
        echo "<tr><td>$first_name</td><td>$last_name</td><td>$email</td><td>$phone</td></tr></table></div>";
        // Product Info Row
        echo "<div class=\"order_container\"><table><tr><th>Product</th><th>Price</th><th>Quantity Ordered</th><th>Total</th></tr>";
        $prod_name = $row['product_name'];
        $price = $row['price'];
        $prod_qty = $row['quantity'];
        $total = $price * $prod_qty;
        echo "<tr><td>$prod_name</td><td>$price</td><td>$prod_qty</td><td>$total</td></tr></table></div>";
        // Address / Payment Row
        echo "<div class=\"order_container\"><table><tr><th>Address</th>
            <th>Payment Type</th><th>Card Number</th><th>Name On Card</th></tr>";
        $add_st = $row['address_st'];
        $city = $row['city'];
        $postal_code = $row['postal_code'];
        $state = $row['state'];
        $pay_type = $row['payment_type'];
        $pay_num = $row['card_number'];
        $pay_name = $row['name_on_card'];
        echo "<tr><td>$add_st, $city $state, $postal_code</td>
            <td>$pay_type</td><td>$pay_num</td><td>$pay_name</td></tr>";
    }
    echo "</table></div></div>";
    ?>

    <div class="text-section">
        <h3>Dear Employee:</h3>
        <p>Please fill out the form fully and only make changes where needed.<br><br>
            <b>REMEMBER TO NEVER CHANGE ANY OF THE DISPLAYED IDs! FILL OUT IDs AS DISPLAYED ABOVE! FOR STATE, USE ABBREVIATION!</b>
        </p>
    </div>

    <!-- Change Data Form -->
    <h4>Edit Data Form:</h4>
    <form action="../Project01/updateData.php" method="POST">
        <div class="billing_info">
            <div class="billing_info_seperate">
                <div class="form-group">
                    <label for="id">Order ID:</label><br>
                    <input type="number" id="id" name="id" required minlength="1" placeholder="Order ID #">
                </div>
                <div class="form-group">
                    <label for=cust_id>Customer ID:</label><br>
                    <input type="number" id="cust_id" name="cust_id" required minlength="1" placeholder="Customer ID #">
                </div>
                <div class="form-group">
                    <label for="pay_id">Payment ID:</label><br>
                    <input type="number" id="pay_id" name="pay_id" required minlength="1" placeholder="Payment ID #">
                </div>
                <div class="form-group">
                    <label for="prod_id">Product ID:</label><br>
                    <input type="number" id="prod_id" name="prod_id" required minlength="1" placeholder="Product ID #">
                </div>
                <div class="form-group">
                    <label for="add_id">Address ID:</label><br>
                    <input type="number" id="add_id" name="add_id" required minlength="1" placeholder="Address ID #">
                </div>
                <input type="hidden" id="transfer" name="transfer" value="<?= $emp_id ?>" />
            </div>
            <div class="billing_info_seperate">
                <div class="form-group">
                    <label for="first_name">First Name:</label><br>
                    <input type="text" id="first_name" name="first_name" required maxlength="50" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label><br>
                    <input type="text" id="last_name" name="last_name" required maxlength="50" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email"  class="form-control" required maxlength="50" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="phone">Phone #:</label><br>
                    <input type="text" id="phone" name="phone" required minlength="11" maxlength="11" placeholder="19511111111">
                </div>
            </div>
            <div class="billing_info_seperate">
                <div class="form-group">
                    <label for="address">Street Address:</label><br>
                    <input type="text" id="address" name="address" required maxlength="50" placeholder="Address">
                </div>
                <div class="form-group">
                    <label for="state">State:</label><br>
                    <input type="text" id="state" name="state" required maxlength="14" placeholder="State (i.e. UT)">
                </div>
                <div class="form-group">
                    <label for="city">City:</label><br>
                    <input type="text" id="city" name="city" required maxlength="50" placeholder="City">
                </div>
                <div class="form-group">
                    <label for="zipCode">Zipcode:</label><br>
                    <input type="text" id="zipCode" name="zipCode" required maxlength="10" placeholder="Zip Code">
                </div>
            </div>
            <div class="billing_info_seperate">
                <!-- Radio Buttons -->
                <div class="form-check form-check-inline">
                    <input type="radio" id="card_type_visa" name="card_type" value="Visa" class="form-check-input">
                    <label for="card_type_visa" class="form-check-label">Visa</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="card_type_mc" name="card_type" value="Mastercard" class="form-check-input">
                    <label for="card_type_mc" class="form-check-label">Mastercard</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="card_type_dis" name="card_type" value="Discover" class="form-check-input">
                    <label for="card_type_dis" class="form-check-label">Discover</label>
                </div>

                <div class="form-group">
                    <label for="card_name">Name on Card:</label><br>
                    <input type="text" id="card_name" name="card_name" required maxlength="255" placeholder="Name on Card">
                </div>
                <div class="form-group">
                    <label for="card_number">Card Number:</label><br>
                    <input type="text" id="card_number" name="card_number" minlength="16" maxlength="16" placeholder="Card Number">
                </div>
                <div class="form-group">
                    <label for="card_security">Security Code:</label><br>
                    <input type="number" id="card_security" name="card_security" min="0" minlength="3" maxlength="3" placeholder="Security Code">
                </div>
                <div class="form-group">
                    <label for="card_exp_month">Expiration Month:</label><br>
                    <input type="number" id="card_exp_month" name="card_exp_month" min="1" max="12" minlength="2" maxlength="2" placeholder="Exp. Month">
                </div>
                <div class="form-group">
                    <label for="card_exp_month">Expiration Year:</label><br>
                    <input type="number" id="card_exp_year" name="card_exp_year" min="22" max='99' minlength="2" maxlength="2" placeholder="Exp. Year">
                </div>
            </div>
        </div>
        <!-- Button Container -->
        <div class="button_checkout">
            <button type="submit" class="btn btn-outline-primary" name="change" value="change">Confirm Changes</button>
            <button type="submit" class="btn btn-outline-primary" name="delete" value="delete">Delete Order</button>
        </div>
    </form>
    <?php include('footer.php'); ?>
</body>

</html>