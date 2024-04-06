<?php

include "settings.php";
include "sanitise.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $jobReferenceNumber = sanitise_input($_POST["job_reference_number"]);
    $firstName = sanitise_input($_POST["fname"]);
    $lastName = sanitise_input($_POST["lname"]);
    $streetAddress = sanitise_input($_POST["address"]);
    $suburbTown = sanitise_input($_POST["suburb"]);
    $state = sanitise_input($_POST["state"]);
    $postcode = sanitise_input($_POST["postcode"]);
    $emailAddress = sanitise_input($_POST["email"]);
    $phoneNumber = sanitise_input($_POST["phone"]);
    $skills = isset($_POST["skills"]) ? $_POST["skills"] : array();
    $otherSkills = sanitise_input($_POST["otherdesc"]);

    // Concatenate skills array into a string
    $skillsString = sanitise_input(implode(", ", $skills));

    // Server-side validation
    $errors = array();

    // Check if required fields are empty
    if (empty($jobReferenceNumber) || empty($firstName) || empty($lastName) || empty($streetAddress) || empty($suburbTown) || empty($state) || empty($postcode) || empty($emailAddress) || empty($phoneNumber) || empty($skills)) {
        $errors[] = "All required fields must be filled out.";
    }

    // Validate email format
    if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address format.";
    }

    // Validate phone number format
    if (!preg_match("/^[0-9]{8,12}$/", $phoneNumber)) {
        $errors[] = "Invalid phone number format.";
    }

    // If there are no errors, proceed with database insertion
    if (empty($errors)) {
        try {
            $conn = new mysqli($host, $user, $pwd, $sql_db);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO eoi (JobReferenceNumber, FirstName, LastName, StreetAddress, `Suburb/Town`, 
            State, Postcode, EmailAddress, PhoneNumber, Skills, OtherSkills) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssss", $jobReferenceNumber, $firstName, $lastName, $streetAddress, $suburbTown, $state, $postcode, $emailAddress, $phoneNumber, $skillsString, $otherSkills);

            // Execute the statement
            $stmt->execute();

            echo "A new record has been inserted successfully.";
            header("Location: index.php");

            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        // Output errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
} else {
    // Redirect to an error page if the form is not submitted
    echo "Nope. Go back";
    header("Location: error_page.php");
    exit;
}
