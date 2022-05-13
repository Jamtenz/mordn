<?php
    include("class/DB.php");
    include("class/Signup.php");

    //include_once("Components/header.php");
    $name = "";
    $gender = "";
    $email = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $signup = new Signup();
        $result = $signup->evaluate($_POST);

        if($result != "") {
            echo "Following error occured";
            echo $result;
        } else {
            header("Location: signin.php");
            die;
        }

        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mordn - Signup</title>
</head>
<body>
    <form method="post" action="">
        <input value="<?php echo $name ?>" name="name" type="text" id="text" placeholder="Name"><br>
        <span style="font-weight: normal;">Gender</span><br>
        <select id="text" name="gender">
            <option><?php echo $gender ?></option>
            <option>Male</option>
            <option>Female</option>
</select>
        <input name="email" type="text" id="text" placeholder="Email"><br>
        <input name="password" type="text" id="text" placeholder="Password"><br>
        <input name="password2" type="text" id="text" placeholder="Retype Password"><br>
        <input type="submit" id="button" value="SignUp"><br>
    </form>
</body>
</html>