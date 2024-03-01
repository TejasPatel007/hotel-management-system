<?php

include('include/header.php');


?>
<!-- Navbar-->


<div class="container">
  <div class="row align-items-center my-5">
    <!-- Login Form -->
    <div class="login-form">
      <form action="fetchData.php" method="POST" enctype="multipart/form-data">
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
            <input type="text" class="form-control" name="email" placeholder="Email Address" required="required">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fa fa-lock"></i>
              </span>
            </div>
            <input type="text" class="form-control" name="ref_id" placeholder="Booking Reference ID" maxlength="10"
              required="required">
          </div>
        </div>

        <div class="form-group">
            <select name="bookingTypeFilter" id="bookingTypeFilter" class="form-control custom-select bg-white border-md filter">
                <option value="1" selected>Room</option>
                <option value="2">Event</option>
            </select>
        </div>

        <div class="form-group ">
          <button type="submit" name="fetch_booking" class="btn btn-primary login-btn btn-block">Fetch Booking</button>
        </div>

      </form>
    </div>
  </div>
</div>



<?php include('include/footer.php') ?>
<!-- validation -->

<?php

?>