<?php
    session_start();
    require '../include/config.php'; //DB configuration & connect

    // Authenticate user.
	if($_SESSION['user_type'] != 1) {
		header("Location: ../index.php?error=loginerror"); //Redirect to home page.
		echo "You must login first";
		exit();
    }
    // check login status
	else if(!isset($_SESSION['email'])){
		header("Location: ../index.php?error=loginerror");
		echo "You must login first";
		exit();
	}
    // include header and title
    include 'admin_header.php';
    echo '<title>Book Booking Requests</title>';
?>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="overflow-x:auto;">
                <!-- Booking request table -->
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <!-- <th>Arrival_date</th>
                        <th>Depart_date</th> -->    
                        <th>Copies</th>
                        <!-- <th>Room Type</th> -->
                        <th>Confirm</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM bookng_request";
                        $result = mysqli_query($db_con, $sql);
                        $sl_no= 1;
                        foreach($result as $request_room) //Itteration for all booking
                        {
                    ?>
                    <!-- Booking info -->
                    <tr>
                        <td> <?php echo $request_room['id'];?></td>
                        <td> <?php echo $request_room['fullname'];?></td>
                        <td> <?php echo $request_room['email'];?></td>
                        <td> <?php echo $request_room['phone'];?></td>
                        <td> <?php echo $request_room['cu_address'];?></td>
                       
                        <td> <?php echo $request_room['num_of_person'];?></td>
                       
                        <td><a href="">confirm booking</a></td>
                    </tr>
                    <?php
                            $sl_no++; //Increase count
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <?php
        include "admin_footer.php";
    ?>
</body>