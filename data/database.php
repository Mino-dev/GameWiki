<?php
    $connection;
    $result;
    function connectDB(){
        $db_host = "localhost";
        $db_username = "id12624664_gamewiki";
        $db_password = "phpfinals";
        $db_name = "id12624664_gamewiki";
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
    function isUsernameExisiting($username, $password){
        $sql = "SELECT * FROM users
        WHERE username = '$username'
        AND password = '$password'";

        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result) != 0){
            return true;
        }else{
            return false;
        }
    }
    function checkIfUniqueUsername($username, $uid){
        $sql = "SELECT username FROM users
                WHERE uid = '$uid'
                AND username = '$username'";
        if(mysqli_num_rows($result) != 0){
            return true;
        }else{
            return false;
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
    function retrieveUserData(){
        $ret = mysqli_fetch_array($result);
        $client = array("uid" => $row['uid'],
                    "username" => $row['username'],
                    "uemail" => $row['uemail'],
                    "utype" => $row['utype'],
                    "upfp"  => $row['upfp']);
        return $client;
    }
    
?>