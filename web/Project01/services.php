<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- Local CSS -->
    <link rel="stylesheet" href="project01.css">
    <title>JMSR:Services</title>
</head>

<body>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <h1><a href="../Project01/homepage.php">Josie's Mountain Spa Retreat</a></h1>
    <?php include('navbar.php'); ?>
    <div class="heroImg">
        <img src="../Project01/Images/hero_services.jpg" alt="Josie's Mountain Spa Retreat Pool">
    </div>
    <div class="text-section">
        <h2>How It Works:</h2>
        <p>We've provided a unique way for you to order the packages you want ahead of time. Simply pick and choose the experiences you want to enjoy
            and once you've finished checking out, we will contact you to schedule an appointment for the best possible time!<br><br>
            <b>Remember, all packages come with access to the pool and patio, and a complimentary meal.</b>
        </p>
    </div>
    <h3>Services Offered:</h2>
        <form action="cart.php" method="POST">
            <!-- Products -->
            <div class="product_container">
                <div class="product">
                    <p>Price: $100</p>
                    <img src="../Project01/Images/swedishMassage.jpg" alt="Swedish Massage Package">
                    <input type="number" id="prod1" name="item1" min="0" max="3" value="0">
                    <br><br><label for="prod1">Swedish Massage Package<br></label>

                </div>
                <div class="product">
                    <p>Price: $150</p>
                    <img src="../Project01/Images/hotStoneMassage.jpg" alt="Hot Stone Massage Package">
                    <input type="number" id="prod2" name="item2" min="0" max="3" value="0">
                    <br><br><label for="prod2">Hot Stone Massage Package<br></label>
                </div>
                <div class="product">
                    <p>Price: $175</p>
                    <img src="../Project01/Images/coupleMassage.jpg" alt="Couples Massage Package">
                    <input type="number" id="prod3" name="item3" min="0" max="3" value="0">
                    <br><br><label for="prod3">Couples Massage Package<br></label>
                </div>
                <div class="product">
                    <p>Price: $125</p>
                    <img src="../Project01/Images/prenatal.jpg" alt="Prenatal Massage Package">
                    <input type="number" id="prod4" name="item4" min="0" max="3" value="0">
                    <br><br><label for="prod4">Prenatal Massage Package<br></label>
                </div>
                <div class="product">
                    <p>Price: $125</p>
                    <img src="../Project01/Images/aromaTherapy.jpg" alt="Aromatherapy Massage Package">
                    <input type="number" id="prod5" name="item5" min="0" max="3" value="0">
                    <br><br><label for="prod5">Aromatherapy Massage Package<br></label>
                </div>
            </div>
            <!-- Submit Button -->
            <button type="submit" name="submit">Proceed to Cart</button>
        </form>

        <!-- Check if items were sent via post -->
        <?php
        if (isset($_POST["item1"])) {
            $_SESSION["item1"] = $_POST["item1"];
        }
        if (isset($_POST["item2"])) {
            $_SESSION["item2"] = $_POST["item2"];
        }
        if (isset($_POST["item3"])) {
            $_SESSION["item3"] = $_POST["item3"];
        }
        if (isset($_POST["item4"])) {
            $_SESSION["item4"] = $_POST["item4"];
        }
        if (isset($_POST["item5"])) {
            $_SESSION["item5"] = $_POST["item5"];
        }
        ?>

        <?php include('footer.php'); ?>
</body>

</html>