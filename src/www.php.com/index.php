<?php
$servername = "localhost";
$username = "MySQL_USERNAME";
$password = "MySQL_PASSWORD"; 
$dbname = "MYSQL_DBNAME"; 


$conn = new mysqli($servername, $username, $password, $dbname); 


if ($conn->connect_error) {  
    die("Connection failed: " . $conn->connect_error);  // "." is used to concatenate strings
}

//$_SERVER is a superglobal array that cotnians data about server
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    
    $firstname = $conn->real_escape_string($_POST['firstname']); 
    $lastname = $conn->real_escape_string($_POST['lastname']); 
    $email = $conn->real_escape_string($_POST['Email']);
    $age = $conn->real_escape_string($_POST['Age']); 
    $experience = $conn->real_escape_string($_POST['Experience']);
    $university = $conn->real_escape_string($_POST['edu']);
    $location = $conn->real_escape_string($_POST['radio']); 
    $interestFrontEnd = isset($_POST['fe']) ? 1 : 0; //isset() is a PHP function that checks if a variable is set and not null. so function will return if checkbox is selected
    $interestBackEnd = isset($_POST['be']) ? 1 : 0;
    $interestRobotics = isset($_POST['rob']) ? 1 : 0;


        
        $sql = "INSERT INTO records (FirstName, LastName, Email, Age, Experience, Education, locationarea, InterestFrontEnd, InterestBackEnd, InterestRobotics)
                VALUES ('$firstname', '$lastname', '$email', '$age', '$experience', '$university', '$location', $interestFrontEnd, $interestBackEnd, $interestRobotics)";

        
        if ($conn->query($sql) === TRUE) { // is exactly equal to TRUE and that it’s also of the boolean type TRUE.
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}

// Close the connection
$conn->close();
?>
