<?php
require "./assets/partial/db.php";
session_start();
// if(!isset($_SESSION['userName'])){
//   header("Location: /project/nodeApp/assets/partial/_login.php");
// }

$showError = null;
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $title = $_POST['title'];
  $description = $_POST['Description'];
  if (isset($_SESSION['userName'])) {
    if ($title !== "" && $description !== "") {
      $userId =  $_SESSION['user_id'];

      $sql = "INSERT INTO `user_data` (`tital`, `description`, `user_id`) VALUES ( '$title', '$description', '$userId')";
      $connect->query($sql);
      header("Location: ./index.php");
    } else {
      if ($title === "" && $description === "") {
        $showError = "title and description is empty please enter your value";
      } else if ($title === "") {
        $showError = "title is empty please enter your title";
      } else if ($description === "") {
        $showError = "description is empty please enter your title";
      }
    }
  } else {
    $showError = "Youare first Login";
  }
}


if ($_SERVER['REQUEST_METHOD'] === "GET") {
  $id = null;
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }
  if ($id) {
    $sql = "DELETE FROM `user_data` WHERE `id` = $id;";
    mysqli_query($connect, $sql);
    header("Location: /project/nodeApp/index.php");
  }
}
?>
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
  require './assets/partial/_header.php';
  ?>
  <div class="main-file"></div>
  <main>
    <div class="new-node" id="Addbtn">
      <div>Add Note</div>
    </div>
    <div class="note" id="addNewNote">
      <div class="main-section-addnote">
        <form action="./index.php" method="post">
          <div class="hading-section">
            <div class="hading-title">
              <h2>Create New Task</h2>
              <p>Add a new task to your list</p>
            </div>
            <div class="hading-cancel" id="cancel">
              <i class="fa-solid fa-xmark"></i>
            </div>
          </div>
          <div class="add-node-section">
            <label for="title">title</label>
            <input type="text" name="title" id="title">
          </div>
          <div class="add-node-section">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" rows="7"></textarea>
          </div>
          <button type="submit">Create</button>
        </form>
      </div>
    </div>

    <?php

    if (isset($_SESSION['userName'])) {
      $userId = $_SESSION['user_id'];
      $sql = "SELECT * FROM `user_data` WHERE user_id = '$userId'";
      $result = $connect->query($sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $data = date('d-m-Y', strtotime($row['timestemp']));
        echo '
            <div class="list">
              <div class="list-data">
                <div class="Tital">
                  <span class="main-tital">' . $row['tital'] . '</span>
                  <div class="manage">
                    <a href="/project/nodeApp/index.php?id=' . $row['id'] . '">delete</a>
                    <a href="/project/nodeApp/assets/partial/_update.php?id=' . $row['id'] . '">edit</a>
                    <div>' . $data . '</div>
                  </div>
                </div>
                <div class="Description">' . $row['description'] . '</div>
              </div>
            </div>
        ';
      }
    } else{
      ?>
        <img src="assets/img/image.png" alt="" class="image-section">
        <?php
    }
    ?>
  </main>
  <script src="/project/nodeApp/assets/js/script.js"></script>
  <script>
    let error = "<?php echo $showError ?>";
    if (error !== "") {
      alert(error);
    }
  </script>
</body>

</html>