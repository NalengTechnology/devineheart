<?php include './components/top-menu.php'; ?>
<style>
    /* Custom CSS for the Donation Application page */
    body {
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    .ui.form {
        margin-top: 20px;
    }

    .field label {
        font-weight: bold;
    }

    /* Style the buttons */
    .ui.primary.button {
        background-color: #007bff;
        color: #fff;
    }

    .ui.button[type="reset"] {
        background-color: #ccc;
        color: #333;
    }

    /* Additional CSS for responsiveness */
    @media screen and (max-width: 768px) {
        .container {
            padding: 10px;
        }
    }

    /* Additional styles for an attractive design */
    .ui.radio.checkbox label {
        color: #007bff;
        font-weight: bold;
    }

    .ui.radio.checkbox input:checked~label {
        background-color: #007bff;
        color: #fff !important;
    }

    /* Improved styling for form fields */
    .field {
        margin-bottom: 15px;
    }

    .field input[type="text"],
    .field input[type="number"],
    .field input[type="email"],
    .field input[type="tel"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }
        /* Style the buttons */
    .ui.primary.button {
        background-color: #007bff;
        color: #fff;
        padding: 12px 24px;
        font-size: 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .ui.primary.button:hover {
        background-color: #0056b3;
    }

    .ui.button[type="reset"] {
        background-color: #ccc;
        color: #333;
        padding: 12px 24px;
        font-size: 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-left: 10px;
    }

    .ui.button[type="reset"]:hover {
        background-color: #999;
    }
</style>

<div class="container">
    <h1>Donation Application</h1>

    <?php
    include './db-connection.php';

    if ($conn) {
        $sql = "SELECT COUNT(*) AS program_count FROM programs";
        $result = $conn->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            $programCount = $row["program_count"];

            if ($programCount > 0) {
            // Donation form submission logic
            if (isset($_POST['submit_donation'])) {
                $program = $_POST['program'];
                $amount = $_POST['amount'];
                $checkno = $_POST['check'];
                $bank_name = $_POST['bank_name'];
                $place = $_POST['place'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];

                // Insert the donation details into the database
                $insertSql = "INSERT INTO donation (program, amount, checkno, bank_name, place, d_name, email, phone, d_address) 
                              VALUES ('$program', '$amount', '$checkno', '$bank_name', '$place', '$name', '$email', '$phone', '$address')";

                if ($conn->query($insertSql) === TRUE) {
                    echo "<script> alert('Successfully Donation form Submitted'); </script>";
                } else {
                    echo "<script> alert('Error in Insertion'); </script>";
                }
            }

            // Donation form HTML
            ?>
             <form action="<?php $_PHP_SELF ?>" method="post" class="ui form">
                    <!-- Select the program to sponsor -->
                    <h4 class="ui dividing header">Select the program to sponsor</h4>
                    <div class="grouped fields">
                        <?php
                        $programQuery = "SELECT program_title FROM programs";
                        $programResult = $conn->query($programQuery);

                        if ($programResult && $programResult->num_rows > 0) {
                            while ($programRow = $programResult->fetch_assoc()) {
                                $programName = $programRow["program_title"];
                                ?>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="program" tabindex="0" class="hidden" id="<?php echo $programName; ?>" value="<?php echo $programName; ?>">
                                        <label for="<?php echo $programName; ?>"><?php echo $programName; ?></label>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "No programs found.";
                        }
                        ?>
                    </div>
                <!-- Rest of the form fields here -->
                <div class="field">
                    <label>Amount</label>
                    <input type="number" name="amount" min="1" placeholder="Amount" required>
                </div>

                <!-- Check and Demand Draft -->
                <h4 class="ui dividing header">Check and Demand Draft</h4>
                <div class="field">
                    <label>Check / DD no.</label>
                    <input type="text" name="check" placeholder="Check / DD no." required>
                </div>
                <div class="field">
                    <label>Bank Name</label>
                    <input type="text" name="bank_name" placeholder="Bank Name" required>
                </div>
                <div class="field">
                    <label>Place</label>
                    <input type="text" name="place" placeholder="Place" required>
                </div>

                <!-- Personal Information -->
                <h4 class="ui dividing header">Personal Information</h4>
                <div class="field">
                    <label>Name</label>
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
                <button name="submit_donation" class="ui primary button" type="submit">Submit</button>
                <button class="ui button" type="reset">Reset</button>
            </form>
            <!-- End of Donation form -->
        <?php
        } else {
            echo "<p>No programs are currently available for donation.</p>";
        }
    } else {
        echo "<p>Error fetching program data.</p>";
    }
} else {
    echo "<p>Error connecting to the database.</p>";
}
?>

<span class="p-20"></span>
</div>

<?php include './components/footer.php'; ?>
