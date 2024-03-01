<?php
include('include/header.php');
?>

<!-- Room Payment Modal -->

<div class="modal" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Make Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="model-payment" action="status_functions.php" method="POST">
                    <!-- for getting the id when the form is submitted  -->
                    <label for="paymentType">Choose payment method</label>
                    <select name="paymentType" id="paymentType"
                        class="form-control custom-select bg-white border-md filter" required>

                        <option value="Cash">Cash</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Debit Card">Debit Card</option>
                    </select>
                    <input type="hidden" id="bookingId" name="bookingId">

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Pay</button>
                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- End of room payment modal  -->

<!-- Event Payment Modal -->

<div class="modal" id="eventPaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Make Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="event-modal-payment" action="status_functions.php" method="POST">
                    <!-- for getting the id when the form is submitted  -->
                    <label for="eventPaymentType">Choose payment method</label>
                    <select name="eventPaymentType" id="eventPaymentType"
                        class="form-control custom-select bg-white border-md filter" required>

                        <option value="Cash">Cash</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Debit Card">Debit Card</option>
                    </select>
                    <input type="hidden" id="eventBookingId" name="eventBookingId">

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Pay</button>
                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- End of Event payment modal  -->

<?php
$booking = '';

if (isset($_POST['msg'])) {
    $booking .= '<div class="alert alert-success" role="alert">' . $_POST["msg"] . ' </div>';
}
if (isset($_POST["error"])) {
    $booking .= '<div class="alert alert-danger">' . $_POST["error"] . '</div>';
}
$booking .= '<section class="py-5 white-section" id="fetchmybooking">
<div class="container" id="fetchedbookings">';

$bookingTypeFilter = $_POST['bookingTypeFilter'];
$email = $_POST['email'];
$ref_id = $_POST['ref_id'];
if ($bookingTypeFilter == 1) {

    $selectBooking = "SELECT rm.*,rt.RoomType,rl.RoomNumber FROM
        room_booking rm inner join room_list rl on rl.RoomId = rm.RoomId
        inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId
        where rm.Email = '$email' AND rm.ref_id = '$ref_id' order by rm.Date desc";

    $all = mysqli_query($con, $selectBooking);
    if (mysqli_num_rows($all) >= 1) {
        while ($row = mysqli_fetch_assoc($all)) {

            $booking .= '
        <div id="roomBooking" >
            <div class="card card-margin">
                <div class="card-header no-border">
                    <h5 class="card-title">' . $row['Status'] . '</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="widget-49">
                        <div class="widget-49-title-wrapper">';
            if ($row['Status'] == "Booked") {
                $booking .= ' <div class="widget-49-date-primary"> ';
            } else if ($row['Status'] == "Paid") {
                $booking .= ' <div class="widget-49-date-success"> ';
            } else if ($row['Status'] == "Cancelled") {
                $booking .= ' <div class="widget-49-date-warning"> ';
            } else if ($row['Status'] == "Rejected") {
                $booking .= ' <div class="widget-49-date-danger"> ';
            }
            //checked Out
            else {
                $booking .= ' <div class="widget-49-date-success"> ';
            }
            $booking .= '<span class="widget-49-date-day">' . date('d', strtotime($row['Date']))
                . '</span>  <span class="widget-49-date-month">' . date('M', strtotime($row['Date']))
                . '</span>  <span class="widget-49-date-year">' . date('Y', strtotime($row['Date']))
                . '</span>
                                            </div>
                                            
                                        </div>
                                        <ul class="widget-49-meeting-points">
                                        <li class="widget-49-meeting-item"><span> Booking Reference ID : ' . $ref_id . '</span></li>
                                        <li class="widget-49-meeting-item"><span> Room Type : ' . $row['RoomType'] . '</span></li>
                                        <li class="widget-49-meeting-item"><span> Room No : ' . $row['RoomNumber'] . '</span></li>
                                        <li class="widget-49-meeting-item"><span> Booked Date : ' . $row['Date'] . '</span></li>
                                            <li class="widget-49-meeting-item"><span>Check-In
                                                    Date : ' . $row['CheckIn'] . '</span></li>
                                            <li class="widget-49-meeting-item"><span">Check-Out
                                                    Date : ' . $row['CheckOut'] . '</span></li>

                                            <li class="widget-49-meeting-item"><span">Total
                                                    Cost : <i class="fa fa-usd" aria-hidden="true"></i>' .
                $row['Amount'] . '</span></li>

                                            <li class="widget-49-meeting-item"><span>No of Guest : ' . $row['NoOfGuest']
                . '</span></li>
                                            <li class="widget-49-meeting-item"><span>Email : ' . $row['Email'] .
                '</span></li>
                                            <li class="widget-49-meeting-item"><span>Phone number : ' .
                $row['Phone_number'] . '</span></li>
                                        </ul>';
            $booking .= '<div class="time"> ';
            if ($row['Status'] == "Booked") {
                $booking .= ' 
                                            <a href="#" class="btn btn-primary btn-sm" onclick="setPaid(\'' . $row["BookingId"] . '\' )">Pay</a>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="confirm(\'Are you sure ? Do you want to Cancel this Booking ? \') && setCancel(\'' . $row["BookingId"] . '\' )">Cancel</a>
                                             ';
            }
            $booking .= ' 
        <span class="pull-right">Modified Date : ' . $row['Modified_date'] .
                '</span>
        </div> ';

            $booking .= '          </div>
                                </div>
                            </div>
                        </div>
                    
                </section>';
        }
    } else {

        $booking .= '
                    <br><br><h1 class="text-center text-danger">No Booked Rooms are available for 
                    Email - ' . $email . ' and Booking Reference ID - ' . $ref_id . '</h2><br><br>
                    </div>
                    </section>'
        ;

    }
} else if ($bookingTypeFilter == 2) {
    $selectBooking = "SELECT em.*,et.EventType,el.HallNumber FROM
    event_booking em inner join event_list el on el.EventId = em.EventId
    inner join event_type et on el.EventTypeId = et.EventTypeId 
    where em.Email = '$email' AND em.ref_id = '$ref_id'order by em.Date desc";
    $all = mysqli_query($con, $selectBooking);

    if (mysqli_num_rows($all) >= 1) {
        while ($row = mysqli_fetch_assoc($all)) {

            $booking .= '
                      <div id="eventBooking"" >
                          <div class="card card-margin">
                              <div class="card-header no-border">
                                  <h5 class="card-title">' . $row['Status'] . '</h5>
                              </div>
                              <div class="card-body pt-0">
                                  <div class="widget-49">
                                      <div class="widget-49-title-wrapper">';
            if ($row['Status'] == "Booked") {
                $booking .= '   <div class="widget-49-date-primary"> ';
            } else if ($row['Status'] == "Paid") {
                $booking .= '   <div class="widget-49-date-success"> ';
            } else if ($row['Status'] == "Cancelled") {
                $booking .= '   <div class="widget-49-date-warning"> ';
            } else if ($row['Status'] == "Rejected") {
                $booking .= '   <div class="widget-49-date-danger"> ';
            }
            //checked Out
            else {
                $booking .= '   <div class="widget-49-date-success"> ';
            }
            $booking .= '  
            <span class="widget-49-date-day">' . date('d', strtotime($row['Date']))
                . '</span>  <span class="widget-49-date-month">' . date('M', strtotime($row['Date']))
                . '</span>  <span class="widget-49-date-year">' . date('Y', strtotime($row['Date']))
                . '</span>
                                          </div>
                                          
                                      </div>
                                      <ul class="widget-49-meeting-points">
                                          <li class="widget-49-meeting-item"><span">Booking Reference ID : ' . $ref_id . '</span></li>
                                          <li class="widget-49-meeting-item"><span">Event Type : ' . str_replace(" Hall", "", $row['EventType']) . '</span></li>
                                          <li class="widget-49-meeting-item"><span">Hall No : ' . $row['HallNumber'] . '</span></li>
                                          <li class="widget-49-meeting-item"><span">Booked Date : ' . $row['Date'] . '</span></li>
                                          <li class="widget-49-meeting-item"><span">Event Date : ' . $row['Event_date'] . '</span></li>
                                          <li class="widget-49-meeting-item"><span">Event Time : ' . $row['EventTime'] . '</span></li>
                                          <li class="widget-49-meeting-item"><span">Time Limit : ' . $row['Package'] . ' hrs</span></li>
                                          
                                          <li class="widget-49-meeting-item"><span">Total Cost : <i class="fa fa-usd" aria-hidden="true"></i>' . $row['Amount'] . '</span></li>
                                  
                                          <li class="widget-49-meeting-item"><span>No of Guest : ' . $row['NoOfGuest'] . '</span></li>
                                          <li class="widget-49-meeting-item"><span>Email : ' . $row['Email'] . '</span></li>
                                          <li class="widget-49-meeting-item"><span>Phone number : ' . $row['Phone_number'] . '</span></li>
                                      
                                  
                                      </ul>';
            $booking .= '<div class="time"> ';
            if ($row['Status'] == "Booked") {
                $booking .= '
                                          <a href="#" class="btn btn-primary btn-sm" onclick="setEventPaid(\'' . $row["BookingId"] . '\')">Pay</a>
                                          <a href="#" class="btn btn-danger btn-sm" onclick="confirm(\'Are you sure ? Do you want to Cancel this Booking ?\') && setEventCancel(\'' . $row["BookingId"] . '\')">Cancel</a>
                                          ';
            }
            $booking .= ' 
        <span class="pull-right">Modified Date : ' . $row['Modified_date'] .
                '</span>
        </div> ';

            $booking .= ' </div>
                              </div>
                          </div>
                      </div>
                      </section>';
        }
    } else {
        $booking .= '
                    <br><br><h1 class="text-center text-danger">No Booked Events are available for 
                    Email - ' . $email . ' and Booking Reference ID - ' . $ref_id . '</h2><br><br>
                    </div>
                    </section>'
        ;
    }
} else {
    $booking .= '
                    <br><br><h1 class="text-center text-danger">No Booked Rooms/Events are available for 
                    Email - ' . $email . ' and Booking Reference ID - ' . $ref_id . '</h2><br><br>
                    </div>
                    </section>'
    ;
}
echo $booking;

?>

<script src="js/mybookingRoom.js"></script>
<script src="js/mybookingEvent.js"></script>

<?php include("include/footer.php") ?>