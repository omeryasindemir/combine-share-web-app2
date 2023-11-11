<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">YOR'U</a> </p>
        </div>

        <div class="right-links">

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
            }
            
            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            ?>

            <a href="/upload.php"><button class="btn">Upload Image</button></a>


            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>
    <main>

    <form action="upload_process.php" method="POST" enctype="multipart/form-data">
        <label for="images">Select Images :</label>
        <br>
        <input type="file" name="images[]" id="images" multiple required>
        <br>
        <label for="description">Image Explanation :</label>
        <br>
        <textarea name="description" id="description" placeholder="Görsel Açıklaması..." required></textarea>
        <br>
        <input type="submit" class="neyleyek" value="SEND">
    </form>


       

    </main>

    

</body>
</html>