<?php 
require_once('Connection.php');
session_start();
    if(isset($_POST['Login'])){
        $email = $_POST['username'];
        $password = $_POST['password'];
        $user_id = 0;
        $status = "d";
        $newhash ="";
        
        if(empty($username) || empty($password)){
            header("location:../index.php?Empty= Please Fill in the Blanks");
        }
        else{
            $stmt = $con->prepare("SELECT user_ID, firstname, lastname, email, password FROM tbl_users WHERE email=? LIMIT 1");
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->bind_result($user_ID, $firstname, $lastname, $email, $hash);
            $stmt->store_result();
           
            
            
            
            if($stmt->num_rows == 1){
                while($stmt->fetch()){
                    if(password_verify($password, $hash)){
                        $_SESSION['userID']=$user_ID;
                        $_SESSION['firstname']=$firstname;
                        $_SESSION['lastname']=$lastname;
                        header("location: ../index.php");
                    }
                    else{
                    header("location:../index.php?Invalid= Incorrect Password");     
                }
            }
            }else{
                header("location:../index.php?Invalid= Email not found");
            }
                
            
            $stmt->close();           
        } 
    }
    else{
        header("location:../index.php");
    }

?>