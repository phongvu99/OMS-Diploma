<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "university";
$conn = mysqli_connect($server,$user,$password,$db);
require_once('php/php-excel-reader/excel_reader2.php');
require_once('php/SpreadsheetReader.php');
require_once('php/diversity.php');



?>
<!DOCTYPE html>
<html lang="en">
<?php include('php/header.php'); ?>
<body>
<div id="wrapper">
    <?php include('php/menu.php'); ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">DashBoard</h1>
                </div>
            </div>

             <div class="row">
                    
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Welcome to USTH SIS
                            </div>
                            <!-- /.panel-heading -->
                            
                            <!-- .panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
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
