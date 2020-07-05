<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "usth_diplomedb";
$conn = mysqli_connect($server,$user,$password,$db);
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Nuovo/php-excel-reader/excel_reader2.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Nuovo/SpreadsheetReader.php';
//require_once('php/diversity.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>USTH SIS</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../public/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../../public/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../public/css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../public/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../public/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

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
	<!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
	  
            <div class="row">
			
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:#337ab7">Import Bachelor Students </h1>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-primary">
									<div class="panel-heading" >
										<i class="fa fa-bell fa-fw" ></i> Notifications Panel
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
									

									<div class="table-responsive">
									<table class="table">
									
										
										
									<?php				
											
										$sqlSelect = "SELECT * FROM tab_bachelor";
										$result = mysqli_query($conn, $sqlSelect);
										include $_SERVER['DOCUMENT_ROOT'] . '/views/admin/view.php';
									?>
										
									
								
								</div>	
								
							</div>
						</div>
					
					
						
					</div>
							<!-- notification panel end -->
				</div>
			</div>
		</div>
	</div>
	
</div>

<!-- jQuery -->
<script src="/public/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/public/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/public/js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/public/js/startmin.js"></script>

</body>
</html>
