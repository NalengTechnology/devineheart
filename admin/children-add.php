<?php
include './admin_components/admin_header.php';
if (isset($_POST['submit_child'])) {
    // Form data
    $child_name = $_POST['child_name'];
    $child_dob = $_POST['child_dob'];
    $child_yoe = $_POST['child_yoe'];
    $child_class = $_POST['child_class'];
    $child_story_behind = $_POST['child_story_behind'];

    // File upload handling
    $target_dir = 'uploads/'; // Specify your target directory
    $target_file = $target_dir . basename($_FILES['child_pic']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, the file already exists.";
        $uploadOk = 0;
    }

    // Check file size (adjust this limit as needed)
    if ($_FILES['child_pic']['size'] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats (you can customize this list)
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk) {
        if (move_uploaded_file($_FILES['child_pic']['tmp_name'], $target_file)) {
            // File was uploaded successfully
            // Store $target_file in the database or perform any other required actions

            $sql = "INSERT INTO children (cname, cdob, cyoe, cclass, cstory, cphoto) 
                    VALUES ('$child_name', '$child_dob', '$child_yoe', '$child_class', '$child_story_behind', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                echo "<script> alert('New record created successfully'); </script>";
            } else {
                echo "<script> alert('Error in Insertion'); </script>";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Child Registration</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
<div id="wrapper">
    
 <?php include './admin_components/admin_side-menu.php' ?>
        <div class="d-flex flex-column" id="content-wrapper">
        <!-- Your page content can go here -->

        <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <?php include './admin_components/admin_top-menu.php' ?>
            </nav>

            <div class="container-fluid">
                <h3 class="text-dark mb-1">Child Registration</h3>
                <hr>
            </div>

            <section class="position-relative py-4 py-xl-5">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                            <div class="card mb-5">
                                <div class="card-body p-sm-5">
                                    <h2 class="text-center mb-4">Registration Form</h2>
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <input class="form-control" type="text" id="name-2" name="child_name"
                                                   placeholder="Child Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control" type="date" id="date-2" name="child_dob"
                                                   placeholder="Date of Birth" required>
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control" type="number" id="year-2" min="1900" max="2200"
                                                   name="child_yoe" placeholder="Year of Enroll" required>
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control" type="number" id="class-2" min="1" max="12"
                                                   name="child_class" placeholder="Class/Grade" required>
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control" id="story-2" name="child_story_behind"
                                                      rows="6" placeholder="Story Behind" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control" type="file" id="pic-2" name="child_pic"
                                                   accept="image/*" required>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary d-block w-100" type="submit"
                                                    name="submit_child">Submit
                                            </button>
                                        </div>
                                        <br>
                                        <div>
                                            <button class="btn btn-primary d-block w-100" type="reset">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/theme.js"></script>
</body>
</html>
<?php include './admin_components/admin_footer.php' ?>