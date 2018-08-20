<?php 

if(isset($_POST['submit'])){

    include_once 'dbh.inc.php';
    

    $first = mysqli_real_escape_string($conn,$_POST['first']);
    $last = mysqli_real_escape_string($conn,$_POST['last']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $uid = mysqli_real_escape_string($conn,$_POST['uid']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
    //error heandlers

    //check for empty fields
    if( empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)){

header("Location: ../signup.php?signup=empty");
        exit();
 
 }     else {
                    //check if inputs characters are valid
                    if (!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last)) {
                        header("Location: ../signup.php?signup=invalid");  //code
                        exit();
                }  else{
                            //chek if email is valid
                            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                            {
                                header("Location: ../signup.php?signup=email");  // <---I get ------this error------------
                                exit(); 
                            }//if

                            else{
                                $sql = "SELECT * FROM users WHERE user_uid='$uid'";
                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);
                                    if($resultCheck > 0){
                                        header("Location: ../signup.php?signup=userIsTaken");  //code
                                        exit();
                                    }
                                    else{
                                        //hashing the password
                                        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                                        //insert usere into database
                                        $sql = "INSERT INTO users (users_first, user_last, user_email, user_uid, user_pwd)
                                                 VALUES ('$first', '$last', '$email', '$uid', '$pwd');";
                                                 mysqli_query($conn, $sql);
                                                 header("Location: ../signup.php?signup=sucsess");  //code
                                                 exit(); 
                                    }


                             }
                           
                        }  //else
                 }


        } 

else {
    header("Location: ../signup.php");
    exit();
}