<?php
    include 'includes/dbh.inc.php';
?>

<div class="container-fluid">
    <?php
        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            
            $sql = "SELECT *
            FROM profile
            WHERE profile.address LIKE '%$search%' OR profile.city LIKE '%$search%'
            OR profile.country LIKE '%$search%' OR profile.dob LIKE '%$search%' OR profile.ethnicity LIKE '%$search%'
            OR profile.fullName LIKE '%$search%' OR profile.mail LIKE '%$search%' OR profile.nationality LIKE '%$search%'
            OR profile.phoneNum LIKE '%$search%'
            

            ";

            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            echo "There are ".$queryResult." results!";

            if ($queryResult > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<a href='detailSearch.php?id=".$row['id']."'<div class='article-box'>
                    <h3>".$row['fullName']."</h3>
                    </div></a>";
                }
            } else {
                echo "There are no results matching your search!";
            }
        }
    ?>
</div>