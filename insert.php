<?php
    $FirstName=$_POST['FirstName'];
    $LastName=$_POST['LastName'];
    $Age=$_POST['Age'];
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    
    if(!empty($FirstName) || !empty($LastName) || !empty($Age) || !empty($Email) || !empty($Password)) {
        $host="localhost";
        $dbUsername="root";
        $dbPassword="";
        $dbname="users";
        
        //create connection
        $conn=new mysqli($host, $dbUsername, $dbPassword, $dbname);
        
        if(mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }
        else {
            $hpass=password_hash($Password, PASSWORD_DEFAULT);
            $Password=$hpass;
            $SELECT="SELECT email From mpjusers Where Email = ? Limit 1";
            $INSERT="INSERT Into mpjusers (FirstName, LastName, Age, Email, Password) values(?, ?, ?, ?, ?)";
            
            //Prepare statement
            $stmt=$conn->prepare($SELECT);
            $stmt->bind_param("s", $Email);
            $stmt->execute();
            $stmt->bind_result($Email);
            $stmt->store_result();
            $rnum=$stmt->num_rows;
            
            if($rnum==0) {
                $stmt->close();
                
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("ssiss", $FirstName, $LastName, $Age, $Email, $Password);
                $stmt->execute();
                echo "New record inserted sucessfully";
                header('location: access.html');
            }
            else {
                echo "Someone already register using this email";
            }
            
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All fields are required";
        die();
    }
?>
