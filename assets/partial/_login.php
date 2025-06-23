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
        require('./_header.php')
    ?>

    <div class="main-login-section">
        <div class="img-section">
            <div class="img-login-section">
                <img src="/project/nodeApp/assets/img/login.avif" alt="">
            </div>
        </div>
        <div class="login">
            <form action="./_handalLogin.php" method="post">
                <h1>Login</h1>
                <div class="login-section">
                    <div class="input-section">
                        <input type="email" name="loginemail" id="email" placeholder="example@gmail.com">
                    </div>
                    <div class="input-section">
                        <input type="password" name="loginPassword" id="password" placeholder="******" maxlength="6">
                    </div>
                    <button type="submit">Login</button>
                    <a href="#" class="forgot">Forgot Password</a>
                    <a  href="/project/nodeApp/assets/partial/_signUp.php" class="SingUp">
                        <span>Sing Up</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
  </body>
</html>
