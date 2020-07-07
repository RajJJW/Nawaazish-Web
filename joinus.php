<?php

require_once './dbconnect.php';

if(isset($_POST)) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $area = mysqli_real_escape_string($conn, $_POST['area']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    $added_on = date('Y-m-d');

    if(!empty($name) && !empty($city) &&!empty($area) &&!empty($pincode) &&!empty($phone) &&!empty($email) &&!empty($instagram)){

        // Prepare statement
        $stmt = $conn->prepare("INSERT INTO `joinus`(`name`, `state`, `area`, `pincode`, `phone`, `email`, `instagram`, `added_on`) VALUES (?,?,?,?,?,?,?,?)");

        // Bind parameters
        $stmt->bind_param("ssssssss", $name, $city, $area, $pincode, $phone, $email, $instagram, $added_on);
        
        // Execute query
        if($stmt->execute()){
            echo 'true';
        } else {
            echo "false";
        }
        
        

        
        $stmt->close();
        $conn->close();

    }


}


?>
