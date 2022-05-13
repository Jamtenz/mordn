<?php
    class Signup {
        private $error = "";

        public function evaluate($data) {
            foreach ($data as $key => $value) {
                if (empty($value)) {
                    $this->error = $this->error . $key . " is empty<br>";
                }
                if($key == "email") {
                    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $value)) {
                        $this->error = $this->error . $key . " invailed email address <br>";
                    }
                }                
                if($key == "name") {
                    if(is_numeric($value)) {
                        $this->error = $this->error .  " name cant be a number <br>";
                    }
                    if(strstr($value, " ")) {
                        $this->error = $this->error . "name cant have spaces<br>"; 
                    }
                }
            }
            if ($this->error == "") {
                $this->create_user($data);
            } else {
                return $this->error;
            }
        }

        public function create_user($data) {
            $name = ucfirst($data['name']);
            $gender = ucfirst($data['gender']);
            $email = $data['email'];
            $password = $data['password'];

            // Create User Class
            $url_address = strtolower($name);
            $userid = $this->create_userid();

            $query = "INSERT INTO users 
            (userid, name, gender, email, password, url_address) 
            values 
            ('$userid', '$name', '$gender', '$email', '$password', '$url_address')";

            $DB = new DB();
            $DB->save($query);
        }
        private function create_userid() {
            $length = rand(4, 19);
            $number = "";
            for ($i=0; $i<$length;$i++) {
                $new_rand = rand(0, 9);
                $number = $number . $new_rand;
            }
            return $number;
        }
    }