<?php
    class Signin {
        private $error = "";

        public function evaluate($data) {
            $email = addslashes($data['email']);
            $password = addslashes($data['password']);

            $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";

            $DB = new DB();
            $result = $DB->read($query);

            if($result) {
                $row = $result[0];

                if($password == $row['password']) {
                    $_SESSION['service_userid'] = $row['userid'];
                } else {
                    $this->error .= "wrong password<br>";
                }
            } else {
                $this->error .= "No such email was here<br>";
            }
            return $this->error;
        }

        public function check_login($id) {
            $query = "SELECT userid FROM users WHERE userid = '$id' LIMIT 1";

            $DB = new DB();
            $result = $DB->read($query);

            if($result) {
                return true;
            }   
            
            return false;
        }
    }