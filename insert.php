<?php
if(isset($_POST['Register']))
{	
$email_id = $_POST['email_id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$string = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@$%^&*()";
$password = substr(str_shuffle($string),0,6);
$con = mysqli_connect('localhost','root','','innerwor_hrms');

$query = "INSERT INTO employee   (email_id ,firstname,lastname,password) VALUES ('$email_id','$firstname','$lastname','$password')";
  
$run = mysqli_query($con,$query);

if($run == TRUE) 
	echo "";
    $to_email = $email_id;
    $subject = "Response from website";
    $headers = "From: akankshagoyalju2000@gmail.com";
    $logInLink = "http://localhost:8080/password%20generation/login.html";
    $c =  $logInLink."   "."password is :".$password;
if (mail($to_email,$subject,$c,$headers)){
	echo "Mail sent Successfully";
} else {
	echo "Can not send mail";
}
}
?>  