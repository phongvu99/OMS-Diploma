<?php
$server = "localhost";
$user = "phongvu99";
$password = "eminemA1";
$db = "university";
$conn = mysqli_connect($server,$user,$password,$db);
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Nuovo/php-excel-reader/excel_reader2.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Nuovo/SpreadsheetReader.php';
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php';

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
                    <h1 class="page-header" style="color:#337ab7">Import Diploma Information </h1>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<i style="color:#337ab7" class="fa fa-group fa-fw"></i> Choose an excel file to import
										<br>
										<form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
											<div>
												<input type="file" name="file" id="file" accept=".xls,.xlsx"> <p></p>									
												<button type="submit" id="submit" name="import" class="btn btn-primary">Import Diploma</button>
											</div>
									
										</form>
									</div>
								</div>
							</div>
							<!-- main form end -->
							
							
						</div>
					</div>
					<div class="col-lg-12">
						<div class="panel panel-primary">
							<div class="panel-heading" >
								<i class="fa fa-bell fa-fw" ></i> Notifications Panel
							</div>

							<div class="panel-body">
							

							<div class="table-responsive">
							<table class="table">
					<?php 		
						if (isset($_POST["import"]))
						{
						
							$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
							if(in_array($_FILES["file"]["type"],$allowedFileType)){
								$targetPath = 'uploads/'.$_FILES['file']['name'];
								move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);							
								$Reader = new SpreadsheetReader($targetPath);								
								$sheetCount = count($Reader->sheets());	
								$Reader->ChangeSheet(0);
								$i = 0;
								foreach ($Reader as $Row)
								{
									if ($i == 0){
										echo '<thead>';
										echo '<tr class="info">';
										echo '<td></td>';
										
										echo '<td>'.$Row[0].'</td>';
										echo '<td>'.$Row[1].'</td>';
										echo '<td>'.$Row[4].'</td>';
										echo '<td>'.$Row[5].'</td>';
										echo '<td>'.$Row[12].'</td>';
										echo '<td>'.$Row[14].'</td>';
										echo '<td>'.$Row[15].'</td>';
										
										echo '</tr>';
										echo '</thead>';
										echo '<tbody>';
									}
									else{	
										if ($i % 2 == 0){
											echo '<tr class="success">';
										}else{
											echo '<tr class="warming">';
										}
										echo '<td><form method="post" action="printb.php?id='.$Row[0].'" target="_blank"></td>';

										echo '<td>'.$Row[0].'</td>';
										echo '<td>'.$Row[1].'</td>';
										echo '<td>'.$Row[4].'</td>';
										echo '<td>'.$Row[5].'</td>';
										echo '<td>'.$Row[12].'</td>';
										echo '<td>'.$Row[14].'</td>';
										echo '<td>'.$Row[15].'</td>';

										$id = mysqli_real_escape_string($conn,$Row[0]);
										$studentId = mysqli_real_escape_string($conn,$Row[1]);
										$ranking = mysqli_real_escape_string($conn, $Row[4]);
										$ranking_v = mysqli_real_escape_string($conn,$Row[5]);
										$graduationYear = mysqli_real_escape_string($conn,$Row[12]);
										$diplomaId = mysqli_real_escape_string($conn,$Row[14]);
										$diplomaNote = mysqli_real_escape_string($conn,$Row[15]);
										
										$query = "insert into diploma(id,studentId,ranking, ranking_v,graduationYear,diplomaId, diplomaNote) 
										values('".$id."','".$studentId."','".$ranking."','".$ranking_v."','".$graduationYear."','".$diplomaId."','".$diplomaNote."')";
										$result = mysqli_query($conn, $query);		
										echo '</tr>';		
									}
									$i = $i + 1;
								}
							}
						}

						
					?>
								</tbody>
							</table>
								
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
