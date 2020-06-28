<?php   
    include_once "php/includes/dbh.inc.php";
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
                    <h1 class="page-header" style="color:#337ab7">Import Information </h1>
					<div class="panel-body">
						<div class="row">

							<!-- main form end -->
							<div>
							    <a href="importStudent.php"><button class="btn btn-primary">Import Student</button></a>
								<a href="importCourse.php"><button class="btn btn-success">Import Course</button></a>
                                <a href="importDiploma.php"><button class="btn btn-danger">Import Diploma</button></a>;
							</div>
							
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
