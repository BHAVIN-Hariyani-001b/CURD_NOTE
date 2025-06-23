<?php
    $showerror = false;
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        require './db.php';
        
        $loginUserEmail = $_POST['loginemail'];
        $loginPass = $_POST['loginPassword'];
        // print_r($_POST);

        $sql = "SELECT * FROM `users` WHERE `user_email` = '$loginUserEmail'";
        $result = $connect->query($sql);
        $row = mysqli_num_rows($result);
        if($row === 1){
            $row1 = $result->fetch_assoc();
            // print_r($row1);
            if(password_verify($loginPass,$row1['user_pass'])){
                $showError = "Login Successfully";
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['userName'] = $row1['user_name'];
                $_SESSION['user_id'] = $row1['id'];
                header("Location: /project/nodeApp/index.php?loginsuccess=true&error=$showError");
            } else{
                $showError = "password dose not match";
                header("Location: /project/nodeApp/index.php?loginsuccess=false&error=$showError");
            }
        } else{
            $showError = "your account not exist";
            header("Location: /project/nodeApp/index.php?loginsuccess=false&error=$showError");
        }
        echo $showError;
    }
?>
