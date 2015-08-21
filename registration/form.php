<!DOCTYPE html>
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

    if(empty($_POST['gender']) || $_POST['gender']=="gender"){
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
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
         <link href="registration.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body>
           <fieldset>
         <legend><h1>Registration Form</h1></legend>
        <form id="register" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <ul class="form_list" id="left">
             <li><label for="name">Name</label><br/><input id="name" type="text" name="name" placeholder=""></input><br/><span class="validation-message"><?php echo $nameErr ?></span></li>
             <li><label for="email">Email</label><br/><input id="email" type="email" name="email" placeholder=""></input><br/><span class="validation-message"><?php echo $EmailErr ?></span></li>
             <li><label for="number">Phone No.</label><br/><input id="number" type="number" name="phone" placeholder=""></input><br/><span class="validation-message"><?php echo $PhoneErr ?></span></li>
             <li><label for="gender">Gender</label><br/>
                                <select id="gender" name="gender">
                                <option value="gender">Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                            </select><br/><span class="validation-message"><?php echo $GenderErr ?></span></li>
           <!--<input type="text" name="gender" id="gender" placeholder=""></input>-->
                 </ul>
            <ul class="form_list" id="middle">
            <li><label for="dob">Date Of Birth</label><br/><input type="text" id="dob"  name="dob" placeholder="(dd/mm/yyyy)"></input><br/><span class="validation-message"><?php echo $DOBErr ?></span></li>
             
            <li><label for="department">Department</label><br/><input type="text" name="department"  id="department" placeholder=""></input><br/><span class="validation-message"><?php echo $DepErr ?></span></li>
            <li><label for="year">Year</label><br/>
                <select id="year" name="year"><!--Add to database-->
                <option value="yr">Year</option>
                <option value="1">1st</option>
                <option value="2">2nd</option>
                <option value="3">3rd</option>
                <option value="4">4th</option>
                <option value="5">5th</option>

            </select><!--Add to database-->
                 <br/><span class="validation-message"><?php echo $YearErr ?></span>
            </li>
               <li><label for="college">Institution</label><br/><input type="text" name="college" id="college" placeholder=""></input><br/><span class="validation-message"><?php echo $instiErr?></span></li>
                     
                 </ul>
            
            <ul class="form_list" id="right_ul" style="float: right">

          

            <li><label for="city">City</label><br/><input type="text" id="city" name="city" placeholder=""></input><br/><span class="validation-message"><?php echo $cityErr ?></span></li>
            <li><label for="state">State</label><br/>
                <select name="state" id="state">
                <option value="state">State</option>
                <option value="Haryana">Haryana</option>
                <option value="Punjab">Punjab</option>
                <option value="Goa">Goa</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Kerala">Kerala</option>
                <option value="Orissa">Orissa</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Delhi">Delhi</option>
                <option value="Bihar">Bihar</option>
                <option value="Assam">Assam</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="other">other</option>
                <option value="Manipur">Manipur</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="West Bengal">West Bengal</option>
                <option value="Telangana">Telangana</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Sikkim">Sikkim</option>

            </select>
            <br/><span class="validation-message"><?php echo $StateErr ?></span>
            </li>
               <li><span>[All fields are mandatory]</span></li>
            <li><input type="submit" value="Submit"></input></li>
            
            </ul>
        </form>
              <center> <h1><?php echo $status ?></h1></center>
         </fieldset>  
       <center> <iframe id="ifb" class="social_holder" src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FConcettoismdhanbad&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=100" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:auto;" allowTransparency="true"></iframe></center>
    </body>
</html>
