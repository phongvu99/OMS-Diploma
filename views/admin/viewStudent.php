<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/views/include/dbh.inc.php';
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

        

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/navbar.php'; ?>
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
                                    <th></th>
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
                                        <td><a href="editStudent.php?edit='.$row['id'].'">Edit</a>
                                        <td>'.$row['id'].'</td>
                                        <td>'.$row['fullName'].'</td>
                                        <td>'.$row['fullName_v'].'</td>
                                        <td>'.$row['gender'].'</td>
                                        <td>'.$row['dob'].'</td>
                                        <td>'.$row['dob_v'].'</td>
                                        <td>'.$row['pob'].'</td>
                                        <td>'.$row['pob_v'].'</td>
                                        <td>'.$row['address'].'</td>
                                        <td>'.$row['city'].'</td>
                                        <td>'.$row['country'].'</td>
                                        <td>'.$row['ethnicity'].'</td>
                                        <td>'.$row['martialStatus'].'</td>
                                        <td>'.$row['nationality'].'</td>
                                        <td>'.$row['phoneNum'].'</td>
                                        <td>'.$row['mail'].'</td>
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


