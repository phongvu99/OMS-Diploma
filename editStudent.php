<?php
    ob_start();
    include 'php/header.php';
?>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Home</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        

        <?php include('php/menu.php'); ?>
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
	  
            <div class="row">
			
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:#337ab7">Edit Bachelor Information </h1>
					<div class="panel-body">
						<div class="row">

							<!-- main form end -->
							
							
						</div>

                <?php   
                    include_once 'php/includes/dbh.inc.php';

                    if (isset($_GET['edit'])) {
                        $id = $_GET['edit'];
                        $res = mysqli_query($conn, "SELECT * FROM profile WHERE id='$id'");
                        $row = mysqli_fetch_assoc($res);
                    }

                    if (isset($_POST['submit'])) {
                        $id = $_POST['id'];
                        $fullName = $_POST['fullName'];
                        $fullName_v = $_POST['fullName_v'];
                        $gender = $_POST['gender'];
                        $dob = $_POST['dob'];
                        $dob_v = $_POST['dob_v'];
                        $pob = $_POST['pob'];
                        $pob_v = $_POST['pob_v'];
                        $address = $_POST['address'];
                        $city = $_POST['city'];
                        $country = $_POST['country'];
                        $ethnicity = $_POST['ethnicity'];
                        $martialStatus = $_POST['martialStatus'];
                        $nationality = $_POST['nationality'];
                        $phoneNum = $_POST['phoneNum'];
                        $mail = $_POST['mail'];
                        $sql = "UPDATE profile 
                                SET id='$id', fullName='$fullName', fullName_v = '$fullName_v', dob = '$dob', dob_v = '$dob_v',
                                pob = '$pob', pob_v = '$pob_v', address = '$address', city = '$city', country = '$country',
                                ethnicity = '$ethnicity', martialStatus = '$martialStatus', nationality = '$nationality',
                                phoneNum = '$phoneNum', mail = '$mail'
                                WHERE id='$id' ";
                        $result = mysqli_query($conn, $sql);
                        header("Location: viewStudent.php");
                        ob_end_flush();

                    }
                ?>

                <form action="editStudent.php" method="POST">
                    <div class = 'table-responsive' >
                        <table class="table" border="1" style="width: 50%; margin-left: 100px">
                            <tr>
                                <th class="success">ID</th>
                                <th><input name="id" value="<?php echo $row['id']; ?>"></th>
                            </tr>
                            <tr>
                                <th class="success">Full Name</th>
                                <th><input name="fullName" value="<?php echo $row['fullName']; ?>"></th>
                            </tr>
                            <tr>
                                <th class="success">Full Name in Vietnamese </th>
                                <th><input name="fullName_v" value="<?php echo $row['fullName_v']; ?>"></th>
                            </tr>
                            <tr>
                                <th class="success">Gender</th>
                                <th><input name="gender" value="<?php echo $row['gender']; ?>"></th>
                            </tr>
                            <tr>
                                <th class="success">DOB</th>
                                <th><input name="dob" value="<?php echo $row['dob']; ?>"></th>
                            </tr>
                            <tr>
                                <th class="success">DOB in Vietnamese </th>
                                <th><input name="dob_v" value="<?php echo $row['dob_v']; ?>"></th>
                            <tr>
                                <th class="success">POB</th>
                                <th><input name="pob" value="<?php echo $row['pob']; ?>"></th>
                            <tr>
                                <th class="success">POB in Vietnamese</th>
                                <th><input name="pob_v" value="<?php echo $row['pob_v']; ?>"></th>
                            <tr>
                                <th class="success">Address</th>
                                <th><input name="address" value="<?php echo $row['address']; ?>"></th>
                            <tr>
                                <th class="success">City</th>
                                <th><input name="city" value="<?php echo $row['city']; ?>"></th>
                            <tr>
                                <th class="success">Country</th>
                                <th><input name="country" value="<?php echo $row['country']; ?>"></th>
                            <tr>
                                <th class="success">Ethnicity</th>
                                <th><input name="ethnicity" value="<?php echo $row['ethnicity']; ?>"></th>
                            <tr>
                                <th class="success">Martial Status</th>
                                <th><input name="martialStatus" value="<?php echo $row['martialStatus']; ?>"></th>
                            <tr>
                                <th class="success">Nationality </th>
                                <th><input name="nationality" value="<?php echo $row['nationality']; ?>"></th>
                            <tr>
                                <th class="success">Phone Number</th>
                                <th><input name="phoneNum" value="<?php echo $row['phoneNum']; ?>"></th>
                            <tr>
                                <th class="success">Email</th>
                                <th><input name="mail" value="<?php echo $row['mail']; ?>"></th>             
                            </tr>
                        </table>                        
                    </div>
                    <input type="submit" name="submit" value="Update" style="margin-left: 100px">
                </form>
                    </div>
						
					</div>
							<!-- notification panel end -->
				</div>
			</div>
		</div>
	</div>
	
</div>