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

        if (empty($_POST["age"])){
            $ageErr = "Age is required";
        }else{

            $age = $_POST["age"];

            if(!is_numeric($age) || $age<18 || $age>30){
                $ageErr = "Age must be between 18 and 30.";
            }
        }


        if(empty($_POST["email"])){
            $emailErr = "Email is required";
        }else{

            $email = $_POST["email"];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

                $emailErr = "Invalid Email Format";
            }
        }
        
        if(empty($_POST["membership"])){
            $membershipErr = "Please select a membership type";
        }else{

            $membership = $_POST["membership"];
           
        }
        
        if(empty($_POST["department"])){
            $departmentErr = "Please select a Deprtment";
        }else{

            $department = $_POST["department"];
           
        }
        
        
        if(empty($_POST["phone"])){
            $phoneErr = "phone number  is required";

        }else {
            $phone = $_POST["phone"];
            if(!preg_match("/^[0-9]{11}$/", $phone)){
                $phoneErr = "Phone number must contain exactly 11 digits";
            }
        }

    }

    

?>


<form  method ="POST" action="">

    <label for="">Student Name: </label>
    <input type="text" name="name" id="" value="<?php echo $name; ?>">
    <span style="color:red">
        * <?php echo $nameErr; ?>
    </span>
        <br>
        <br>

    <label for="">Student Age: </label>
    <input type="number" name="age" id="" value="<?php echo $age; ?>">
    <span style="color:red">
        * <?php echo $ageErr; ?>
    </span>
        <br>
        <br>

    <label for="">University Email: </label>
    <input type="email" name="email" id="" value="<?php echo $email; ?>">
    <span style="color:red">
        * <?php echo $emailErr; ?>
    </span>
    <br>
    <br>
    <label for="">Membership Type: </label>

    <input type="radio" name="membership" id="" value="Regular Member" <?php if(isset($membership) && $membership == "Regular Member") echo "checked"; ?>>
    <label for="">Regular Member </label>
    <input type="radio" name="membership" id="" value="Excutive Member" <?php if(isset($membership) && $membership == "Excutive Member") echo "checked"; ?>>
    <label for="">Excutive Member </label>
    <input type="radio" name="membership" id="" value="Volentiar" <?php if(isset($membership) && $membership == "Volentiar") echo "checked"; ?>>
    <label for="">Volentiar </label>
    <span style="color:red">
        * <?php echo $membershipErr; ?>
    </span>

    <br>
    <br>
    <label for="">Department: </label>
    <select name="department" id="">

        <option value="">-- Select Department --</option>
        <option value="CSE" <?php if(isset($department) && $department == "CSE") echo "selected"; ?>>CSE</option>
        <option value="EEE" <?php if(isset($department) && $department == "EEE") echo "selected"; ?>>EEE</option>
        <option value="BBA" <?php if(isset($department) && $department == "BBA") echo "selected"; ?>>BBA</option>
        <option value="English" <?php if(isset($department) && $department == "English") echo "selected"; ?>>English</option>
        <option value="Architecture" <?php if(isset($department) && $department == "Architecture") echo "selected"; ?>>Architecture</option>
    </select>
    <span style="color:red">
        * <?php echo $departmentErr; ?> 
    </span>

    <br>
    <br>
    <label for="">Contact Number: </label>
    <input type="text" name="phone" id="" value="<?php echo $phone; ?>">
    <span style="color:red">
        * <?php echo $phoneErr; ?>
    </span>

    <br><br>
    <input type="submit" value="Submit" naame="submit">
    
    
</form>


<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($nameErr) && 
            empty($ageErr) && 
            empty($emailErr) && 
            empty($membershipErr) && 
            empty($departmentErr) && 
            empty($phoneErr))
            
        {
            echo "<h3>Form submitted successfully!</h3>";
            echo "<p>Name: $name</p>";
            echo "<p>Age: $age</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Membership Type: $membership</p>";
            echo "<p>Department: $department</p>";
            echo "<p>Contact Number: $phone</p>";
        }
    }

    ?>
 
</body>
</html>