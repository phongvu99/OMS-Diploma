<?php  

if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if (empty($username) || empty($password) || empty($role)) {
        header("Location: ../../index.php?error=emptyfields");
        exit();
    }

    else {
        $sql = "SELECT * FROM user WHERE id=? OR username=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../../index.php?error=sqlerror");
            exit();
        }

        else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                
                if ($password != $row['password']) {
                    header("Location: ../../index.php?error=wrongpassword");
                    exit();
                }

                else {
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['name'] = $row['username'];
                    $_SESSION['role'] = $row['userType'];
                    header("Location: ../../index.php");
                    exit();
                }   

            }
            
            else {
                header("Location: ../../index.php?error=nouser");
                exit();
            }
        }
    }

}

else {
    header("Location: ../index.php");
    exit();
}