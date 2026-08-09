<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation Example</title>
</head>
<body>
 
    <h2>Registration Form -  Student Technology Club</h2>
 
<?php
    $name = $age = $email = $membership = $department = $phone = "";
    $nameErr = $ageErr = $emailErr = $membershipErr = $departmentErr = $phoneErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){


        if(empty($_POST["name"])){
            $nameErr = "Name is required";

        }else {
            $name = $_POST["name"];
            if(!preg_match("/^[a-zA-Z ]*$/", $name)){
                $nameErr = "Only Letters and Spaces are allow";
            }
        }

        if(empty($_POST["$age"])){
            $ageErr = "Age is required";
        }else{

            $age = $_POST["$age"];

            if(!!is_numberic($age) || $age<18 || $age>30){
                $ageErr = "Age must be between 18 and 30.";
            }
        }


        if(!empty($_POST["$email"])){
            $emailErr = "Email is required";
        }else{

            $email = $_POST["$email"];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

                $emailErr = "Invalid Email Format";
            }
        }
        
        if(!empty($_POST["$membership"])){
            $membershipErr = "Please select a membership type";
        }else{

            $membership = $_POST["$membership"];
           
        }
        
        if(!empty($_POST["$department"])){
            $departmentErr = "Please select a Deprtment";
        }else{

            $department = $_POST["$department"];
           
        }
        
        
        if(empty($_POST["phone"])){
            $phoneErr = "phone number  is required";

        }else {
            $phone = $_POST["phone"];
            if(!preg_match("/^[0-9 ]{11}$/", $phone)){
                $phoneErr = "Phone number must contain exactly 11 digits";
            }
        }









    }

    

?>


<form  method ="POST" action="">

    <label for="">Student Name: </label>
    <input type="text" name="name" id="">

        <br>
        <br>

    <label for="">Student Age: </label>
    <input type="text" name="age" id="">
        <br>
        <br>

    <label for="">University Email: </label>
    <input type="text" name="email" id="">
    <br>
    <br>
    <label for="">Membership Type: </label>

    <input type="radio" name="rm" id="">
    <label for="">Regular Member </label>
    <input type="radio" name="em" id="">
    <label for="">Excutive Member </label>
    <input type="radio" name="v" id="">
    <label for="">Volentiar </label>
    
    <br>
    <br>
    <label for="">Department: </label>
    <select name="" id="">

        <option value="">-- Select Department --</option>
        <option value="">CSE</option>
        <option value="">EEE</option>
        <option value="">BBA</option>
        <option value="">English</option>
        <option value="">Architecture</option>
    </select>

    <br>
    <br>
    <label for="">Contact Number: </label>
    <input type="text" name="" id="">
    <br><br>
    <input type="submit" value="Submit">
    
    
</form>
 
</body>
</html>