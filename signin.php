<?php
session_start();
    include("class/DB.php");
    include("class/Signin.php");

    //include_once("Components/header.php");
    $email = "";
    $password = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $signin = new Signin();
        $result = $signin->evaluate($_POST);

        if($result != "") {
            echo "Following error occured";
            echo $result;
        } else {
            header("Location: profile.php");
            die;
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mordn - SignIn</title>
</head>
<body>
    <form method="post" action="">
        <input value="<?php echo $email ?>" name="email" type="text" id="text" placeholder="Email"><br>
        <input value="<?php echo $password ?>" name="password" type="text" id="text" placeholder="Password"><br>
        <input type="submit" id="button" value="SignIn"><br>
    </form>
</body>
</html>