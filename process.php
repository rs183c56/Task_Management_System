<?php
session_start();    
include("config.php");

if(isset($_POST["insert"])){

    $studentId = $_POST['studentId'];
    $email = $_POST['email'];
    $fname = $_POST['firstName'];
    $mname = isset($_POST['middlename']) ? $_POST['middlename'] : '' ;
    $phone_number = $_POST['phone_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = $_POST['address'];
    $lname = $_POST['lastName'];

    $check_email_query = "SELECT * FROM student WHERE email = '$email'";
    $email_result = mysqli_query($con,$check_email_query);
    $email_count = mysqli_fetch_array($email_result)[0];

    $check_studnum_query = "SELECT * FROM student WHERE student_number = '$studentId'";
    $studnum_result = mysqli_query($con,$check_studnum_query);
    $studnum_count = mysqli_fetch_array($studnum_result)[0];

    if($email_count > 0){
        $_SESSION['status'] = "Email address already taken";
        $_SESSION['status_code'] = "error";
        header("Location: register.php");
        exit();
    }

    if($studnum_count > 0){
        $_SESSION['status'] = "Student ID already taken";
        $_SESSION['status_code'] = "error";
        header("Location: register.php");
        exit();
    }

    $query = "INSERT INTO `student`(`student_number`, `fname`, `mname`, `lname`, `date_of_birth`, `email`, `phone_number`, `address`) VALUES ('$studentId', '$fname', '$mname', '$lname','$date_of_birth', '$email', '$phone_number', '$address')";

    $query_result = mysqli_query( $con, $query );

    if($query_result){
        echo "Registered Successfully";
        $_SESSION['status'] = "Registration Sucess!";
        $_SESSION['status_code'] = "success";
        header("Location: register.php");
        exit();
    }
}