<?php
    //include("connection.php");
    class usersManager {
        function userManager(){
            //insert info into users table

            private $db;
            
            public function __construct(){
                $this->db = DBConnector::getInstance();
            }
            
            $query = "INSERT INTO users (email, password, address1, address2, country, staProv, city, zipPo, fname, lname, phoneNum) VALUES ('".$_POST['email']."','".$_POST['password']."','".$_POST['address1']."','".$_POST['address2']."','".$_POST['country']."','".$_POST['staProv']."','".$_POST['city']."','".$_POST['zipPo']."','".$_POST['fname']."','".$_POST['lname']."','".$_POST['phoneNum']."')";
            $result = $db->query($query);
        }
        //return null;
    }
?>