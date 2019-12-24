<?php
    session_start();
    require '../include/config.php'; //DB configuration & connect

     // Authenticate user.
	if($_SESSION['user_type'] != 1) {
		header("Location: ../index.php?error=loginerror"); //Redirect to home page with error message.
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
    echo '<title>User</title>';
?>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 table-responsive" >
                <!-- User table -->
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Is Admin</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM users";
                        $result = mysqli_query($db_con, $sql);
                        $sl_no= 1;
                        foreach($result as $user)
                        {
                    ?>
                    <!-- User info -->
                    <tr>
                        <td> <?php echo $user['id'];?></td>
                        <td> <?php echo $user['fullName'];?></td>
                        <td> <?php echo $user['uname'];?></td>
                        <td> <?php echo $user['email'];?></td>
                        <td> <?php echo $user['is_admin'];?></td>
                    </tr>
                    <?php
                            $sl_no++;  //Increasing row based on user count
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