<?php   
    include_once $_SERVER['DOCUMENT_ROOT'] . '/views/include/dbh.inc.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php';
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
                    <h1 class="page-header" style="color:#337ab7">Export Diploma </h1>
					<div class="panel-body">
						<div class="row">

							<!-- main form end -->
							
							
						</div>


                    <h1>List of student ID </h1>
                    <?php   
                        
                        $sql = "SELECT * FROM diploma";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<h3>'.$row['id']." ".$row['studentId'].'</h3><h3><a href="exportLetterDetail.php?edit='.$row['studentId'].'">Export</a></h3><br />';
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


