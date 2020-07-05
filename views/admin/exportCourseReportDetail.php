<?php   
    include_once $_SERVER['DOCUMENT_ROOT'] . '/views/include/dbh.inc.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    use Mpdf\Mpdf;

    if (isset($_POST['choose'])) {

        $year_id = $_POST['first_level'];

        $major_id = $_POST['second_level'];

        $student_id = $_POST['student'];

        $year_position = $_POST['year_position'];

        
        //Find transcript detail ID 

        $sql = "SELECT * FROM transcript WHERE year_id = '$year_id' AND student_id = '$student_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $transcript_id = $row['id'];

        $sql1 = "SELECT * FROM transcript_detail WHERE transcript_id = '$transcript_id'";
        $result1 = mysqli_query($conn, $sql);
        $row1 = mysqli_fetch_assoc($result);

        $transcript_detail_id = $row1['id'];

        //Find Common Course ID for B2 and B3 students
        $sql0 = "SELECT * FROM major WHERE majorName LIKE '%Common Courses%' AND year_id = '$year_id'";
        $result0 = mysqli_query($conn, $sql0);
        $row0 = mysqli_fetch_assoc($result0);
        $commonCourse_id = $row0['id'];

        $id = 1;

        $table_result = '<table class="table1" style="width:100%;">
        <thead class="table1">
        <tr class="table1">
        <td class="table1">No.</td><td class="table1">Subject code</td><td class="table1">Subjects</td><td class="table1">ECTS</td><td class="table1">USTH Grade/20</td>
        </tr>
        <tr>
        <td class="table1">STT</td><td class="table1">Mã môn học</td><td class="table1">Môn học</td><td class="table1">Số tín chỉ</td><td class="table1">Điểm số /20</td>
        </tr>
        </thead>
        ';

        //Find courses related to year position

        if ($year_position == '1.') {


            $sql2 = 
            "SELECT * FROM course, course_report WHERE course.major_id = '$major_id' AND course.id = course_report.course_id AND course.courseCode LIKE '%$year_position%'
            UNION
            SELECT * FROM course, course_report WHERE course.major_id = '$major_id' AND course.id = course_report.course_id AND course.courseCode LIKE '%EN2.%'
            ";
            $result2 = mysqli_query($conn, $sql2);

            while ($row = mysqli_fetch_assoc($result2)) {
                $table_result .= '<tr class="table1"><td class="table1">'.$id.'</td><td class="table1">'.$row['courseCode'].'</td><td class="table1">'.$row['courseName'].' ('.$row['courseName_v'].')</td><td class="table1">'.$row['ECTS'].'</td><td class="table1">'.$row['final'].'</td></tr>';
                $id++;

            }
        }

        else {
            $sql2 = 
            "SELECT * FROM course, course_report WHERE course.major_id = '$major_id' AND course.id = course_report.course_id AND course.courseCode LIKE '%$year_position%' AND course.courseCode NOT LIKE '%EN2.%'
            UNION SELECT * FROM course, course_report WHERE course.major_id = '$commonCourse_id' AND course.id = course_report.course_id AND course.courseCode LIKE '%$year_position%'
            ";
            $result2 = mysqli_query($conn, $sql2);

            while ($row = mysqli_fetch_assoc($result2)) {
                $table_result .= '<tr class="table1"><td class="table1">'.$id.'</td><td class="table1">'.$row['courseCode'].'</td><td class="table1">'.$row['courseName'].' ('.$row['courseName_v'].')</td><td class="table1" id="ECTS">'.$row['ECTS'].'</td><td class="table1" id="ECTS">'.$row['final'].'</td></tr>';
                $id++;
            }
        }

        $table_result .='</table>';

        //Find information needed for transcript

        //Find academic year

        $res = mysqli_query($conn, "SELECT * FROM year WHERE id = '$year_id'");
        $r = mysqli_fetch_assoc($res);
        $year_name = $r['year'];

        //Find major
        $res1 = mysqli_query($conn, "SELECT * FROM major WHERE id = '$major_id'");
        $r1 = mysqli_fetch_assoc($res1);
        $majorName = $r1['majorName'];
        $majorName_v = $r1['majorName_V'];

        //Find name and dob
        $res2 = mysqli_query($conn, "SELECT * FROM student WHERE id = '$student_id'");
        $r2 = mysqli_fetch_assoc($res2);
        $profile_id = $r2['profile_id'];

        $res3 = mysqli_query($conn, "SELECT * FROM profile WHERE id = '$profile_id'");
        $r3 = mysqli_fetch_assoc($res3);
        
        $fullName_v = $r3['fullName_v'];
        $dob_v = $r3['dob_v'];

        $type_of_training = "Full - time of Bachelor (Cử nhân chính quy)";
        $language = "English (Tiếng Anh)";

        //Start export PDF here

        $mpdf = new Mpdf([
            'default_font_size' => 8,
            'default_font' => 'freesans'
        ]);

        $table0 = '<table><tr>
        <td class="title">
        <p class="title">VIETNAM ACADEMY OF SCIENCE AND TECHNOLOGY</p>
        <p class="title">UNIVERSITY OF SCIENCE AND TECHNOLOGY OF HANOI</p>
        <p class="title">VIỆN HÀN LÂM KHOA HỌC VÀ CÔNG NGHỆ VIỆT NAM</p>
        <p class="title">TRƯỜNG ĐẠI HỌC KHOA HỌC VÀ CÔNG NGHỆ HÀ NỘI</p>
        <p class="title">_________***_________</p>
        </td>
        <td>
        <h1 class="vis">ABCDKJGDGG</h1>
        </td>
        <td class="title1">
        <p class="title">SOCIALIST REPUBLIC OF VIETNAM</p>
        <p class="title">Independence - Freedom - Happiness</p>
        <p class="title">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
        <p class="title">Độc lập - Tự do - Hạnh phúc</p>
        <p class="title">_________***_________</p>
        </td>
        </tr>
        </table> ';

        $title = '<h1 class="title">ACADEMIC TRANSCRIPT</h1><h2 class="title">CHỨNG NHẬN KẾT QUẢ HỌC TẬP</h2>';

        $html = '
        <table>
        <tr>
        <td class="tb1">Full name (Họ và tên)</td>
        <td class="tb1">'.$fullName_v.'</td>
        </tr>
        <tr>
        <td class="tb1">Student ID (Mã sinh viên)</td>
        <td class="tb1">'.$student_id.'</td>
        </tr>
        <tr>
        <td class="tb1">Date of birth (Ngày, tháng, năm sinh)</td>
        <td class="tb1">'.$dob_v.'</td>
        </tr>
        <tr>
        <td class="tb1">Type of training (Loại hình đào tạo)</td>
        <td class="tb1">'.$type_of_training.'</td>
        </tr>
        <tr>
        <td class="tb1">Major (Ngành học)</td>
        <td class="tb1">'.$majorName.' ('.$majorName_v.')</td>
        </tr>
        <tr>
        <td class="tb1">Academic Year (Năm học)</td>
        <td class="tb1">'.$year_name.'</td>
        </tr>
        <tr>
        <td class="tb1">Language of Training (Ngôn ngữ đào tạo)</td>
        <td class="tb1">'.$language.'</td>
        </tr>
        </table>';

        $currentDate = date("d.m.Y");
        $current = '<h4 class="current">Hanoi, '.$currentDate.'</h4>';
        $html1 = '<h4 class="cu">P.P REACTOR / KT. HIỆU TRƯỞNG</h4>
        <h4 class="cu">VICE RECTOR / PHÓ HIỆU TRƯỞNG</h4>
        <h6 class="cu"> (Signature and full name/ Ký và ghi rõ họ tên)</h6>
        <br><br><h4 class="cu">Nguyễn Hải Đăng </h4>';

        $stylesheet = file_get_contents('export2.css'); // external css
        $mpdf->WriteHTML($stylesheet,1);

        $mpdf->WriteHTML($table0);
        $mpdf->WriteHTML($title);
        $mpdf->WriteHTML($html,2);
        $mpdf->WriteHTML($table_result);
        $mpdf->WriteHTML($current);
        $mpdf->WriteHTML($html1);

        $mpdf->Output();

    }
    ?>


