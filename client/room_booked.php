<?php include('include/header.php');

if (isset($_SESSION['BookingRefID'])) {
    $ref_id = $_SESSION['BookingRefID'];
    $email = $_SESSION['Email'];
    $query_roomType = "select * from room_booking where ref_id = '$ref_id' AND Email = '$email'";
    $roomType = mysqli_query($con, $query_roomType);
    if (mysqli_num_rows($roomType) > 0) {
        while ($row = mysqli_fetch_assoc($roomType)) {

            $ID = $row['BookingId'];

            $selectBooking = "SELECT rm.*,rt.RoomType,rl.RoomNumber,us.FirstName,us.ContactNo FROM room_booking rm 
                                inner join room_list rl on rl.RoomId = rm.RoomId
                                inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                left join users_details us on us.Userid = rm.User_id 
                                where rm.BookingId = $ID ";

            $single_booking = mysqli_query($con, $selectBooking);
            $num_of_rows = mysqli_num_rows($single_booking);
            $response = array();
            if ($num_of_rows < 1) {
                $response['status'] = 200;
                $response['message'] = "invalid booking id";
            } else {
                while ($row = mysqli_fetch_assoc($single_booking)) {
                    $response = $row;
                }
            }
            ?>
            <section class="py-5 white-section" id="introduction">

                <div class="container">
                    <h2>Congratulations, Your Booking Is Successfull!</h2>
                    <font size="5">
                        <p class="text-justify">

                            <br>
                            Booking Reference Number :
                            <?php echo $ref_id ?>
                            <br>
                            User Name :
                            <?php if (!isset($response["FirstName"])) {
                                echo "---";
                            } else {
                                echo $response["FirstName"];
                            } ?>
                            <br>
                            Email Address :
                            <?php echo $response["Email"] ?>
                            <br>
                            Phone number :
                            <?php echo $response["Phone_number"] ?>
                            <br>
                            Check-In Date :
                            <?php echo $response["CheckIn"] ?>
                            <br>
                            Check-Out Date :
                            <?php echo $response["CheckOut"] ?>
                            <br>
                            Total Cost :
                            <?php echo $response["Amount"] ?>
                            <br>
                            No of Guest :
                            <?php echo $response["NoOfGuest"] ?>

                    </font>

                </div>
            </section>
            <?php
        }
    }
}

?>
<?php include('include/footer.php') ?>