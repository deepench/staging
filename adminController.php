<?php
session_start();
include('includes/config.php');
?>

<?php
if(isset($_REQUEST['registerbtn'])){

    $username = $_POST['username'];
    $email =$_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

 
    if($password === $cpassword){

        $query = "INSERT INTO register (`username`,`email`,`password`) VALUES ('$username','$email','$password') ";
        $result = mysqli_query($db,$query);

        if($result){

            $_SESSION['success'] = "Admin registered Sucessfully";
            header('location:register.php');

        }else{
            $_SESSION['status'] = "Admin profile not added";
            header('location:register.php');
        }
    }
         else{


            $_SESSION['status'] = "Password and Confirm password did not match";
            header('location:register.php');

    }



  
   
}

?>