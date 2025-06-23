<?php
require "db.php";
$showError = null;
$id = null;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $title = $_POST['title'];
    $description = $_POST['Description'];

    if ($title !== "" && $description !== "") {

        $sql = "UPDATE `user_data` SET `tital` = '$title', `description` = '$description' WHERE id = '$id'";
        $connect->query($sql);
        header("Location: /project/nodeApp/index.php");
    } else {
        if ($title === "" && $description === "") {
            $showError = "title and description is empty please enter your value";
        } else if ($title === "") {
            $showError = "title is empty please enter your title";
        } else if ($description === "") {
            $showError = "description is empty please enter your title";
        }
    }
}

$sql = "SELECT * FROM `user_data` WHERE id = '".$_GET['id']."'";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/project/nodeApp/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="note" id="addNewNote" style="display: flex;">
        <div class="main-section-addnote">
            <form action="" method="post">
                <div class="hading-section">
                    <div class="hading-title">
                        <h2>Update Your Task</h2>
                        <p>Update a task to your list</p>
                    </div>
                    <a href="/project/nodeApp/index.php" class="hading-cancel"  style="text-decoration: none;color:#FFF;">
                        <i class="fa-solid fa-house"></i>
                    </a>
                </div>
                <div class="add-node-section">
                    <label for="title">title</label>
                    <input type="text" name="title" id="title" value="<?php echo $row['tital']; ?>">
                </div>
                <div class="add-node-section">
                    <label for="Description">Description</label>
                    <textarea name="Description" id="Description" rows="7"><?php echo $row['description']; ?></textarea>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
    <script>
        let error = "<?php echo $showError ?>";
        if (error !== "") {
            alert(error);
        }
    </script>
</body>

</html>