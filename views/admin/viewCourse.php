<?php
    include $_SERVER['DOCUMENT_ROOT'] .  '/views/templates/header.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/views/include/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
        <script type="text/javascript">
        
		$(document).ready(function(){

            $('#first_level').multiselect({
            nonSelectedText:'Select Academic Year',
            buttonWidth:'400px',
            onChange:function(option, checked){
            $('#second_level').html('');
            $('#second_level').multiselect('rebuild');
            var selected = this.$select.val();
            if(selected.length > 0)
            {
            $.ajax({
                url:"/views/admin/fetchYear.php",
                method:"POST",
                data:{selected:selected},
                success:function(data)
                {
                $('#second_level').html(data);
                $('#second_level').multiselect('rebuild');
                console.log(data);
                }
            })
            }
            }
            });

            $('#second_level').multiselect({
            nonSelectedText: 'Select Major',
            buttonWidth:'400px'
            });
        });
        </script>
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
                    <h1 class="page-header" style="color:#337ab7">View Course Information </h1>
					<div class="panel-body">
						<div class="row">

							<!-- main form end -->
							
							
						</div>

                        <form role="form" action="viewCourse.php" method="post">
                            <h3>Select Year</h3>
                            <select id="first_level" name="first_level" multiple class="form-control">
                            <?php 
		                    	$query = "SELECT * FROM year";

                                $result = mysqli_query($conn, $query);
                            
								while ($row = mysqli_fetch_assoc($result)){
									echo '<option value="'.$row["id"].'">'.$row["year"].'</option>';
								}
		                    ?>
                            </select>
                            
                            
                            <h3>Select Major</h3>
                                
                            <select id="second_level" name="second_level" multiple class="form-control">

                            </select>
                            <br>
                            <br>
                            <button class="btn btn-success" name="choose">Choose</button>
                        </form>

                                <?php  

                                    if (isset($_POST['choose'])) {

                                        echo '<div class="table-responsive">
                                        <table class="table" border="1">
                                            <tr class="success">
                                                <th></th>
                                                <th>ID</th>
                                                <th>Course Name</th>
                                                <th>Course Name in Vietnamese </th>
                                                <th>Course Code</th>
                                                <th>Summary</th>
                                                <th>Total Hour </th>
                                                <th>Lecture Hour</th>
                                                <th>Lab Hour</th>
                                                <th>ECTS</th>
                                            </tr>';

                                        $major_id = $_POST['second_level'];

                                

                                        $sql = "SELECT * FROM course WHERE major_id = '$major_id'";
                                        $result = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<tr>
                                            <td><a href="editCourse.php?edit='.$row['id'].'">Edit</a>
                                            <td>'.$row['id'].'</td>
                                            <td>'.$row['courseName'].'</td>
                                            <td>'.$row['courseName_v'].'</td>
                                            <td>'.$row['courseCode'].'</td>
                                            <td>'.$row['summary'].'</td>
                                            <td>'.$row['totalHour'].'</td>
                                            <td>'.$row['lectureHour'].'</td>
                                            <td>'.$row['labHour'].'</td>
                                            <td>'.$row['ECTS'].'</td>
                                        </tr>';
                                    }

                                    }
                                
                                        

                                    
                        
                
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


                                


