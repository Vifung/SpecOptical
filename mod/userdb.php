<?php 
include("connection.php");

function insert_user() {
    // insert info into the users table
    global $db;
    
    $query = "INSERT INTO users (email, password, fname, lname) VALUES ('".$_POST['email']."', '".$_POST['password']."','".$_POST['fname']."','".$_POST['lname']."')";
    $result = $db->query($query);
}

function login_user() {
    
    session_start(); 
    
    global $db;
    // get user data from request
    $username = $_POST['email'];
    $password = $_POST['password'];
    
    // check if user data matcher db
    $query = "SELECT * FROM users WHERE email = '$username' AND password = '$password' ";
        
    
    // if matches, return ok
    //    data.username
    //    $db->Username
    $result = $db->query($query);
        
        
    
    // if it doesn't match, return not ok
    if($result){
    
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $email= $row['email'];
        $fname= $row['fname']; // Database MYSQL
        $lname= $row['lname'];
    
    // container put stuff 
    $_SESSION['email'] = $email;
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['logged'] = true;
        
        
        
        return true;
        
        
    
        
    
    } else{
    
        $_SESSION['logged'] = false;
        header('Location: index.php');
        
    }
    
}


function update_user() {

    global $db;
    // NOT SURE HOW CAN I GET THIS SPECIFIC USER RATHER THAN TYPE THEIR USER ID
    // UPDATE SEEMS NOT WORKING :(
    
$query = "UPDATE users SET email='".$_POST['email']."', address1='".$_POST['address1']."', address2='".$_POST['address2']."', 
country='".$_POST['country']."', staProv='".$_POST['stateProvince1']."', 
city='".$_POST['stateProvince2']."', zipPo='".$_POST['zpcode']."', fname='".$_POST['fname']."',
lname='".$_POST['lname']."', phoneNum='".$_POST['phoneNum']."' WHERE id='1' ";
$result = $db->query($query);

}

function update_stock() {

    global $db;
    // NOT SURE HOW CAN I GET THIS SPECIFIC USER RATHER THAN TYPE THEIR USER ID
    // UPDATE SEEMS NOT WORKING :(
    
$query = "UPDATE product SET stock='".$_POST['stock']."' WHERE id='1' ";
$result = $db->query($query);

}



?>