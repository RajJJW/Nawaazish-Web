<?php

require_once './dbconnect.php';

if(isset($_POST)) {

    $name = mysqli_real_escape_string($conn, $_POST['contact_name']);
    $subject = mysqli_real_escape_string($conn, $_POST['contact_subject']);
    $email = mysqli_real_escape_string($conn, $_POST['contact_email']);
    $message = mysqli_real_escape_string($conn, $_POST['contact_message']);
    $added_on = date('Y-m-d');

    if(!empty($name) && !empty($subject) &&!empty($email) &&!empty($message)){

        // Prepare statement
        $stmt = $conn->prepare("INSERT INTO `contactus`(`name`, `subject`, `email`, `message`, `added_on`) VALUES (?,?,?,?,?)");

        // Bind parameters
        $stmt->bind_param("sssss", $name, $subject, $email, $message, $added_on);
        
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
