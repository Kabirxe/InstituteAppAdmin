<?php
session_start();
require('connect.php');

if(isset($_POST['btnLogin'])){
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];

    $query = 'select name from admintable where email = "'.$email.'" and password ="'.$pass.'"';
    // echo $query;
    $select  = mysqli_query($conn,$query);

    if(mysqli_num_rows($select) > 0){
        $rows = mysqli_fetch_assoc($select);
        $_SESSION['username'] = $rows['name']; 
        header('location: index.php');
    }
    else{
        header('location: login.php');
    }
}

if(isset($_GET['signout'])){
    if($_SESSION['username']){
    session_destroy();
    header('location: login.php');  
    }
}

if(isset($_POST['btnAddCourse'])){
    $cname = $_POST['c_name'];
    $cduration = $_POST['c_duration'];
    $ccharges = $_POST['c_charges'];

    $query = 'insert into courses (course, duration, charges) values ("'.$cname.'","'.$cduration.'",'.$ccharges.')';
    $insert = mysqli_query($conn, $query);
    if($insert){
        header('location: courses.php');
    }
    else{
        echo '<script>alert("Record not inserted");</script>';
    }
}

if($_REQUEST['delcourse']){
    $id = $_GET['delcourse'];
    // echo '<script>alert("Deletion ID:'.$id.'" )</script>';
    $query = 'delete from courses where id ='.$id;
    $delete = mysqli_query($conn , $query);
    if($delete){
        header('location: courses.php');
    }
    else{
        echo '<script>alert("Record not deleted");</script>';
    }
}
if(isset($_REQUEST['editCourse'])){
    $id  = $_GET['editCourse'];
    $query = 'select * from courses where id'.$id;
    $edit = mysqli_query($conn , $query);
    $row = mysqli_fetch_assoc($edit);
    $values = array();
    if($row){
        $values['courseId'] = $row['id'];
        $values['courseName'] = $row['course'];
        $values['courseDuration'] = $row['duration'];
        $values['courseCharges'] = $row['charges'];
    }

    echo json_encode($row);
}

?>