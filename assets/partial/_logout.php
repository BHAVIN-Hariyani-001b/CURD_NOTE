<?php 
    session_start();
    $showerror = null;
    if($_SESSION['loggedin'] == true && isset($_SESSION['loggedin'])){
        session_unset();
        session_destroy();
        $showerror = "Logout Successfully";
        header("Location: /project/nodeApp/index.php?logoutsuccess=true&error=$showerror");
    } else{
        header("Location: /project/nodeApp/index.php");
    }
?>  