
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr class="info">
				<th>No.</th>
				<th>Student ID</th>
				<th>Ngành</th>
				<th>Specialty</th>
				<th>Xếp loại</th>
				<th>Grade</th>
				<th>Họ tên</th>
				<th>Fullname</th>
				<th>Ngày sinh</th>
				<th>Birthday</th>
				<th>Nơi sinh </th>
				<th>Birthplace</th>
				<th>Năm tốt nghiệp</th>
				<th>Số Văn bằng</th>
				<th>Số vào sổ</th>
			</tr>
		</thead>             
		<tbody>
			
			
<?php				
				
	
				
	
	$i = 1;
	if (mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_array($result)){
			if ($i % 2 == 0){
				echo '<tr class="success">';
			}else{
				echo '<tr class="warning">';
			}
				echo '<td>'.$i.'</td>';
				echo '<td>'.$row['student_id'].'</td>';
				echo '<td>'.$row['v_spec'].'</td>';
				echo '<td>'.$row['e_spec'].'</td>';
				echo '<td>'.$row['v_grade'].'</td>';
				echo '<td>'.$row['e_grade'].'</td>';
				echo '<td>'.$row['v_fullname'].'</td>';
				echo '<td>'.$row['e_fullname'].'</td>';
				echo '<td>'.$row['v_bdate'].'</td>';
				echo '<td>'.$row['e_bdate'].'</td>';
				echo '<td>'.$row['v_bplace'].'</td>';
				echo '<td>'.$row['e_bplace'].'</td>';
				echo '<td> </td>';
				echo '<td><a href="" onClick="window.open("print.php?id='.$row['student_id'].'","pagename","resizable,height=260,width=370"); return false;   >'.$row['diplome_id'].'</td>';
				echo '<td>'.$row['document_id'].'</td>';
				echo '</tr>';																	
			$i = $i+1;
		}
	}

	
	
	
	?>
		</tbody>
	</table>
</div>
