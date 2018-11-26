<?php

function redirect($location){
    header("Location: $location");
}

function query($query){
    global $connection;
    return mysqli_query($connection, $query);
}

function confirm($result){
    global $connection;
    if (!$result){
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

function escape_string($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
    return mysqli_fetch_array($result);
}

function login_user(){
    if(isset($_POST['submit'])){
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        $query = query("SELECT * FROM users WHERE user_name = '{$username}' AND user_password = '{$password}'");
        confirm($query);

        if(mysqli_num_rows($query) == 0){
            set_message("Wrong!");
            redirect("login.php");

        }
        else{
            set_message("Welcome {$username}");
            redirect("index.php");
        }
    }
}

function set_message($msg){
    if(!empty($msg)){
        $_SESSION['message']=$msg;
    }else{
        $msg = "";
    }
}

function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function send_message(){
    if(isset($_POST['submit'])){

        $to = "fakherbourray@gmail.com";
        $from_name = $_POST['name'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $headers = "From: {$from_name} {$email}";

        $result = mail($to, $subject, $message, $headers);
        
        if(!$result){
            set_message("try again");
            redirect("contact.php");
        }else{
            set_message("message sent successfully");
            redirect("contact.php");
        }
    }
}

?>