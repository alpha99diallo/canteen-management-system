<?php

Class Admin {

    private $db;

    public function __construct ($conn) {

        $this->db = $conn;

    }

    //Rgister new user within database
    public function register($uname, $email, $pass) {

        $passHash = password_hash($pass, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("INSERT INTO users (userName, userEmail, userPassword) VALUES (?,?,?)");
        $stmt->bind_param("sss", $uname, $email, $passHash);

        if($stmt->execute()) {
            return true;
        } else {
            return $stmt->error;
        }

    }

    //Look for existing user in database
    public function login($user, $pass) {

        //Query database for info based on username or email
        $stmt = $this->db->prepare("SELECT adminName, adminEmail, password FROM admin WHERE adminName = ? OR adminEmail = ?");
        $stmt->bind_param("ss", $user, $user);
        $stmt->execute();
        $stmt->store_result();

        //If info is found get info, else return error
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($uname, $email, $passHash);
            $result = $stmt->fetch();

            //if password matches setup session, else return error
            if ($pass === $passHash) {
                $_SESSION['adminName'] = $uname;
                $_SESSION['adminEmail'] = $email;
                $_SESSION['adminLoginStatus'] = 1;

                return true;
            } else {
                return 'Wrong password';
            }

        } else {
            return 'Wrong username or email';
        }
    }

    //Check if user is logged in
    public function isLoggedIn() {

        //Return true if session has been set, false if it hasn't
        if(isset($_SESSION['adminLoginStatus'])) {
            return true;
        } else {
            return false;
        }

    }

    //Redirect to a different page
    public function redirect($url) {
        header("Location: $url");
    }

    public function logout() {
        session_start();
        $_SESSION = array();
        session_destroy();
    }

}
?>
