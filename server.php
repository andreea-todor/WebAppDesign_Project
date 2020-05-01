<?php 

    session_start();
    //initialize variables
    $name="";
    $category="";
    $link="";
    $id=0;
    $edit_state=false;
    
    //connect to database
    $db=mysqli_connect('localhost', 'root', '', 'users');
    
    //if save button is clicked
    if(isset($_POST['save'])){
        $name=$_POST['name'];
        $category=$_POST['category'];
        $link=$_POST['link'];
        
        $query="INSERT INTO tests (name, category, link) VALUES ('$name', '$category', '$link')";
        mysqli_query($db, $query);
        $_SESSION['msg']="Address saved";
        header('location: indexcrud.php'); //redirect to index page after inserting
    }
    
    //update records
    if(isset($_POST['update'])) {
        $name=mysqli_real_escape_string($db, $_POST['name']);
        $category=mysqli_real_escape_string($db, $_POST['category']);
        $link=mysqli_real_escape_string($db, $_POST['link']);
        $id=mysqli_real_escape_string($db, $_POST['id']);
        
        mysqli_query($db, "UPDATE tests SET name='$name', category='$category', link='$link' WHERE id='$id'");
        $_SESSION['msg']="Address updated";
        header('location: indexcrud.php');
    }
    
    //delete records
    if(isset($_GET['del'])) {
        $id=$_GET['del'];
        mysqli_query($db, "DELETE FROM tests WHERE id=$id");
        $_SESSION['msg']="Address deleted";
        header('location: indexcrud.php');
    }
    
    //retrieve records
    $results=mysqli_query($db, "SELECT * FROM tests");
    
?>
