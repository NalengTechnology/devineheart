<?php include './components/top-menu.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Sponsorship</title>
    <!-- Add your CSS stylesheets and other head content here -->
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        /* Add your custom CSS styles here */
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .program-title {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .program-description {
            color: #555;
            font-size: 16px;
        }

        .child-details {
            margin-top: 20px;
        }

        .child-details .item {
            color: #777;
        }

        .ui.form {
            margin-top: 20px;
        }

        .ui.form h4 {
            margin-top: 20px;
            color: #333;
        }

        .ui.form .field label {
            font-weight: bold;
            color: #444;
        }

        .ui.form input[type="text"],
        .ui.form input[type="email"],
        .ui.form input[type="tel"],
        .ui.form input[type="number"],
        .ui.form select,
        .ui.form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }

        .ui.form select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url('path/to/your/select-arrow.png') no-repeat right center;
            background-size: 20px;
            padding-right: 30px;
        }

        .ui.form button {
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .ui.form button:hover {
            background-color: #0056b3;
        }

        /* Center the child's details table */
        .child-details-table-container {
            display: flex;
            justify-content: center;
        }

        .child-details-table {
            width: 80%;
        }

        .child-details-table th,
        .child-details-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .child-details-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_POST['submit'])) {
            $cid = $_GET['cid'];
            $noofyear = $_POST['noofyear'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $amount = $_POST['amount'];
            $checkno = $_POST['checkno'];

            $sql = "INSERT INTO sponsorer (spn_firstname, spn_lastname, spnd_date, spn_noofyears, spn_email, spn_phone, spn_bill_address, spn_amount, spn_checkno, cid) 
                        VALUES ('$firstname', '$lastname', NOW(), '$noofyear', '$email', '$phone', '$address', '$amount', '$checkno', '$cid')";

            $sql2 = "UPDATE children SET sponsored=1 WHERE cid='$cid' ";

            if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
                $unsponsored_page = './child-gallery-sponsored.php';
                header('Location: ' . $unsponsored_page);
                echo "<script> alert('New record created successfully'); </script>";
            } else {
                echo "<script> alert('Error in Insertion'); </script>";
            }
            $conn->close();
        }
        ?>

        <form action="<?php $_PHP_SELF ?>" method="post" class="ui form">
            <div class="text-center">
                <h2 class="program-title">Change Lives with Your Support</h2>
                <p class="program-description">
                    <strong>
                        When you donate to our programs, you're not just giving money; you're giving hope and a brighter future to orphaned and vulnerable children. Your generosity has the power to transform lives.
                    </strong>
                </p>
            </div>

            <?php
            if (isset($_GET['cid'])) {
                $cid = $_GET['cid'];
            } else {
                $unsponsored_page = './child-gallery-sponsored.php';
                header('Location: ' . $unsponsored_page);
            }

            $sql = "SELECT cid, cname, cdob, cyoe, cclass FROM children WHERE cid='$cid'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $dob = $row["cdob"];
                    $age = (date('Y') - date('Y', strtotime($dob)));
                    ?>
                    <!-- Child's Details -->
                    <div class="child-details-table-container">
                        <table class="child-details-table">
                            <tr>
                                <th>Name</th>
                                <td><?php echo $row["cname"]; ?></td>
                            </tr>
                            <tr>
                                <th>Age</th>
                                <td><?php echo $age; ?></td>
                            </tr>
                            <tr>
                                <th>Class</th>
                                <td><?php echo $row["cclass"]; ?></td>
                            </tr>
                            <tr>
                                <th>Year of enroll</th>
                                <td><?php echo $row["cyoe"]; ?></td>
                            </tr>
                        </table>
                    </div>
                    <?php
                }
            }
            ?>

            <!-- Sponsor Type -->
            <h4 class="ui dividing header">Sponsor Type</h4>
            <div class="two fields">
                <div class="field">
                    <select name="noofyear" class="ui fluid dropdown" required>
                        <option value="">Number of Years</option>
                        <option value="1">1 Year</option>
                        <option value="2">2 Years</option>
                        <option value="3">3 Years</option>
                        <option value="5">5 Years</option>
                    </select>
                </div>
                <div class="field">
                    <p>
                        * 1 year, pay Rs.4800 or $112 USD <br>
                        * 2 years, pay Rs.9600 or $224 USD <br>
                        * 3 years, pay Rs.15000 or $335 USD <br>
                        * 5 years, pay Rs.25000 or $581 USD <br>
                    </p>
                </div>
            </div>

            <!-- Personal Information -->
            <h4 class="ui dividing header">Personal Information</h4>
            <div class="fields">
                <div class="eight wide field">
                    <label>First Name</label>
                    <input type="text" name="firstname" placeholder="First Name" required>
                </div>
                <div class="eight wide field">
                    <label>Last Name</label>
                    <input type="text" name="lastname" placeholder="Last Name">
                </div>
            </div>

            <div class="fields">
                <div class="eight wide field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="eight wide field">
                    <label>Phone No.</label>
                    <input type="tel" name="phone" placeholder="Phone / Mobile" required>
                </div>
            </div>

            <div class="field">
                <label>Billing Address</label>
                <div class="field">
                    <div class="sixteen wide field">
                        <input type="text" name="address" placeholder="Address" required>
                    </div>
                </div>
            </div>

            <!-- Billing Information -->
            <h4 class="ui dividing header">Billing Information</h4>
            <div class="fields">
                <div class="eight wide field">
                    <label>Amount</label>
                    <input type="number" name="amount" min="1" maxlength="16" placeholder="Amount" required>
                </div>
            </div>
            <div class="fields">
                <div class="eight wide field">
                    <label>Check / DD no.</label>
                    <input type="text" name="checkno" required>
                </div>
            </div>

            <button name="submit" class="ui primary button" tabindex="0">Submit</button>
        </form>
    </div>

    <?php include './components/footer.php'; ?>

    <!-- Add your JavaScript and other scripts here -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>
</body>

</html>
