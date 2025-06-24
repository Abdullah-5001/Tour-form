<?php
$insert=FALSE;
if(isset($_POST['name'])){
$server = "localhost";  // use a regular variable name
$username = "root";
$password = "";
$data_base="trip";
// Connect
$connect = mysqli_connect($server, $username, $password,$data_base);  // make sure DB name is correct
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
// else{
//     echo "Connected to the Data base";
// }

// Only run if form is submitted

    $Name = $_POST['name'] ?? '';
    $Age = $_POST['age'] ?? '';
    $Gender = $_POST['gender'] ?? '';
    $Department = $_POST['department'] ?? '';
    $Fall = $_POST['fall'] ?? '';
    $Section = $_POST['section'] ?? '';
    $Roll_no = $_POST['roll_no'] ?? '';
    $Email = $_POST['email'] ?? '';
    $Phone = $_POST['phone'] ?? '';
    $desc = $_POST['desc'] ?? '';

    $sql = "INSERT INTO `trip_enrollments` 
        (`Name`, `Age`, `Gender`, `Department`, `Fall_year`, `Section`, `Roll number`, `Email`, `Phone Number`, `Other`, `Date`)
        VALUES 
        ('$Name','$Age','$Gender','$Department','$Fall','$Section','$Roll_no','$Email','$Phone','$desc',current_timestamp())";
        
if($connect->query($sql) == TRUE)
{
    $insert = TRUE;
}
else{
   echo "Error: $sql <br> $connect->error";
}
$connect->close();
 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Trip form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class = bg src="123.webp" alt="PTUT Lahore" >
    <div class="container">
       <h1> Welcome to the PTUT Educational Trip form</h1> 
       <p>Enter your details and submit this form to confirm your participation in the Trip</p>
      <?php
      if($insert == TRUE){
      echo '<p class ="Submitmsg">Thanks for submitting your form</p>';
    }
       ?>
    <form action="index.php" method="post">
    <input type="text" name="name" id="Name" placeholder="Enter your name">
    <input type="text" name="age" id="Age" placeholder="Enter your age">
    <input type="text" name="gender" id="Gender" placeholder="Enter your gender">
    <input type="text" name="department" id="Department" placeholder="Enter your department">
    <input type="text" name="fall" id="Fall" placeholder="Enter your Fall_year">
    <input type="text" name="section" id="Section" placeholder="Enter your Section">
    <input type="text" name="roll_no" id="Roll_no" placeholder="Enter your Roll Number">
    <input type="email" name="email" id="Email" placeholder="Enter your Email">
    <input type="tel" name="phone" id="Phone" placeholder="Enter your Phone Number">
    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Any other information here"></textarea>
    <button class="btn">Submit</button>
</form>

</div>
<script src="index.js"></script>
</body>
</html>