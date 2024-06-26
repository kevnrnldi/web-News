<?php 
 session_start();
    if(isset($_POST["logout"])){
        session_unset();
        session_destroy();
        header("location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>   
    <?php include "layout/header.html" ?>
    
    <h1>Selamat Datang <?= $_SESSION["username"] ?> Di web NEWS</h1>
    <form action="dashboard.php" method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>
    <?php include "layout/footer.html" ?>
</body>
</html>