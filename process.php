<?php
session_start();    
include("config.php");


//Adding Task
if(isset($_POST["insert"])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];
    
    // $check_email_query = "SELECT * FROM student WHERE email = '$email'";
    // $email_result = mysqli_query($con,$check_email_query);
    // $email_count = mysqli_fetch_array($email_result)[0];

    // $check_studnum_query = "SELECT * FROM student WHERE student_number = '$studentId'";
    // $studnum_result = mysqli_query($con,$check_studnum_query);
    // $studnum_count = mysqli_fetch_array($studnum_result)[0];

    if($title === ''){
        $_SESSION['status'] = "Input a title.";
        $_SESSION['status_code'] = "error";
        header("Location: insert.php");
        exit();
    }

    $query = "INSERT INTO `tasks`(`title`, `description`, `priority`, `due_date`) VALUES ('$title', '$description', '$priority', '$due_date')";

    $query_result = mysqli_query( $con, $query );

    if($query_result){
        echo "Task Successfully Added";
        $_SESSION['status'] = "Successfully Added";
        $_SESSION['status_code'] = "success";
        header("Location: index.php");
        exit();
    }
}