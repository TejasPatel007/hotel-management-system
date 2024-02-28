<?php

include('include/header.php');

?>
<!-- Navbar-->

<div class="container">
    <div class="row align-items-center my-5">
        <!-- Registeration Form -->
        <form action="register.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="row">
                <div class="container mb-4">
                    <?php
                    if (isset($_GET["error"])) {
                        echo '<div class="text-danger text-center">' . $_GET["error"] . '</div>';
                    }
                    ?>
                </div>

                <!-- First Name -->
                <div class="input-group col-lg-6 mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-user text-muted"></i>
                        </span>
                    </div>
                    <input id="firstName" type="text" name="firstname" placeholder="First Name"
                        class="form-control bg-white border-left-0 border-md" required>
                </div>

                <!-- Last Name -->
                <div class="input-group col-lg-6 mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-user text-muted"></i>
                        </span>
                    </div>
                    <input id="lastName" type="text" name="lastname" placeholder="Last Name"
                        class="form-control bg-white border-left-0 border-md" required>
                </div>

                <!-- Email Address -->
                <div class="input-group col-lg-12 mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-envelope text-muted"></i>
                        </span>
                    </div>
                    <input id="email" type="email" name="email" placeholder="Email Address"
                        class="form-control bg-white border-left-0 border-md" required>
                </div>

                <!-- Phone Number -->
                <div class="input-group col-lg-12 mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-phone-square text-muted"></i>
                        </span>
                    </div>

                    <input id="phoneNumber" type="tel" name="contactno" pattern="[6789][0-9]{9}"
                        placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3" required>
                </div>

                <!-- Job -->
                <div class="input-group col-lg-12 mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-black-tie text-muted"></i>
                        </span>
                    </div>
                    <select id="job" name="gender" class="form-control custom-select bg-white border-left-0 border-md"
                        required>
                        <option value="">Choose your Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <!-- Password -->
                <div class="input-group col-lg-6 mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-lock text-muted"></i>
                        </span>
                    </div>
                    <input id="password" type="password" name="password" placeholder="Password"
                        class="form-control bg-white border-left-0 border-md" required>
                </div>

                <!-- Password Confirmation -->
                <div class="input-group col-lg-6 mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-lock text-muted"></i>
                        </span>
                    </div>
                    <input id="passwordConfirmation" type="password" name="conformPassword"
                        placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md" required>
                </div>

                <!-- Submit Button -->
                <div class="form-group col-lg-12 mx-auto mb-0">
                    <button type="submit" class="btn btn-primary btn-block py-2" name="user_registration">
                        <span class="font-weight-bold">Create your account</span>
                    </button>
                </div>

                </br>
                </br>
                <!-- Already Registered -->
                <div class="text-center w-100">
                    <p class="text-muted font-weight-bold">Already Registered? <a href="login.php"
                            class="text-primary ml-2">Login</a></p>
                </div>

            </div>
        </form>
    </div>
</div>


<?php include('include/footer.php') ?>