<?php

    require_once('Connection.php');
    session_start();


    $email = mysqli_real_escape_string($con, $_POST['email']) ;
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cfm_password = mysqli_real_escape_string($con, $_POST['confirmpassword']);
    $icode = mysqli_real_escape_string($con, $_POST['icode']);
    
    $errors = array();

    if(empty($email)) {array_push($errors, "EMail is empty");}
    if(empty($firstname)) {array_push($errors, "firstname is empty");}
    if(empty($lastname)) {array_push($errors, "lastname is empty");}
    if(empty($password)) {array_push($errors, "password is empty");}
    if($password != $cfm_password){array_push($errors, "password does not match");}

    
    if(!empty($email)){
        $stmt = $con->prepare("SELECT email FROM tbl_users WHERE email=? LIMIT 1");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();

    if($stmt->num_rows == 1){
        array_push($errors, "Email is already registered");
        $stmt->close();
    }
    }

    if(count($errors)==0){
        $password = password_hash($cfm_password, PASSWORD_BCRYPT);
        $stmt = $con->prepare("INSERT INTO tbl_users(email, firstname, lastname, password, icode) VALUES (?,?,?,?,?)");
        $stmt->bind_param('sssss', $email,  $firstname,  $lastname,  $password, $icode);
        $stmt->execute();
        header("location:../html/signup.php?Success= Successfully Registered");
    }else{
        header("location:../html/signup.php?Error= $errors[0]");
    }
?>

