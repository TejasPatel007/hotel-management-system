<section id="footer">
  <!-- Footer -->
  <footer class="text-center text-lg-start bg-dark text-white">

    <!-- Section: Links  -->
    <section class="d-flex justify-content-center justify-content-lg-between p-2 border-bottom">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <?php echo $general_setting['Name'] ?>
            </h6>
            <p>
              <?php echo $general_setting['Description'] ?>
            </p>

            <div>
              <a href="https://instagram.com/tejaspatel9396" class="ml-4 text-reset">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="https://www.linkedin.com/in/tejaspatel9396" class="ml-4 text-reset">
                <i class="fab fa-linkedin"></i>
              </a>
              <a href="https://github.com/TejasPatel007" class="ml-4 text-reset">
                <i class="fab fa-github"></i>
              </a>
            </div>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful Links
            </h6>
            <p>
              <a href="room.php" class="text-reset">Rooms</a>
            </p>
            <p>
              <a href="../events.php" class="text-reset">Meeting & Events</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Quick links
            </h6>
            <p>
              <a href="../service.php" class="text-reset">Services</a>
            </p>
            <p>
              <a href="../contact.php" class="text-reset">Contact us</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Contact
            </h6>
            <p><i class="fas fa-home me-3"></i>
              <a style="color: #ffffff; text-decoration: none;"
                href="http://maps.google.com/?q=<?php echo $general_setting['Address_line1'] ?>, <?php echo $general_setting['City'] ?>, <?php echo $general_setting['State'] ?>, <?php echo $general_setting['Country'] ?> <?php echo $general_setting['Zip_code'] ?>">
                <?php echo $general_setting['Address_line1'] ?>,
                <?php echo $general_setting['City'] ?>,
                <?php echo $general_setting['State'] ?>,
                <?php echo $general_setting['Country'] ?>
                <?php echo $general_setting['Zip_code'] ?>
              </a>
            </p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              <a style="color: #ffffff; text-decoration: none;" href="mailto:<?php echo $general_setting['Email'] ?>">
                <?php echo $general_setting['Email'] ?>
              </a>
            </p>
            <p><i class="fas fa-phone me-3"></i>
              <a style="color: #ffffff; text-decoration: none;"
                href="tel:<?php echo $general_setting['Phone_number'] ?>">
                <?php echo $general_setting['Phone_number'] ?>
              </a>
            </p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      Copyright &copy;
      <script>document.write(new Date().getFullYear());</script> All rights reserved

    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</section>


<script src="../assets/js/index.js"></script>

<!-- Jquery Time picker  -->

<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

</body>

</html>