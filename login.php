<?php
 
 include('include/header.php');

 
 ?>
<!-- Navbar-->



<div class="container">
    <div class="row align-items-center my-5">
        <!-- Registeration Form -->
        <div class="col-md-3 col-lg-5 ml-auto">
        <div class="login-form">
         <form action="validation.php" method="POST" enctype="multipart/form-data" >
        <?php
                if (isset($_GET["error"])) {
                    echo '<div class="text-danger text-center">' . $_GET["error"] . '</div>';
                }
        ?>   
        <div class="form-group mt-3">
        	<div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <span class="fa fa-user"></span>
                    </span>                    
                </div>
                <input type="text" class="form-control" name="email" placeholder="Email" required="required">				
            </div>
        </div>
		<div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                    </span>                    
                </div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">				
            </div>
        </div>    

        <div class="form-group ">
            <button type="submit" name="user_login" class="btn btn-primary login-btn btn-block">Sign in</button>
        </div>
 
    </form>
    <p class="text-center text-muted small">Don't have an account? <a href="signup.php">Sign up here!</a></p>
</div>
        </div>
    </div>
</div>



<?php include('include/footer.php')?>
<!-- validation -->

<?php

?>

