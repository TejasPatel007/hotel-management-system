<?php

include('include/functions.php');

if (isset($_POST['user_login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $select_user = "select * from  users_details where Email='$email'";
    $result = mysqli_query($con, $select_user) or die('failed to query');
    $row = mysqli_fetch_array($result);

    if (($row['Email'] == $email)) {
        if (password_verify($password, $row['Password'])) {
            if ($row['is_admin'] == "1") {
                header("Location:admin/user.php?");
            } else {
                header("Location:index.php?");
            }

            $_SESSION['loggedUserName'] = $row['FirstName'];
            $_SESSION['loggedUserId'] = $row['UserId'];
        } else {
            $error = "Invalid Username and/or Password!";
            error('login.php', $error);
        }
    } else {
        $error = "Invalid Username and/or Password!";
        error('login.php', $error);
    }
}
?>