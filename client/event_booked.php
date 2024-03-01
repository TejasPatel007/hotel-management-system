<?php include('include/header.php');

if (isset($_SESSION['BookingRefID'])) {
    $ref_id = $_SESSION['BookingRefID'];
    $email = $_SESSION['Email'];
    $query_roomType = "select * from event_booking where ref_id = '$ref_id' AND Email = '$email'";
    $roomType = mysqli_query($con, $query_roomType);
    if (mysqli_num_rows($roomType) > 0) {
        while ($row = mysqli_fetch_assoc($roomType)) {

            $ID = $row['BookingId'];

            $selectBooking = "SELECT em.*,et.EventType,el.HallNumber,us.FirstName FROM event_booking em 
                                inner join event_list el on el.EventId = em.EventId
                                inner join event_type et on el.EventTypeId = et.EventTypeId 
                                left join users_details us on us.Userid = em.User_id  
                                where em.BookingId = $ID ";

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
                            Event Date :
                            <?php echo $response["Event_date"] ?>
                            <br>
                            Event Start Time :
                            <?php echo $response["EventTime"] ?>
                            <br>
                            Event Duration :
                            <?php echo $response["Package"] ?> Hours
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