<?php 

    $login_alert ="";
    session_start();


    if (isset($_SESSION["is_login"]) == true) {
        header("location: dashboard.php");
    }

include "service/database.php";
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE 
        username ='$username' AND password='$password' 
        ";
        $result = $db->query($sql);

        if($result->num_rows > 0){
           $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            $_SESSION["is_login"] = true;
        header("location: dashboard.php");

    } else{
        $login_alert = "akun tidak ditemukan";
    }
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
    <?php include "layout/header.html" ; ?>
    <h3>MASUK AKUN</h3>
    <i><?= $login_alert ?></i>
    <form action="login.php" method="POST">
        <input type="text" placeholder="username" name="username">
        <input type="password" placeholder="password" name="password">
        <button type="submit" name="login">Masuk</button>
    </form>

    <?php include "layout/footer.html";?>
</body>
</html>