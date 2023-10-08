<?php
include './db-connection.php';
include './components/top-menu.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your CSS stylesheets and other head content here -->
</head>
<body>
    <div class="container">
        <div class="row fbox3">
            <?php
            $sql = "SELECT cid, cname, cphoto FROM children WHERE sponsored = 0";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $childName = $row["cname"];
                    $photoUrl = $row["cphoto"];
                    
                    // Debugging: Output the URL/path to check if it's correct
                    echo "Photo URL: $photoUrl<br>";
                    
                    ?>
                    <div class="col-sm-4 d-flex justify-content-center align-items-center">
                        <a data-fancybox="gallery" data-caption="<?php echo $childName; ?>" href="<?php echo $photoUrl; ?>">
                            <img class="img-fluid" src="<?php echo $photoUrl; ?>" alt="<?php echo $childName; ?>">
                        </a>
                    </div>
                    <?php
                }
            } else {
                echo "No results found";
            }
            ?>
        </div>
    </div>

    <?php include './components/footer.php'; ?>

    <!-- Add your JavaScript and other scripts here -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>
</body>
</html>
