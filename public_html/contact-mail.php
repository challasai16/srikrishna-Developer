<?php

use PHPMailer\PHPMailer\PHPMailer;
 require_once 'PHPMailer/Exception.php';
 require_once 'PHPMailer/PHPMailer.php';
 require_once 'PHPMailer/SMTP.php';

//Load Composer's autoloader
// require 'vendor/autoload.php';

 $mail = new PHPMailer(true);
// Retrieve form data



if(isset($_POST['submit-from'])) {
    $customerName = urlencode($_POST['name']);
    $countryMobile = $_POST['countrycode'];
    $mobileNumber = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $project = $_POST['projectoption'];
    // $agree = $_POST['checkbax'];
   
   
    // $to = "nagaraju@madworks.in,digital@srikrishnadeveloppers.com"; // Replace with the recipient's email address
    // $subject = "Lead From Srikrishna Developpers Website"; // Replace with the email subject
    // $body = "digital@srikrishnadeveloppers.com"; // Replace with your email content
    // $headers = "Name: $customerName \n coutrycode: $countryMobile \nMobile Number: $mobileNumber \nEmail:  $email \nMessage: $message \nProject: $project"; // Replace with the sender's email address
    
    // // Send the email
    // $mailSent = mail($to, $subject, $body, $headers);
    
    // if ($mailSent) {
    //     echo "Email sent successfully!";
    // } else {
    //     echo "Email sending failed.";
    // }
    
// try {
//             $mail-> isSMTP();
//              $mail->SMTPDebug = 4;
//              // $mail-> Host = "smtp.gmail.com";
//             $mail-> Host = 'localhost';
//             // $mail-> Host = "smtp-mail.outlook.com";
//             $mail-> SMTPAuth = true;
//             // $mail-> Username = "digital@srikrishnadeveloppers.com";
//             $mail-> Username = "leads@srikrishnadeveloppers.com";
//              // $mail-> Password = "vcwd edec btce iupc"; 
//              $mail-> Password = "leads@123";
//             //$mail-> SMTPSecure = "ssl";
            
//             // $mail-> Port ="587";
//             $mail-> Port ="465";
//             // $mail->setFrom("digital@srikrishnadeveloppers.com");
//             $mail->setFrom("leads@srikrishnadeveloppers.com");
//             $mail->addAddress("nagaraju@madworks.in","leads from Srikrishna Developpers website");
//             $mail->addAddress("leads@madworks.in","leads from Srikrishna Developpers website");  
//             $mail->addAddress("manikanta@srikrishnadeveloppers.com","leads from Srikrishna Developpers website");
//             // $mail->addAddress("sales@manjeera.com","leads from manjeera blue  website");
//             $mail-> isHTML(true);
//             $mail->Subject = "Lead From Srikrishna Developpers Website";
//             $mail-> Body = "Name: $customerName <br> Coutry Code: $countryMobile Mobile No: $mobileNumber <br>  Email Id: $email <br> Message: $message <br>  Project : $project ";

//             $mail->send();
//             // $alert = '<span>Thanks you for submitting the form</span>';
//             // header('location: ./thank-you.php');

//         } catch (Exception $e) {
//             $alert = '<span>form not submitted</span>';
//         }

// crm integration starts here 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // API endpoint
    $api_url = "https://portal-api.clove.build/api/tpi/website/lead";
    
    // API key
    $api_key = "obKvqUxJC5DiYMcGrCphNvIaNDHVd2f012vPvij7I8c=";
    
    // Form data
    $data = array(
        "property" => "SKD",
        "name" => $_POST["name"],
        "email" => $_POST["email"],
        "mobileNo" => "+" . $_POST["countrycode"] . $_POST["mobilenumber"],
        "source" => "",
        "subSource" => "", // You can set this based on your needs
        "isOtpVerified" => false, // Set to true or false as needed
        "sitevisitDate" => "",
        "message" => $_POST["message"],
        "type" => "Apartment",
        "configuration" => "1BHK",
        "location" => "",
        "budget" => "5L to 10L",
        "facing" => "East",
        "floor" => "1",
        "visitedProject" => "",
        "fundingSource" => "",
        "minSize" => "1230",
        "maxSize" => "3250"
    );
    
    // Initialize cURL session
    $ch = curl_init($api_url);
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "x-api-key: " . $api_key,
        "Content-Type: application/json"
    ));
    
    // Execute cURL request
    $response = curl_exec($ch);
    
    // Check for errors
    if (curl_errno($ch)) {
        echo "cURL error: " . curl_error($ch);
    }
    
    // Close cURL session
    curl_close($ch);
    
    // Handle the API response as needed
    echo $response;
} else {
    // Handle non-POST requests
    echo "Invalid request method.";
}


// crm integration ends here 



// mysql database connection 

$servername = "localhost";
$username = "srikrishnaDeveloper";
$password = "leads@123";
$database = "srikrishnaDeveloper";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "INSERT INTO `srikrishna_developpers_leads`( `Name`, `Email`, `Countrycode`, `Mobile`, `project`, `Message`, `Date`) VALUES ('$customerName','$email','$countryMobile','$mobileNumber','$project','$message',CURTIME())";

echo $sql;

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



 header('location: ./thank-you');
    
    
}

?>

