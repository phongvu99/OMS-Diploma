<?php   
    include_once 'php/includes/dbh.inc.php';
    include 'php/mpdf/vendor/autoload.php';
    include 'php/header.php';

    $row = [];
    $row1 = [];
    $row2 = [];
    $row3 = [];
    $row4 = [];
    $department = '';
    $department_v = '';
    $ranking = '';
    $ranking_v = '';
    $name_v = '';
    $name = '';
    $dob_v = '';
    $dob = '';
    $pob_v = '';
    $pob = '';
    $graduationYear_v = '';
    $graduationYear = '';
    $diplomaId = '';
    $diplomaNote = '';

    if (isset($_GET['edit'])) {
        $studentId = $_GET['edit'];
                        
        $res = mysqli_query($conn, "SELECT * FROM diploma WHERE studentId='$studentId'");
        $row = mysqli_fetch_assoc($res);

        // Find the department of student
        $res1 = mysqli_query($conn, "SELECT * FROM student WHERE id='$studentId'");
        $row1 = mysqli_fetch_assoc($res1);

        $major_id = $row1['major_id'];
        $res2 = mysqli_query($conn, "SELECT * FROM major WHERE id='$major_id'");
        $row2 = mysqli_fetch_assoc($res2);

        $department_id = $row2['department_id'];
        $res3 = mysqli_query($conn, "SELECT * FROM department WHERE id='$department_id'");
        $row3 = mysqli_fetch_assoc($res3);

        // Find the personal information of student
        $profile_id = $row1['profile_id'];
        $res4 = mysqli_query($conn, "SELECT * FROM profile WHERE id='$profile_id'");
        $row4 = mysqli_fetch_assoc($res4);

        $department_v = $row3['departmentName_V'];
        $department = $row3['departmentName'];
        $ranking_v = $row['ranking_v'];
        $ranking = $row['ranking'];
        $name_v = $row4['fullName_v'];
        $name = $row4['fullName'];
        $dob_v = $row4['dob_v'];
        $dob = $row4['dob'];
        $pob_v = $row4['pob_v'];
        $pob = $row4['pob'];
        $graduationYear_v = $row['graduationYear'];
        $graduationYear = $row['graduationYear'];
        $diplomaId = $row['diplomaId'];
        $diplomaNote = $row['diplomaNote'];  
        
        
                    

        //Start to export PDF here

    
        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 12,
            'default_font' => 'freesans'
        ]);

        $mpdf->SetDefaultBodyCSS('background', "url('../Bac1.png')");
        $mpdf->SetDefaultBodyCSS('background-image-resize', 6);
    
        $htm = '<h1>GGG</h1>';
        $html = '
        <table class="table1">
        <tr>';

        $html .='<td>Ngành</td>
        <td>'.$department_v.'</td>
        </tr>
        <tr>
        <td>In</td>
        <td>'.$department.'</td>
        </tr>
        <tr>
        <td>Xếp loại</td>
        <td>'.$ranking_v.'</td>
        </tr>
        <tr>
        <td>Grade</td>
        <td>'.$ranking.'</td>
        </tr>
        <tr>
        <td>Cho</td>
        <td>'.$name_v.'</td>
        </tr>
        <tr>
        <td>To</td>
        <td>'.$name.'</td>
        </tr>
        <tr>
        <td>Sinh ngày</td>
        <td>'.$dob_v.'</td>
        </tr>
        <tr>
        <td>Born on</td>
        <td>'.$dob.'</td>
        </tr>
        <tr>
        <td>Nơi sinh</td>
        <td>'.$pob_v.'</td>
        </tr>
        <tr>
        <td>Birthplace</td>
        <td>'.$pob.'</td>
        </tr>
        <tr>
        <td>Năm tốt nghiệp</td>
        <td>'.$graduationYear_v.'</td>
        </tr>
        <tr>
        <td>Graduation Year</td>
        <td>'.$graduationYear.'</td>
        </tr>
        </table></div>';



        $html1 = '<img src="EXAMPLE_TMP_SERVERPATH023.png" class="QRcode">
        <p class="note1">'.$diplomaId.'</p>
        <p class="note2">'.$diplomaNote.'</p>';

        $stylesheet = file_get_contents('export.css'); // external css
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($htm);
        $mpdf->WriteHTML($html,2);
        $mpdf->WriteHTML($html1);

        $mpdf->Output();
                        
    }
?>



