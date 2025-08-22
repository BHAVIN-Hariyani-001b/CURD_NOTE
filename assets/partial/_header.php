<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <div class="main-section">
    <header>
      <nav>
        <a href="/project/nodeApp/index.php" class="logo">Tudo App</a>
        <?php
        // session_start();
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
          echo '
              <div class="btn-logout">
                <a href="/project/nodeApp/index.php" class="Login">
                  <div class="userName">Welcome &nbsp;<span>' . $_SESSION['userName'] . '</span></div>
                </a>
                <a href="/project/nodeApp/assets/partial/_logout.php">
                  <div class="logout">Logout</div>
                </a>
              </div>
          ';
        } else {
          echo '
              <div class="btn">
                <a href="/project/nodeApp/assets/partial/_login.php" class="Login">
                  <span>Login</span>
                </a>
                <a href="/project/nodeApp/assets/partial/_signUp.php" class="sing-up">
                  <span>Sing up</span>
                </a>
              </div>
          ';
        }
        ?>
      </nav>
    </header>
  </div>
  <div class="modal-data">
    <?php
    $login = null;
    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['signupsuccess']) && $_GET['signupsuccess'] === "true" || isset($_GET['loginsuccess']) && $_GET['loginsuccess'] === "true" || isset($_GET['logoutsuccess']) && $_GET['logoutsuccess'] === "true") {
      echo '<div style="border-color: #52b788;" class="modal">
                  <img src="/project/nodeApp/assets/img/check-circle.svg"/> <p>' . $_GET['error'] . ' </p>
                  </div>';
    }
    if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] === "false" || isset($_GET['loginsuccess']) && $_GET['loginsuccess'] === "false") {
      echo '<div style="border-color: #ef233c;" class="modal">
                  <img src="/project/nodeApp/assets/img/alert-circle.svg"/> <p>' . $_GET['error'] . ' </p>
                  </div>';
    }
    ?>
  </div>
</body>

</html>