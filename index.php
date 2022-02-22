<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $Desc = $_POST['Desc'];
    $sql = "INSERT INTO `feedata`.`feeportal` (`name`,`age`,`gender`,`email`,`phone`,`other`) VALUES ('$name','$age','$gender','$email','$phone','$Desc');"; 
    
    
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Fees Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.png" alt="Govt college Hamirpur">
    <div class="container">
        <h1>Welcome to Govt College Hamirpur</h3>
        <p>Enter your Fees Details to confirm the Admission</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your Fees Details </p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="age" id="age"placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            

            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone">
            <textarea name="Desc" id="Desc" cols="30" rows="10" placeholder="Enter your Fee Details"></textarea>
            <button class="btn">Submit</button>
            

        </form>
         

    </div>
    <script src="index.js"></script>
    
</body>
</html>