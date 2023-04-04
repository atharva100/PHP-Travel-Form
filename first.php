<?php

$insert = false;

if(isset($_POST['name'])){

    
    $server = "localhost";
    $username = "root";
    $password = ""; // for localhost, password is "" 

    // now we will use mySQL-i (i = improved) to connect php to database
    $con = mysqli_connect($server,$username,$password);  // now we securely made a connection with database

    if(!$con){
        die("connection to this database failed due to ".mysqli_connect_error());
    }
    //echo "Success connecting to database";
    //$dbname = "trip";
    //mysqli_select_db($con, $dbname);

    
    // collect POST variables
    $name = $_POST["name"];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $Other = $_POST['Other'];
    $phone1 = "$phone";

    $sql = "INSERT INTO `trip` . `trip1`(`name`, `age`, `gender`, `email`, `phone`, `Other`, `Dt`) VALUES ('$name','$age','$gender','$email','$phone','$Other',current_timestamp());";


    // Execute the query
    if($con->query($sql) == true){
        if($age>21){
          $insert= False;
        }
        if(strlen($phone1)!=10){
            $insert= False;
        }
        else{
            $insert = True;
             //echo "successfully inserted";
        //}
        }
        
       

        
     }
    else{
        echo "ERROR:$sql <br> $con -> error";
    }
    

    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travek Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class = "bg" src="kjsce_img.jpeg" alt="KJSCE">
    <div class="container">
        <h2 >Welcome to KJSCE - US trip form</h3>
        <p>Enter your details to confirm your participation in the trip</p>
       <?php
       if($age>21){
        echo "<p class = 'age'>Age cannot exceed 21. Please fill the form again.</p>";
       }
       if(strlen($phone1)!=10){
        echo "<p class = 'phone'>Phone num should be exactly 10 digits.</p>";
       }
       if($insert==True){
        echo "<p class='submit'> Thanks for submitting, $name. We are looking forward to enjoy the trip with you!</P>";
       } 
?>
        <form action= "first.php" method="post">  <!--// two methods : get and post, post = very secure(used to store passwords) so used for form submission
                                               // get is not secure, whatever data you send via get can be seen through url
        -->
            <input type="text" name="name" id="name" placeholder="Enter your name" >
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea type = "Other" name="Other" id="Other" cols="30" rows="10" placeholder = "enter any other information here such as medical history"></textarea>
            <button class="btn">submit</button>    <!--id = uniquely identifies an element while class,two elements can have same class-->
                                          
        </form>                                       
    </body>                                    
    <script src="index.js"></script>
    <!--INSERT INTO `trip1`(`Serial num`, `Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Dt`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')-->
</body>
</html>


