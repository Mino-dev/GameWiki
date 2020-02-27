<?php
    global $connection;
    function connectDB(){
        $db_host = "localhost";
        //$db_username = "id12624664_gamewiki";
        //$db_password = "phpfinals";
        //$db_name = "id12624664_gamewiki";
        $db_username = "root";
		$db_password = "";
        $db_name = "wiki";

        global $connection;
        $connection = mysqli_connect($db_host,
									 $db_username,
									 $db_password,
                                     $db_name);
        if(mysqli_connect_errno()!=0){
            return false;
        }else{
            return true;
        }
    }
    
    function isEmailExisting($email){
        $sql = "SELECT uemail FROM users
                WHERE uemail = '$email'";
        
        global $connection;
        $result = mysqli_query($connection, $sql);
        if(mysqli_num_rows($result) == 0){
            return false;
        }else{
            return true;
        }
    }

    function isUsernameExisting($username){
        $sql = "SELECT username FROM users
                WHERE username = '$username'";
        global $connection;
        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result) == 0){
            return false;
        }else{
            return true;
        }
    }
    function checkIfUniqueUsername($username, $uid){
        $sql = "SELECT username, upassword FROM users
                WHERE uid = '$uid'
                AND username = '$username'";

        $result = mysqli_query($connection, $sql);
        if(mysqli_num_rows($result) == 0){
            return false;
        }else{
            return true;
        }
    }
    function updateUsername($username, $uid){
        $sql = "UPDATE users
                SET username = '$username'
                WHERE uid = '$uid";
        $result = mysqli_query($connection, $sql);
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    function registerUser($username, $password, $email, $type = 1, $pfp='../img/default.png'){

        $sql = "INSERT INTO users(username, upassword, uemail, utype, upfp)
                VALUES('$username', '$password', '$email', '$type', '$pfp')";
        global $connection;
        $result = mysqli_query($connection, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function loginUser($username, $password){
        $ret = mysqli_fetch_array($result);
        $client = array("uid" => $row['uid'],
                    "username" => $row['username'],
                    "uemail" => $row['uemail'],
                    "utype" => $row['utype'],
                    "upfp"  => $row['upfp']);
    }
    
?>