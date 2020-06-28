<?php   
    include_once "php/includes/dbh.inc.php";
    include 'php/mpdf/vendor/autoload.php';
    include 'php/header.php';
?>

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
                url:"fetchYear.php",
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

            $('#student').multiselect({
            nonSelectedText: 'Select Student ID',
            buttonWidth:'400px'
            });

            $('#year_position').multiselect({
            nonSelectedText: 'Select Year Position',
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

        

        <?php include('php/menu.php'); ?>
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
	  
            <div class="row">
			
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:#337ab7">Export Course Report </h1>
					<div class="panel-body">
						<div class="row">

							<!-- main form end -->
							
							
						</div>

                    <form role="form" action="exportCourseReport.php" method="post"> 

                        <h3>Select Student ID</h3>
                        <select class="form-control" name="student" id="student" multi class="form-control">
                        
                        <?php   
                            $sql = "SELECT * FROM student";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="'.$row['id'].'">'.$row['id'].'</option>';
                            }
                        ?>
                        </select>  

                        <h3>Select Academic Year</h3>

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

                        <h3>Select Year Position</h3>
                        <select id="year_position" name="year_position" multiple class="form-control">

                            <option value="1.">Bachelor - 1</option>
                            <option value="2.">Bachelor - 2</option>
                            <option value="3.">Bachelor - 3</option>
                        </select>


                        </br>

                        </br>

                        <button class="btn btn-danger" name="choose">Choose</button> 
                    </form>
                    <?php   
                        if (isset($_POST['choose'])) {
                            $major_id = $_POST['second_level'];

                            $student_id = $_POST['student'];

                            $year_position = $_POST['year_position'];

                            //Find transcript detail ID 

                            $sql = "SELECT * FROM transcript WHERE ";


                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


