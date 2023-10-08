<?php 
 include './components/top-menu.php'; 
include './db-connection.php';

                    if(isset($_POST['submit_feedback'])) {
                        $name = $_POST['full_name'];
                        $address = $_POST['full_address'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $comment = $_POST['comment'];

                        $sql = "INSERT INTO feedback (full_name, full_address, phone, email, comment) 
                                VALUES ('$name', '$address', '$phone', '$email', '$comment')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<script> alert('Feedback successfully sent'); </script>";
                        } else {
                            echo "<script> alert('Error in Insertion'); </script>";
                        }
                        $conn->close();
                    }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/css/animated-services.css">
    <link rel="stylesheet" href="assets/css/Basic-fancyBox-Gallery-v2.css">
    <link rel="stylesheet" href="assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Footer-Big-Logo.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-v2-Modal--Full-with-Google-Map.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Navbar---Logo-Left---Phone-Logo-Left.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer-.css">
</head>

<body>
    <div style="margin-top: 10px;">
        <div class="container-fluid">
            <h1>Contact Information</h1>
            <hr>
            <form action="<?php $_PHP_SELF ?>" id="contactForm-1" action="javascript:void(0);" method="post">
                <!--<input class="form-control" type="hidden" name="Introduction" value="This email was sent from www.awebsite.com">
                <input class="form-control" type="hidden" name="subject" value="Awebsite.com Contact Form"><input class="form-control" type="hidden" name="to" value="email@awebsite.com">
                <div class="row">
                    <div class="col-md-6">
                        <div id="successfail-1"></div>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-12 col-md-6" id="message-1">
                        <h2 class="h4"><i class="fa fa-envelope"></i> Contact Us<small><small class="required-input">&nbsp;(*required)</small></small></h2>
                        <div class="form-group mb-3">
                            <label class="form-label" for="from-name">Name</label><span class="required-input">*</span>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                                <input class="form-control" type="text" id="from-name-1" name="full_name" required="" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="from-email">Address</label><span class="required-input">*</span>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                <input class="form-control" type="text" id="from-email-1" name="full_address" required="" placeholder="Address">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="from-email">Email</label><span class="required-input">*</span>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                <input class="form-control" type="email" id="from-email-1" name="email" required="" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="from-phone">Phone</label><span class="required-input">*</span>
                                    <div class="input-group"><span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    <input class="form-control" type="tel" id="from-phone-1" name="phone" required="" placeholder="Phone/Mobile"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="from-comments">Comments</label>
                            <textarea class="form-control" id="from-comments-1" name="comment" placeholder="Enter Comments" rows="5"></textarea></div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-primary d-block w-100" type="reset"><i class="fa fa-undo"></i> Reset</button></div>
                                <div class="col">
                            <button name="submit_feedback" class="btn btn-primary d-block w-100" type="submit">Submit <i class="fa fa-chevron-circle-right"></i></button></div>
                            </div>
                        </div>
                        <hr class="d-flex d-md-none">
                    </div>
                    <div class="col-12 col-md-6">
                        <h2 class="h4"><i class="fa fa-location-arrow"></i> Locate Us</h2>
                        <div class="row">
                            <div class="col-12">
                                <div class="static-map"><a rel="noopener" href="https://www.google.com/maps/place/Njia+Panda+Ya+Kifude/@-6.4568081,38.5858722,10z/data=!4m10!1m2!2m1!1sMakurunge+kifude!3m6!1s0x185c9b987dd1efe1:0xc6a398fd11f52443!8m2!3d-6.4568231!4d38.757987!15sChBNYWt1cnVuZ2Uga2lmdWRlkgEWdHJhbnNwb3J0YXRpb25fc2VydmljZeABAA!16s%2Fg%2F11t5yn_52b?entry=ttu" target="_blank"> <img class="img-fluid" src="https://maps.gstatic.com/tactile/pane/default_geocode-1x.png" alt="Google Map of Makurunge Bagamoyo"></a></div>
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <h2 class="h4"><i class="fa fa-user"></i> Our Info</h2>
                                <div><span><strong>Name</strong></span></div>
                                <div><span>email@awebsite.com</span></div>
                                <div><span>www.devineheartorphanage.com</span></div>
                                <hr class="d-sm-none d-md-block d-lg-none">
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <h2 class="h4"><i class="fa fa-location-arrow"></i> Our Address</h2>
                                <div><span><strong>DEVINE HEART ORPHANAGE</strong></span></div>
                                <div><span>Makurunge,Bagamoyo,</span></div>
                                <div><span>Coast, Tanzania.</span></div>
                                <div><abbr data-toggle="tooltip" data-placement="top" title="Office Phone: +255-629-098-693"></abbr> +255-629-098-693</div>
                                <hr class="d-sm-none">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal fade" role="dialog" tabindex="-1" id="modal1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Contact Information</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="contactForm-2" action="javascript:void(0);" method="get"><input class="form-control" type="hidden" name="Introduction" value="This email was sent from www.awebsite.com"><input class="form-control" type="hidden" name="subject" value="Awebsite.com Contact Form"><input class="form-control" type="hidden" name="to" value="email@awebsite.com">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="successfail-2"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6" id="message-2">
                                    <h2 class="h4"><i class="fa fa-envelope"></i> Contact Us<small><small class="required-input">&nbsp;(*required)</small></small></h2>
                                    <div class="form-group mb-3"><label class="form-label" for="from-name">Name</label><span class="required-input">*</span>
                                        <div class="input-group"><span class="input-group-text"><i class="fa fa-user-o"></i></span><input class="form-control" type="text" id="from-name-2" name="name" required="" placeholder="Full Name"></div>
                                    </div>
                                    <div class="form-group mb-3"><label class="form-label" for="from-email">Email</label><span class="required-input">*</span>
                                        <div class="input-group"><span class="input-group-text"><i class="fa fa-envelope-o"></i></span><input class="form-control" type="text" id="from-email-2" name="email" required="" placeholder="Email Address"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                            <div class="form-group mb-3"><label class="form-label" for="from-phone">Phone</label><span class="required-input">*</span>
                                                <div class="input-group"><span class="input-group-text"><i class="fa fa-phone"></i></span><input class="form-control" type="text" id="from-phone-2" name="phone" required="" placeholder="Primary Phone"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                            <div class="form-group mb-3"><label class="form-label" for="from-calltime">Best Time to Call</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></div><select class="form-select" id="from-calltime-2" name="call time">
                                                        <optgroup label="Best Time to Call">
                                                            <option value="Morning" selected="">Morning</option>
                                                            <option value="Afternoon">Afternoon</option>
                                                            <option value="Evening">Evening</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3"><label class="form-label" for="from-comments">Comments</label><textarea class="form-control" id="from-comments-2" name="comments" placeholder="Enter Comments" rows="5"></textarea></div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col"><button class="btn btn-primary d-block w-100" type="reset"><i class="fa fa-undo"></i> Reset</button></div>
                                            <div class="col"><button class="btn btn-primary d-block w-100" type="submit">Submit <i class="fa fa-chevron-circle-right"></i></button></div>
                                        </div>
                                    </div>
                                    <hr class="d-flex d-md-none">
                                </div>
                                <div class="col-12 col-md-6">
                                    <h2 class="h4"><i class="fa fa-location-arrow"></i> Locate Us</h2>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="static-map"><a rel="noopener" href="https://www.google.com/maps/place/Daytona+International+Speedway/@29.1815062,-81.0744275,15z/data=!4m13!1m7!3m6!1s0x88e6d935da1cced3:0xa6b3e1bc0f2fc83a!2s1801+W+International+Speedway+Blvd,+Daytona+Beach,+FL+32114!3b1!8m2!3d29.187028!4d-81.0703076!3m4!1s0x88e6d949a4cb8593:0x1387c6c0b5c8cc97!8m2!3d29.1851681!4d-81.0705292" target="_blank"> <img class="img-fluid" src="http://maps.googleapis.com/maps/api/staticmap?autoscale=2&amp;size=600x210&amp;maptype=roadmap&amp;format=png&amp;visual_refresh=true&amp;markers=size:mid%7Ccolor:0xff0000%7Clabel:%7C582+1801+W+International+Speedway+Blvd+Daytona+Beach+FL+32114&amp;zoom=12" alt="Google Map of Daytona International Speedway"></a></div>
                                        </div>
                                        <div class="col-sm-6 col-md-12 col-lg-6">
                                            <h2 class="h4"><i class="fa fa-user"></i> Our Info</h2>
                                            <div><span><strong>Name</strong></span></div>
                                            <div><span>email@awebsite.com</span></div>
                                            <div><span>www.awebsite.com</span></div>
                                            <hr class="d-sm-none d-md-block d-lg-none">
                                        </div>
                                        <div class="col-sm-6 col-md-12 col-lg-6">
                                            <h2 class="h4"><i class="fa fa-location-arrow"></i> Our Address</h2>
                                            <div><span><strong>Office Name</strong></span></div>
                                            <div><span>55 Icannot Dr</span></div>
                                            <div><span>Daytone Beach, FL 85150</span></div>
                                            <div><abbr data-toggle="tooltip" data-placement="top" title="Office Phone: 555-867-5309">O:</abbr> 555-867-5309</div>
                                            <hr class="d-sm-none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>
</body>
<?php include './components/footer.php'; ?>
</html>