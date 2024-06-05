<?php

// Retrieve the parameters from the USSD request
$sessionId = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text = $_POST["text"];

// Initialize response
$response = "";

// Split the text input
$textArray = explode("*", $text);

// Switch to handle different steps
switch (count($textArray)) {
    case 1:
        $response = "CON Welcome to the Voting App\n";
        $response .= "1. Vote for Candidate A\n";
        $response .= "2. Vote for Candidate B\n";
        break;
    case 2:
        if ($textArray[1] == "1") {
            $response = "END You voted for Candidate A. Thank you!";
        } else if ($textArray[1] == "2") {
            $response = "END You voted for Candidate B. Thank you!";
        } else {
            $response = "END Invalid choice.";
        }
        break;
    default:
        $response = "END Invalid input.";
        break;
}

// Print the response
header('Content-type: text/plain');
echo $response;

?>
