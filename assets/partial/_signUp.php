<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/project/nodeApp/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php
        require './_header.php';
    ?>
    <div class="main-login-section">
        <div class="main-sing-up">
            <h2>Hey there! 👋🏻</h2>
            <h1>WELCOME</h1>
            <img src="/project/nodeApp/assets/img/to-do-list.webp" alt="">
        </div>
        <div class="login">
            <form action="./_handalSignup.php" method="post">
                <h1>Sign Up</h1>
                <div class="login-section">
                    <div class="input-section">
                        <input type="text" name="name" id="name" placeholder="User name">
                    </div>
                    <div class="input-section">
                        <input type="email" name="email" id="email" placeholder="email">
                    </div>
                    <div class="input-section">
                        <input type="password" name="password" id="password" placeholder="password" maxlength="6">
                    </div>
                    <div class="input-section">
                        <input type="password" name="cpassword" id="cpassword" placeholder="confirm password" maxlength="6">
                    </div>
                    <button type="submit">Sign Up</button>
                    <a href="/project/nodeApp/assets/partial/_login.php" class="SingUp">
                        <span>Login</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>