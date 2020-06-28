<?php 
	require 'php/includes/dbh.inc.php';

	if(isset($_POST["selected"]))
	{
	 $id = join("','", $_POST["selected"]);
	 $query = " SELECT * FROM major WHERE year_id IN ('".$id."')";
	 $res = mysqli_query($conn, $query);
	
	 while ($row = mysqli_fetch_assoc($res)) {
		 $result[] = $row;
	 }
	
	 
	 $output = '';
	 foreach($result as $row)
	 {
	  $output .= '<option value="'.$row["id"].'">'.$row["majorName"].'</option>';
	 }
	 echo $output;
	}
	
	?>

 ?>