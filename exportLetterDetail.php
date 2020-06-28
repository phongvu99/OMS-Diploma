<?php   
    include_once 'php/includes/dbh.inc.php';
    include 'php/mpdf/vendor/autoload.php';

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

        // Find the major of student
        $res1 = mysqli_query($conn, "SELECT * FROM student WHERE id='$studentId'");
        $row1 = mysqli_fetch_assoc($res1);

        $major_id = $row1['major_id'];
        $res2 = mysqli_query($conn, "SELECT * FROM major WHERE id='$major_id'");
        $row2 = mysqli_fetch_assoc($res2);

        

        // Find the personal information of student
        $profile_id = $row1['profile_id'];
        $res4 = mysqli_query($conn, "SELECT * FROM profile WHERE id='$profile_id'");
        $row4 = mysqli_fetch_assoc($res4);

        $major = $row2['majorName'];
        $ranking = $row['ranking'];
        $name_v = $row4['fullName_v'];
        $dob = $row4['dob'];
        $pob = $row4['pob'];
        $nationality = $row4['nationality'];
        $gender = $row4['gender'];
        $graduationYear = $row['graduationYear'];
        $diplomaId = $row['diplomaId'];
        $diplomaNote = $row['diplomaNote'];  

        $currentDate = date("d.m.Y");
        $degree = "Bachelor (full-time)";

        
        
                    

        //Start to export PDF here

    
        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 12,
            'default_font' => 'freesans',
            'format' => [210, 297]
        ]);

    
        $h = '<h1>GGG</h1>';
        $current = '<h4 class="current">Hanoi, '.$currentDate.'</h4>';
        $name_letter = '<h2 class="title">ATTESTATION LETTER</h2>';
        $html = '<h4 style="margin-left:70px; font-style: normal;">University of Science and Technology of Hanoi hereby certify that</h4>
        <table class="table1">
        <tr>';

        $html .='<td>Name:</td>
        <td>'.$name_v.'</td>
        </tr>
        <tr>
        <td>Gender:</td>
        <td>'.$gender.'</td>
        </tr>
        <tr>
        <td>Date of birth:</td>
        <td>'.$dob.'</td>
        </tr>
        <tr>
        <td>Place of birth:</td>
        <td>'.$pob.'</td>
        </tr>
        <tr>
        <td>Nationality:</td>
        <td>'.$nationality.'</td>
        </tr>
        <tr>
        <td>Degree:</td>
        <td>'.$degree.'</td>
        </tr>
        <tr>
        <td>Major:</td>
        <td>'.$major.'</td>
        </tr>
        <tr>
        <td>Grade:</td>
        <td>'.$ranking.'</td>
        </tr>
        <tr>
        <td>Year of graduation:</td>
        <td>'.$graduationYear.'</td>
        </tr>
        <tr>
        <td>Serial number:</td>
        <td>'.$diplomaId.'</td>
        </tr>
        <tr>
        <td>Reference number:</td>
        <td>'.$diplomaNote.'</td>
        </tr>
        </table>
        <h4 style="margin-left:70px; font-style: normal;">and English is the sole language of all courses and programs at University of
        Science and Technology of Hanoi.</h4>';



        $html1 = '<h4 class="cu">P.P REACTOR</h4><h4 class="cu">VICE DIRECTOR</h4><br><br><h4 class="cu">Nguyễn Hải Đăng ';

        $stylesheet = file_get_contents('export1.css'); // external css
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($h);
        $mpdf->WriteHTML($current);
        $mpdf->WriteHTML($name_letter);
        $mpdf->WriteHTML($html,2);
        $mpdf->WriteHTML($html1);

        $mpdf->Output();
                        
    }
?>



