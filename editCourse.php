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
                    <h1 class="page-header" style="color:#337ab7">Edit Course Information </h1>
					<div class="panel-body">
						<div class="row">

							<!-- main form end -->
							
							
						</div>

                <?php   
                    include_once 'php/includes/dbh.inc.php';

                    if (isset($_GET['edit'])) {
                        $id = $_GET['edit'];
                        $res = mysqli_query($conn, "SELECT * FROM course WHERE id='$id'");
                        $row = mysqli_fetch_assoc($res);
                    }

                    if (isset($_POST['submit'])) {
                        $id = $_POST['id'];
                        $courseName = $_POST['courseName'];
                        $courseName_v = $_POST['courseName_v'];
                        $courseCode = $_POST['courseCode'];
                        $summary = $_POST['summary'];
                        $totalHour = $_POST['totalHour'];
                        $lectureHour = $_POST['lectureHour'];
                        $labHour = $_POST['labHour'];
                        $ECTS = $_POST['ECTS'];
        
                        $sql = "UPDATE course
                                SET id='$id', courseName='$courseName', courseName_v = '$courseName_v', courseCode = '$courseCode',
                                summary = '$summary', totalHour = '$totalHour', lectureHour = '$lectureHour', labHour = '$labHour', ECTS = '$ECTS'
                                WHERE id='$id' ";
                        $result = mysqli_query($conn, $sql);
                        header("Location: viewCourse.php");
                        ob_end_flush();

                    }
                ?>

                <form action="editCourse.php" method="POST">
                    <div class = 'table-responsive' >
                        <table class="table" border="1" style="width: 50%; margin-left: 100px">
                            <tr>
                                <th class="success">ID</th>
                                <th><input name="id" value="<?php echo $row['id']; ?>"></th>
                            </tr>
                            <tr>
                                <th class="success">Course Name</th>
                                <th><input name="courseName" value="<?php echo $row['courseName']; ?>"></th>
                            </tr>
                            <tr>
                                <th class="success">Course Name in Vietnamese </th>
                                <th><input name="courseName_v" value="<?php echo $row['courseName_v']; ?>"></th>
                            </tr>
                            <tr>
                                <th class="success">Course Code</th>
                                <th><input name="courseCode" value="<?php echo $row['courseCode']; ?>"></th>
                            </tr>
                            <tr>
                                <th class="success">Summary</th>
                                <th><input name="summary" value="<?php echo $row['summary']; ?>"></th>
                            </tr>
                            <tr>
                                <th class="success">Total Hour </th>
                                <th><input name="totalHour" value="<?php echo $row['totalHour']; ?>"></th>
                            </tr>
                            <tr>
                                <th class="success">Lecture Hour</th>
                                <th><input name="lectureHour" value="<?php echo $row['lectureHour']; ?>"></th>
                            </tr>
                            <tr>
                                <th class="success">Lab Hour</th>
                                <th><input name="labHour" value="<?php echo $row['labHour']; ?>"></th>
                            </tr>
                            <tr>
                                <th class="success">ECTS</th>
                                <th><input name="ECTS" value="<?php echo $row['ECTS']; ?>"></th>
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