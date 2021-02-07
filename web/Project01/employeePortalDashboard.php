<?php
include "../Project01/dbConnect.php";
$db = get_db();
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
  <title>JMSR:Employee Portal Dashboard</title>
</head>

<body>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <h1><a href="../Project01/homepage.php">Josie's Mountain Spa Retreat</a></h1>
  <?php include('navbar.php'); ?>
  <div class="heroImg">
    <img src="hero_empDashboard.jpg" alt="Josie's Mountain Spa Retreat Pool">
  </div>
  <h2>Employee Portal Dashboard:</h2>
  <div class="view_order_container">
    <?php
    $customerOrder_statement = $db->query('SELECT order_id FROM customer_order');
    $customerOrder_statement->execute();

    $customerInfo_statement = $db->query('SELECT first_name, last_name, email, phone_number FROM customer');
    $customerOrder_statement->execute();

    echo "<table><tr><th>Order Number:</th><th>Customer's First Name</th><th>Last Name</th><th>Email</th><th>Phone #</th></tr>";
    while ($orderID_row = $customerOrder_statement->fetch(PDO::FETCH_ASSOC) && $customerInfo_row = $customerInfo_statement->fetch(PDO::FETCH_ASSOC)) {
      $order_id = $orderID_row['order_id'];
      $customer_first_name = $customerInfo_row['first_name'];
      $customer_last_name = $customerInfo_row['last_name'];
      $customer_email = $customerInfo_row['email'];
      $customer_phone_number = $customerInfo_row['phone_number'];

      echo "<tr><td>$order_id</td><td>$customer_first_name</td><td>$customer_last_name</td><td>$customer_email</td><td>$customer_phone_number</td></tr>";
    }
    echo "</table>";
    ?>
  </div>


  <?php include('footer.php'); ?>
</body>

</html>