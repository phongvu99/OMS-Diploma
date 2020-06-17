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
                    <h1 class="page-header" style="color:#337ab7">View Course Information </h1>
					<div class="panel-body">
						<div class="row">

							<!-- main form end -->
							
							
						</div>

                        <div class="table-responsive">
                            <table class="table" border="1">
                                <tr class="success">
                                    <th>ID</th>
                                    <th>Course Name</th>
                                    <th>Course Name in Vietnamese </th>
                                    <th>Course Code</th>
                                    <th>Summary</th>
                                    <th>Total Hour </th>
                                    <th>Lecture Hour</th>
                                    <th>Lab Hour</th>
                                </tr>


                                <?php   
                                    $sql = "SELECT * FROM course";
                                    $result = mysqli_query($conn, $sql);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>
                                        <th>'.$row['id'].'</th>
                                        <th>'.$row['courseName'].'</th>
                                        <th>'.$row['courseName_v'].'</th>
                                        <th>'.$row['courseCode'].'</th>
                                        <th>'.$row['summary'].'</th>
                                        <th>'.$row['totalHour'].'</th>
                                        <th>'.$row['lectureHour'].'</th>
                                        <th>'.$row['labHour'].'</th>
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


