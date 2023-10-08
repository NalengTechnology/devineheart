<?php include './components/top-menu.php';
    include './db-connection.php';
 ?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DHOMS_BT</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/animated-services.css">
    <link rel="stylesheet" href="assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Footer-Big-Logo.css">
    <link rel="stylesheet" href="assets/css/CDRapido-Listado-Socios.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-v2-Modal--Full-with-Google-Map.css">
    <link rel="stylesheet" href="assets/css/Ludens-Users---3-Profile.css">
    <link rel="stylesheet" href="assets/css/Navbar---Logo-Left---Phone-Logo-Left.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer-.css">
</head>

<body>

    <main class="page" style="min-height: 100%;"></main>
    <div style="margin-top: 70px">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 style="width: 343px;">Unsponsored children</h2>
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <a href="child-gallery-sponsored.php"><button class="btn btn-primary d-flex align-items-center align-self-center" type="button" style="height: 38px;background-color: rgb(21,221,4);text-decoration: none;">Sponsored children&nbsp;</button></a></div>
            </div>
            <div class="row">
                <div class="col-md-12"><table id="example" class="table table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Class</th>
                <th>Year of enroll</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
             <?php
                    $sql = "SELECT cid, cname, cdob, cyoe, cclass FROM children WHERE sponsored=0";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $dob = $row["cdob"];
                            $age = (date('Y') - date('Y',strtotime($dob)));
                     ?>
            <tr>
                <td><?php echo $row["cname"]; ?></td>
                <td><?php echo $age; ?></td>
                <td><?php echo $row["cclass"]; ?></td>
                <td><?php echo $row["cyoe"]; ?></td>
                    <td><a href="donation.php"><button type="button" class="btn btn-danger">Donate</button></a>
                        <a href="sponsor-children.php?cid=<?php echo $row['cid']; ?>"><button type="button" class="btn btn-warning">Sponsor</button></a>
                        <a href="send-gift.php?cid=<?php echo $row['cid']; ?>"><button type="button" class="btn btn-info">Send a gift</button></a>
                    </td>
            </tr>
                            <?php
                        }
                    } else {
                        echo "0 results";
                    }

                ?>
        </tbody>
    </table></div>
            </div>
        </div>
    </div>
 <?php include './components/footer.php'; ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
</body>

</html>