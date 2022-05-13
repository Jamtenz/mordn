<?php
    session_start();

    include("class/DB.php");
    include("class/Signin.php");
    include("class/User.php");
    include("class/Post.php");

    //include_once("Components/header.php");
    // 이새끼 로그인했는지 확인
    if(isset($_SESSION['service_userid']) && is_numeric($_SESSION['service_userid'])) {
        $id = $_SESSION['service_userid'];
        $login = new Signin();

        $result = $login->check_login($id);

        if($result) {
            // 유저 정보 획득
            $user = new User();

            $user_data = $user->get_data($id);

            if(!$user_data) {
                header("Location: login.php");
                die;
            }
        } else {
            header("Location: signin.php");
            die;
        }
    } else {
        header("Location: signin.php");
        die;
    }

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $post = new Post();
        $id = $_SESSION['service_userid'];
        $result = $post->create_post($id, $_POST);

        if($result == "") {
            header("Location: profile.php");
            die;
        } else {
            echo "Following errors occured";
            echo $result;
        }
    }

    // 게시물 결합
    $post = new Post();
    $id = $_SESSION['service_userid'];

    $posts = $post->get_posts($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mordn - Profile</title>
</head>
<body>
    <div>
        <h3><?php echo $user_data['name'] ?></h3>
    </div>
    <div>
        <a href="signout.php">
            <span>
                SignOut
            </span>
        </a>
    </div>
    <form method="post">
        <textarea name="post" Placeholder="Meet New Friends?"></textarea>
        <input type="submit" value="Post">
        <br>
    </form>

    <div id="post-sector">
        <?php
        
        if($posts) {
            foreach($posts as $ROW) {
                $user = new User();
                $ROW_USER = $user->get_user($ROW['userid']);

                include("./Components/view-post.php");
            }
        }
        
        ?>
    </div>
</body>
</html>