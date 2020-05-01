<?php
    //Get values from form in access.html file
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    //connect to the server and select database
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "users");
    
    //to prevent sql injection
    $email = stripcslashes($email);
    $password = stripcslashes($password);
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);
    
    //$hpass=password_hash($password, PASSWORD_DEFAULT);
    //$password=$hpass;
    
    $result = mysqli_query($con, "select * from mpjusers where email='$email'") or die("Failed to query database ".mysqli_error());
    $row=mysqli_fetch_array($result);
    $pwd=password_verify($password, $row['Password']);
    
    //Query the database for user
    //$result = mysqli_query($con, "select * from mpjusers where email='$email' and password='$password'") or die("Failed to query database ".mysqli_error());
    //$row=mysqli_fetch_array($result);
    
    if($pwd) {
        if($email=="andreea_mada13@yahoo.com")
        //echo "Login success!! Welcome ".$row['Email'];
            {
            header('Location: ./welcome.php');
            exit;}
            else
            {
            header('Location: ./welcome2.php');
            exit;
            }
        
    } else {
        //echo "Try again!";
        header('Location: ./access2.html');
        exit;
    }
    
    /*if($row['Email']==$email && $row['Password']==$password) {
        //echo "Login success!! Welcome ".$row['Email'];
        header('Location: ./welcome.html');
        exit;
        
    } else {
        //echo "Try again!";
        header('Location: ./access2.html');
        exit;
    }*/
?>
