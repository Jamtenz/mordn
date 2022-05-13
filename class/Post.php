<?php
class Post {
    private $error = "";

    public function create_post($userid, $data) {
        if(!empty($data['post'])) {
            $post = addslashes($data['post']);
            $postid = $this->create_postid();

            $query = "INSERT INTO post (userid, postid, post) VALUES ('$userid', '$postid', '$post')";

            $DB = new DB();
            $DB->save($query);
        } else {
            $this->error .= "Please type Something";
        }
    }

    public function get_posts($id) {
        $query = "SELECT * FROM post WHERE userid = '$id' ORDER BY id DESC LIMIT 10";
        $DB = new DB();
        $result = $DB->read($query);

        if($result) {
            return $result;
        } else {
            return false;
        }
    }

    private function create_postid() {
            $length = rand(4, 19);
            $number = "";
            for ($i=0; $i<$length;$i++) {
                $new_rand = rand(0, 9);
                $number = $number . $new_rand;
            }
            return $number;
        }
}