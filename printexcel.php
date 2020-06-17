<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "usth_diplomedb";
$conn = mysqli_connect($server,$user,$password,$db);
require_once('php/php-excel-reader/excel_reader2.php');
require_once('php/SpreadsheetReader.php');
require_once('php/diversity.php');

function writeLatex($filename,$row){
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, pack("CCC",0xef,0xbb,0xbf)); 
	$str_u = $row[3];
	$text = "\documentclass[a4paper]{article}
	\usepackage{tikz}
	\usepackage{graphicx}
	\usepackage{helvet}
	\\renewcommand{\\familydefault}{\sfdefault}
	\usepackage[vietnamese]{babel}
	\usepackage[top=2cm, bottom=2cm, outer=0cm, inner=0cm]{geometry}
	\begin{document}
	\pagenumbering{gobble}
	\\tikz[remember picture,overlay] \\node[opacity=1,inner sep=0pt] at (current page.center){\includegraphics[width=\paperwidth,height=\paperheight]{master.png}};

	\\vspace{7.8cm}
	\begin{center}
	Căn cứ kết quả hoàn thành chương trình đào tạo được xây dựng và hợp tác với các trường đại học Pháp:\\\ ".$str_u;
	fwrite($myfile, $text);
	$text = "\n \\vspace{0.5cm}
	Advantadging the successful completion of requirements for the study progress developed in partnership\\\ with French universities: ". $str_u;
	fwrite($myfile, $text);
	$specialty = $row[4]. " \\\ ". $row[5]; 
	$text = "\\end{center}
	\\vspace{1.1cm}
	\large
	\begin{center}". $specialty." \\end{center}
	\hspace{3cm} 
	\\renewcommand{\arraystretch}{1.2}
	\begin{tabular}{l l}";
	fwrite($myfile, $text);
	
	$text = "Chuyên ngành & ". $row[6]."\\\ \n";
	fwrite($myfile, $text);
	$text = "Specialty & ". $row[7]."\\\ \n";
	fwrite($myfile, $text);
	$text = "Xếp loại & ". $row[8]."\\\ \n";
	fwrite($myfile, $text);
	$text = "Grade & ". $row[9]."\\\ \n";
	fwrite($myfile, $text);
	$text = "Cho & ". $row[10]."\\\ \n";
	fwrite($myfile, $text);
	$text = "To & ". $row[11]."\\\ \n";
	fwrite($myfile, $text);
	$text = "Sinh ngày & ". $row[12]."\\\ \n";
	fwrite($myfile, $text);
	$text = "Born on & ". $row[13]."\\\ \n";
	fwrite($myfile, $text);
	$text = "Nơi sinh & ". $row[14]."\\\ \n";
	fwrite($myfile, $text);
	$text = "Birth place & ". $row[15]."\\\ \n";
	fwrite($myfile, $text);
	$text = "Năm tốt nghiệp & ". $row[16]."\\\ \n";
	fwrite($myfile, $text);
	$text = "Graduation year & ". $row[17]."\\\ \n";
	fwrite($myfile, $text);
	$text = "\\end{tabular} \\\ \n";
	fwrite($myfile, $text);
	$text =	"{\hspace{10.5cm} Hà Nội, ngày 25 tháng 11 năm 2019 \\\
		\hspace*{12cm} Hanoi, 25 November 2019 \\\
		\hspace*{11.9cm} {\bf HIỆU TRƯỞNG / RECTOR}

		{\\vspace{-1.3cm}
		\hspace{3.4cm} \includegraphics[scale=0.14]{qr.png}}

		{
		\hspace{3.5cm} 
		101001201600001 

		\\vspace{0.3cm}
		\hspace{5.5cm} 
		 001/2019/ĐHKHCN-VB-CN     \hspace{1.9cm} Etienne Saur
		}

		\\end{document}";
	fwrite($myfile, $text);	
	fclose($myfile);
}

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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

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

        

        <?php include('php/menu.php'); ?>
    </nav>
	<!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
	  
            <div class="row">
			
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:#337ab7">Import Bachelor Students </h1>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="panel panel-default">
									<div class="panel-heading">
										<i style="color:#337ab7" class="fa fa-group fa-fw"></i> Choose an excel file to import
										<br>
										<form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
											<div>
												<input type="file" name="file" id="file" accept=".xls,.xlsx"> <p></p>									
												<button type="submit" id="submit" name="import" class="btn btn-primary">Import</button>
							
											</div>
									
										</form>
									</div>
								</div>
							</div>
							<!-- main form end -->
							
							
						</div>
					</div>
					<?php 		
						if (isset($_POST["import"]))
						{
					?>		
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
									writeLatex((string)$i.".tex",$Row);
									
									
									if ($i == 0){
										echo '<thead>';
										echo '<tr class="info">';
										echo '<td></td>';
										for ($k = 1; $k <= 15; $k++) {
											echo '<td>'.$Row[$k].'</td>';
										}
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
										echo '<td><form method="post" action="printb.php?id='.$Row[0].'" target="_blank"><input type="submit"></td>';
										for ($k = 1; $k <= 15; $k++) {
											echo '<td>'.$Row[$k].'</td>';											
										}
										echo '</tr>';		
									}
									$i = $i + 1;
								}
							}
						
						?>
								</tbody>
							</table>
							
				
						<?php
						}
						
						?>			
						</div>
						
					</div>
							<!-- notification panel end -->
				</div>
			</div>
		</div>
	</div>
	
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

</body>
</html>
