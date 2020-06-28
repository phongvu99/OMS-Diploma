<?php   
    include "php/includes/dbh.inc.php";
    include 'php/header.php';
?>



<div class="container">
    <?php

        $profileId = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM profile WHERE id='$profileId'";
        $result = mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);

        if ($queryResults > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<h3>Personal Information</h3>";
                echo '<div class="table-responsive">
                <table class="table" border="1">
                    <tr class="success">
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Full Name in Vietnamese </th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>DOB in Vietnamese </th>
                        <th>POB</th>
                        <th>POB in Vietnamese</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Ethnicity</th>
                        <th>Martial Status</th>
                        <th>Nationality </th>
                        <th>Phone Number</th>
                        <th>Email</th>
                    </tr>
                    <tr>
                        <th>'.$row['id'].'</th>
                        <th>'.$row['fullName'].'</th>
                        <th>'.$row['fullName_v'].'</th>
                        <th>'.$row['gender'].'</th>
                        <th>'.$row['dob'].'</th>
                        <th>'.$row['dob_v'].'</th>
                        <th>'.$row['pob'].'</th>
                        <th>'.$row['pob_v'].'</th>
                        <th>'.$row['address'].'</th>
                        <th>'.$row['city'].'</th>
                        <th>'.$row['country'].'</th>
                        <th>'.$row['ethnicity'].'</th>
                        <th>'.$row['martialStatus'].'</th>
                        <th>'.$row['nationality'].'</th>
                        <th>'.$row['phoneNum'].'</th>
                        <th>'.$row['mail'].'</th>
                    </tr>
                </table>
            </div>';
            }
        }


        $sql1 = "SELECT * FROM student WHERE profile_id='$profileId'";
        $result1 = mysqli_query($conn, $sql1);
        $queryResults1 = mysqli_num_rows($result);

        if ($queryResults1 > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                echo "<div class='article-box'>
                    <h2>Major</h2>
                    <p>".$row1['id']."</p>
                </div>";
            }
        }

    ?>
</div>



</body>
</html>