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

            <a href="php/logout.php"><button class="btn">Log Out</button></a>

        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
            </div>
            <div class="box">
                <p>Your email is <b><?php echo $res_Email ?></b>.</p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p>And you are <b><?php echo $res_Age ?> years old</b>.</p> 
            </div>

          </div>
       </div>


       

    </main>

    <div class="main">
    

<div class="df">
<?php
    include('config.php');

    if (isset($_GET['description'])) {
        $description = $_GET['description'];

        echo "<h2>$description</h2>"; // Açıklamayı sadece bir kez görüntüler

        $result = $conn->query("SELECT * FROM uploads WHERE description = '$description'");

        while ($row = $result->fetch_assoc()) {
            echo "<div class='gallery-item'>";
            echo "<img src='uploads/{$row['image_name']}' alt='{$row['description']}'>";
            echo "</div>";
        }
    }

    $conn->close();
    ?>
</div>




<style>


.gallery-item{
    height: 350px;
    width: 350px;
    border: 2px solid #8883CE;
    border-radius: 5px;
    
}

.gallery-item img{
    height: 100%;
    width: 100%;
    object-fit: cover;
}



.df{
    display: flex;
    gap: 40px;
    row-gap: 85px;
    padding-top: 10px;
    flex-wrap: wrap;
    justify-content: center;

}

.bookmark-button{
    background-color: #8883CE;
    padding: 5px;
    border-radius: 5px;
    text-align: center;
    color: white;
    cursor: pointer;
}

.bookmark{
    background-color: #8883CE;
    padding: 5px;
    border-radius: 5px;
    text-align: center;
    color: white;
    cursor: pointer;
    
}

.box{
    margin-bottom: 10px;
}



</style>
</div>

</body>
</html>