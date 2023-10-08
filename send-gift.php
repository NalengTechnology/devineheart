<?php
include './components/top-menu.php';

if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];
} else {
    $unsponsored_page = './child-gallery-sponsored.php';
    header('Location: ' . $unsponsored_page);
}
?>

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
        .ui.form input[type="date"],
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

        .ui.form .field input[type="date"] {
            padding: 10px;
        }

        .ui.form .field label {
            display: block;
            margin-bottom: 5px;
        }

        .ui.form button.primary {
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .ui.form button.secondary {
            background-color: #ccc;
            color: #333;
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }

        .ui.form button.primary:hover {
            background-color: #0056b3;
        }

        /* Center the child's details table */
        .child-details-table-container {
            display: flex;
            justify-content: center;
        }

        /* Add more custom styles as needed */
    </style>
</head>

<body>
    <div class="container">
        <h1 class="program-title">Child Sponsorship</h1>

        <?php
        if (isset($_POST['submit_gift'])) {
            $gift_type = $_POST['gift_type'];
            $sending_date = $_POST['sending_date'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            $sql = "INSERT INTO gift (cid, gift_type, sending_date, sender_name, email, phone, sender_address) 
                    VALUES ('$cid', '$gift_type', '$sending_date', '$name', '$email', '$phone', '$address')";

            if ($conn->query($sql) === TRUE) {
                $unsponsored_page = './child-gallery-unsponsored.php';
                header('Location: ' . $unsponsored_page);
                echo "<script> alert('New record created successfully'); </script>";
            } else {
                echo "<script> alert('Error in Insertion'); </script>";
            }

            $conn->close();
        }
        ?>

        <div class="child-details-table-container">
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>Detail</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT cid, cname, cdob, cyoe, cclass FROM children WHERE cid='$cid' ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $dob = $row["cdob"];
                            $age = (date('Y') - date('Y', strtotime($dob)));
                    ?>

                            <tr>
                                <td>Name</td>
                                <td><strong><?php echo $row["cname"]; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td><strong><?php echo $age; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Class</td>
                                <td><strong><?php echo $row["cclass"]; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Year of Enroll</td>
                                <td><strong><?php echo $row["cyoe"]; ?></strong></td>
                            </tr>

                    <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br>
        <div class="ui form">
            <form action="<?php $_PHP_SELF ?>" method="post">
                <h4 class="ui dividing header">Gift Details</h4>
                <div class="field">
                    <label>Type of Gift</label>
                    <input type="text" name="gift_type" placeholder="Eg. Dress, Toy,.." required>
                </div>

                <div class="field">
                    <label>Sending Date</label>
                    <input type="date" name="sending_date" required>
                </div>

                <h4 class="ui dividing header">Personal Information</h4>
                <div class="field">
                    <label>Full Name</label>
                    <input type="text" name="name" placeholder="Full Name" required>
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="field">
                    <label>Phone no.</label>
                    <input type="tel" name="phone" placeholder="Phone / Mobile" required>
                </div>
                <div class="field">
                    <label>Address</label>
                    <input type="text" name="address" placeholder="Address" required>
                </div>
                <button name="submit_gift" class="ui primary button" type="submit">Submit</button>
                <button class="ui button secondary" type="reset">Reset</button>
            </form>
        </div>
    </div>
    <?php include './components/footer.php'; ?>
</body>

</html>
