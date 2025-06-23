<?php
$showError = null;
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    require './db.php';
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];
    $userCpassword = $_POST['cpassword'];

    $sql = "SELECT * FROM `users` WHERE `user_name` = '$userName'";
    $result = $connect->query($sql);
    $row1 = mysqli_num_rows($result);
    echo $row1;

    $sql2 = "SELECT * FROM `users` WHERE `user_email` = '$userEmail'";
    $result2 = $connect->query($sql2);
    $row2 = mysqli_num_rows($result2);
    echo $row2;

    if ($row1 === 1 || $row2 === 1) {
        if ($row1 === 1 && $row2 === 1) {
            $showError = "Name and Email are alrady use";
            header("Location: /project/nodeApp/index.php?signupsuccess=false&error=$showError");
            exit;
        } else if ($row1 === 1) {
            $showError = "Name is alrady use";
            header("Location: /project/nodeApp/index.php?signupsuccess=false&error=$showError");
            exit;
        } else if ($row2 == 1) {
            $showError = "Email is alrady use";
            header("Location: /project/nodeApp/index.php?signupsuccess=false&error=$showError");
        }
    } else {
        if ($userPassword === $userCpassword && ($userCpassword !== "" && $userPassword !== "")) {
            $hash = password_hash($userPassword, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_pass`) VALUES ('$userName', '$userEmail', '$hash')";
            $result = $connect->query($sql);
            if ($result) {
                $showError = "Sign up Successfully";
                header("Location: /project/nodeApp/index.php?signupsuccess=true&error=$showError");
            }
        } else {
            $showError = "password does not match";
            header("Location: /project/nodeApp/index.php?signupsuccess=false&error=$showError");
        }
    }
}

?>