<?php 

$nameErr=$EmailErr=$PhoneErr=$GenderErr=$DOBErr=$DepErr=$YearErr=$instiErr=$cityErr=$StateErr="";
$name=$Email=$Phone=$Gender=$DOB=$department=$Year=$insti=$city=$State="";
$status="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(empty($_POST['name'])){
        $nameErr="Name is required.";
    }
    else{
        $name=$_POST['name'];

        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
        }

    }

    if(empty($_POST['email'])){
        $EmailErr="Email is required";
    }
     else{
        $Email=$_POST['email'];
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
       $EmailErr = "Invalid email format"; 
         }
    }



    if(empty($_POST['phone'])){
        $PhoneErr="Phone No. is required";
    }
     else{
        $Phone=$_POST['phone'];
    }

    if(empty($_POST['gender'])){
        $GenderErr="Gender is required";
    }
     else{
        $Gender=$_POST['gender'];
    }

    if(empty($_POST['dob'])){
        $DOBErr="DOB is required";
    }
     else{
        $DOB=$_POST['dob'];
    }

    if(empty($_POST['department'])){
        $DepErr="Department is required";
    }
     else{
        $department=$_POST['department'];
    }

    if(empty($_POST['year'])){
        $YearErr="Year is required";
    }
     else{
        $Year=$_POST['year'];
    }

    if(empty($_POST['college'])){
        $instiErr="College Name is required";
    }
     else{
        $insti=$_POST['college'];
    }

    if(empty($_POST['city'])){
        $cityErr="City is required";
    }
     else{
        $city=$_POST['city'];
    }

    if(empty($_POST['state'])|| $_POST['state']=="state"){
        $StateErr="State is required";
    }
     else{
        $State=$_POST['state'];
    }

    if(empty($nameErr) && empty($EmailErr) && empty($cityErr) && empty($DepErr)  && empty($DOBErr) && empty($StateErr)  && empty($YearErr) && empty($GenderErr) 
    && empty($instiErr) && empty($PhoneErr)){
        $msg="Registration - Concetto 2014: \n\n\n";
        $msg.='Name : '.$name."\n"."Email : ".$Email."\n"."Phone : ".$Phone."\n"."Gender : ".$Gender."\n"."Date Of Birth : ".$DOB."\n"."Year : ".$Year
        
            ."Department : ".$department."\n"."College : ".$insti."\n"."City : ".$city."\n"."State : ".$State;
        $msg = wordwrap($msg, 70);
            $subject="Registration - Concetto 2014";
            $from="From : ".$Email;

        $mail=mail("rconcetto89@gmail.com",$subject,$msg,$from);
        if($mail){
            $status='Registration succesfull';
        }
        else{
            $status='Registration failed. Try again.';
        }
    }
    
}
?>