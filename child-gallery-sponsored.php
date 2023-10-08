<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DHOMS_BT</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Include other CSS files if needed -->
    <style>
        /* Add custom CSS for styling */
        .child-card {
            background-color: #f0f0f0; /* Set a background color for the cards */
            margin: 10px; /* Add margin for spacing */
        }
    </style>
</head>

<body>
    <?php
    include './components/top-menu.php';
    include './db-connection.php';

    $sql = "SELECT cid, cname, cdob, cyoe, cclass FROM children WHERE sponsored=1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $childCount = 0; // Initialize child counter
        echo '<div class="container mt-4"><h1 class="text-center">Child Information</h1><div class="row">';
        while ($row = $result->fetch_assoc()) {
            $dob = $row["cdob"];
            $age = (date('Y') - date('Y', strtotime($dob)));

            // Retrieve sponsor information for the child
            $cid = $row['cid'];
            $sql1 = "SELECT spn_firstname, spn_lastname, spn_email FROM sponsorer WHERE cid='$cid'";
            $result1 = $conn->query($sql1);
            $sponsorInfo = '';

            if ($result1->num_rows > 0) {
                $sponsorRow = $result1->fetch_assoc();
                $sponsorInfo = '<p><b>Sponsored By:</b> ' . $sponsorRow['spn_firstname'] . ' ' . $sponsorRow['spn_lastname'] . ' (' . $sponsorRow['spn_email'] . ')</p>';
            }

            // Start a new row every 4 children
            if ($childCount % 4 == 0) {
                echo '</div><div class="row">';
            }

            echo '<div class="col-md-3"><div class="card child-card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">' . $row['cname'] . '</h4>
                        <p class="card-text">
                            <ul class="list-unstyled">
                                <li><b>Age:</b> ' . $age . '</li>
                                <li><b>Class:</b> ' . $row['cclass'] . '</li>
                                <li><b>Year of Enroll:</b> ' . $row['cyoe'] . '</li>
                            </ul>
                        </p>
                        ' . $sponsorInfo . '
                    </div>
                </div></div>';

            $childCount++;
        }
        echo '</div></div>';
    } else {
        echo "No child is sponsored";
    }
    ?>
    <?php include './components/footer.php'; ?>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Include other JavaScript files if needed -->
</body>

</html>
