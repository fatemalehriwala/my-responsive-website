<?php
    include('connection.php');  
    
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
    
    //to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);  
    
    $sql = "select * from login where username = '$username' and password = '$password'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
    
    if($count == 1){  
        // Redirect to home page if login successful
        header("Location: Home.html");
        exit();
    }  
    else{  
        // Redirect back to login page if login failed
        
        // header("Location: index.html");
        $error_message = "Invalid Username or Password";
        header('Location: index.php?error='.urlencode($error_message));
        
        // echo"wrongpassword";
        exit();
    }     

