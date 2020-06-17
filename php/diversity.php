<?php

function changeYear($year){
	switch ($year) {
		case 1:
			$strYear = "B0";
			break;
		case 2:
			$strYear = "B1";
			break;
		case 3:
			$strYear = "B2";
			break;
		case 4:
			$strYear = "B3";
			break;
	}
	return $year;
}


function loadProgramYear($major_id, $acaYear_id, $year_id,$conn){
	$sqlSelect = "SELECT * FROM tbl_program WHERE major_id = $major_id AND acaYear_id = $acaYear_id AND year_id = $year_id ";
	$result = mysqli_query($conn, $sqlSelect);
	if (mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_array($result))
			return $row['program_id'];
	}else{
		return 0;
	}
}

function getMajor($shorttitle,$conn){
	$sqlSelect = "SELECT * FROM tbl_major WHERE shorttitle = '$shorttitle' ";
	$result = mysqli_query($conn, $sqlSelect);
	if (mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_array($result))
			return $row['major_id'];
	}else{
		return 0;
	}
}


function getCourseProgram($course_id,$conn){
	$sqlSelect = "SELECT * FROM tbl_course WHERE course_id = $course_id";
	$result = mysqli_query($conn, $sqlSelect);
	if (mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_array($result))
			$program_id = $row['program_id'];
	}
	return $program_id;
}
function getCourseYear($course_id,$conn){
	$program_id = getCourseProgram($course_id,$conn);
	$sqlSelect = "SELECT * FROM tbl_program WHERE program_id = $program_id";
	$result = mysqli_query($conn, $sqlSelect);
	if (mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_array($result))
			$year_id = $row['year_id'];
	}
	return $year_id;
}
function getCourseMajor($course_id,$conn){
	$program_id = getCourseProgram($course_id,$conn);
	$sqlSelect = "SELECT * FROM tbl_program WHERE program_id = $program_id";
	$result = mysqli_query($conn, $sqlSelect);
	if (mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_array($result))
			$major_id = $row['major_id'];
	}
	return $major_id;
}
function getCourseAcaYear($course_id, $conn){
	$program_id = getCourseProgram($course_id,$conn);
	$sqlSelect = "SELECT * FROM tbl_program WHERE program_id = $program_id";
	$result = mysqli_query($conn, $sqlSelect);
	if (mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_array($result))
			return $row['acaYear_id'];
	}else{
		return 0;
	}
}

function getCourseInfo($course_id,$conn,$str){
	$sqlSelect = "SELECT * FROM tbl_course WHERE course_id = $course_id";
	$result = mysqli_query($conn, $sqlSelect);

	if (mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_array($result))
			return $row[$str];
	}
}

function getStudentInfo($student_id,$conn,$str){
	$sqlSelect = "SELECT * FROM tbl_student WHERE student_id = '$student_id'";
	$result = mysqli_query($conn, $sqlSelect);

	if (mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_array($result))
			return $row[$str];
	}
}

?>