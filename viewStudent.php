<?php
    include 'php/header.php';
?>
<?php   
    include_once "php/includes/dbh.inc.php";
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
                    <h1 class="page-header" style="color:#337ab7">View Bachelor Information </h1>
					<div class="panel-body">
						<div class="row">

							<!-- main form end -->
							
							
						</div>

                        <div class="table-responsive">
                            <table class="table" border="1">
                                <tr class="success">
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Full Name in Vietnamese </th>
                                    <th>Gender</th>
                                    <th>DOB</th>
                                    <th>DOB in Vietnamese </th>
                                    <th>POB</th>
                                    <th>POB in Vietnamese</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Ethnicity</th>
                                    <th>Martial Status</th>
                                    <th>Nationality </th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                </tr>


                                <?php   
                                    $sql = "SELECT * FROM profile";
                                    $result = mysqli_query($conn, $sql);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>
                                        <th>'.$row['id'].'</th>
                                        <th>'.$row['fullName'].'</th>
                                        <th>'.$row['fullName_v'].'</th>
                                        <th>'.$row['gender'].'</th>
                                        <th>'.$row['dob'].'</th>
                                        <th>'.$row['dob_v'].'</th>
                                        <th>'.$row['pob'].'</th>
                                        <th>'.$row['pob_v'].'</th>
                                        <th>'.$row['address'].'</th>
                                        <th>'.$row['city'].'</th>
                                        <th>'.$row['country'].'</th>
                                        <th>'.$row['ethnicity'].'</th>
                                        <th>'.$row['martialStatus'].'</th>
                                        <th>'.$row['nationality'].'</th>
                                        <th>'.$row['phoneNum'].'</th>
                                        <th>'.$row['mail'].'</th>
                                    </tr>';
                                    }
                        
                
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


