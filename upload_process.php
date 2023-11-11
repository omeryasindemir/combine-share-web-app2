<?php
include('config.php');

if (isset($_POST['description']) && !empty($_FILES['images'])) {
    $description = $_POST['description'];

    foreach ($_FILES['images']['name'] as $key => $image_name) {
        $image_tmp = $_FILES['images']['tmp_name'][$key];

        move_uploaded_file($image_tmp, "uploads/" . $image_name);

        $stmt = $conn->prepare("INSERT INTO uploads (image_name, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $image_name, $description);
        $stmt->execute();
    }

    header("Location: home.php");
}
?>
