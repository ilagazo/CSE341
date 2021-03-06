<?php
session_start();

$error_msg = $_GET['error'];
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
  <title>JMSR: Cart</title>
</head>

<body>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <h1><a href="../Project01/homepage.php">Josie's Mountain Spa Retreat</a></h1>
  <?php include('navbar.php'); ?>
  <div class="heroImg">
    <img src="../Project01/Images/hero_cart.jpg" alt="Josie's Mountain Spa Retreat Fireplace">
  </div>
  <h2>Cart:</h2>
  <div class="text-section">
    <h2>Your Satisfaction is Our Guarantee</h2>
    <p><b>Remember, all packages come with access to the pool and patio, and a complimentary meal.</b><br>
    Didn't see a change when removing an item? Try refreshing the page or proceed to checkout!</p><br>
    <?php echo "<div class=\"error_alert\"><p>$error_msg</p></div>"; ?>
  </div>
  <!-- Products -->
  <div class="product_container">
    <div class="product">
      <p>Price: $100</p>
      <img src="../Project01/Images/swedishMassage.jpg" alt="Swedish Massage Package">
      <p>Swedish Massage Package<br>Quantity Ordered: <?php echo $_SESSION["prod1"]; ?></p>
      <form action="../Project01/cart.php" method="POST">
        <button class="btn btn-outline-danger" type="submit" name="submit_p1">Remove</button>
      </form>
    </div>

    <div class="product">
      <p>Price: $150</p>
      <img src="../Project01/Images/hotStoneMassage.jpg" alt="Hot Stone Massage Package">
      <p>Hot Stone Massage<br>Quantity Ordered: <?php echo $_SESSION["prod2"]; ?></p>
      <form action="../Project01/cart.php" method="POST">
        <button class="btn btn-outline-danger" type="submit" name="submit_p2">Remove</button>
      </form>
    </div>

    <div class="product">
      <p>Price: $175</p>
      <img src="../Project01/Images/coupleMassage.jpg" alt="Couples Massage Package">
      <p>Couples Massage Package<br>Quantity Ordered: <?php echo $_SESSION["prod3"]; ?></p>
      <form action="../Project01/cart.php" method="POST">
        <button class="btn btn-outline-danger" type="submit" name="submit_p3">Remove</button>
      </form>
    </div>

    <div class="product">
      <p>Price: $125</p>
      <img src="../Project01/Images/prenatal.jpg" alt="Prenatal Massage Package">
      <p>Prenatal Massage Package<br>Quantity Ordered: <?php echo $_SESSION["prod4"]; ?></p>
      <form action="../Project01/cart.php" method="POST">
        <button class="btn btn-outline-danger" type="submit" name="submit_p4">Remove</button>
      </form>
    </div>

    <div class="product">
      <p>Price: $125</p>
      <img src="../Project01/Images/aromaTherapy.jpg" alt="Aromatherapy Massage Package">
      <p>Aromatherapy Massage Package<br>Quantity Ordered: <?php echo $_SESSION["prod5"]; ?></p>
      <form action="../Project01/cart.php" method="POST">
        <button class="btn btn-outline-danger" type="submit" name="submit_p5">Remove</button>
      </form>
    </div>
  </div>

  <!-- Button Container -->
  <div class="button_checkout">
    <a class="btn btn-outline-primary" href="../Project01/services.php">Continue Shopping</a>
    <a class="btn btn-outline-primary" href="../Project01/isProductThere.php">Proceed to Checkout</a>
  </div>

  <!-- PHP to remove products in cart -->
  <?php
  if (isset($_POST['submit_p1']) && $_SESSION["prod1"] >= 1) {
    unset($_SESSION["prod1"]);
    $_SESSION["prod1"] = "0";
    header("Refresh:5");
  }
  if (isset($_POST['submit_p2']) && $_SESSION["prod2"] >= 1) {
    unset($_SESSION["prod2"]);
    $_SESSION["prod2"] = "0";
    header("Refresh:5");
  }
  if (isset($_POST['submit_p3']) && $_SESSION["prod3"] >= 1) {
    unset($_SESSION["prod3"]);
    $_SESSION["prod3"] = "0";
    header("Refresh:5");
  }
  if (isset($_POST['submit_p4']) && $_SESSION["prod4"] >= 1) {
    unset($_SESSION["prod4"]);
    $_SESSION["prod4"] = "0";
    header("Refresh:5");
  }
  if (isset($_POST['submit_p5']) && $_SESSION["prod5"] >= 1) {
    unset($_SESSION["prod5"]);
    $_SESSION["prod5"] = "0";
    header("Refresh:5");
  }
  ?>


  <?php include('footer.php'); ?>
</body>

</html>