<!DOCTYPE html>
<html lang="en">


<body>
    <h1> Human Resources - Queries </h1>
    <?php
require_once("settings.php");
require_once("./sanitise.php");

// Connect to the database
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Check if the connection is successful
if (!$conn) {
    echo "<p>Database connection failure </p>";
} else {
    // Check if an action has been submitted
    if (isset($_POST['action'])) {
        $action = sanitise_input($_POST['action']);

        // Perform actions based on the submitted action
        switch ($action) {
            case 'listAllEOIs':
                listAllEOIs($conn);
                break;
            case 'listEOIsByJobRef':
                listEOIsByJobRef($conn);
                break;
            case 'listEOIsByApplicantName':
                listEOIsByApplicantName($conn);
                break;
            case 'deleteEOIsByJobRef':
                deleteEOIsByJobRef($conn);
                break;
            case 'changeEOIStatus':
                changeEOIStatus($conn);
                break;
            default:
                echo "Invalid action.";
                break;
        }
    }
}

// Close the database connection
mysqli_close($conn);

// Function to list all EOIs
function listAllEOIs($conn) {
    $query = "SELECT * FROM EOI";
    $result = mysqli_query($conn, $query);

    // Check if query execution is successful
    if ($result) {
        displayEOIs($result);
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
}

// Function to list EOIs by Job Reference Number
function listEOIsByJobRef($conn) {
    if (isset($_POST['job_reference'])) {
        $jobReference = sanitise_input($_POST['job_reference']);
        $query = "SELECT * FROM EOI WHERE job_reference_number = '$jobReference'";
        $result = mysqli_query($conn, $query);

        // Check if query execution is successful
        if ($result) {
            displayEOIs($result);
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
    } else {
        echo "Job reference number is required.";
    }
}

// Function to list EOIs by Applicant Name
function listEOIsByApplicantName($conn) {
    if (isset($_POST['first_name']) && isset($_POST['last_name'])) {
        $firstName = sanitise_input($_POST['first_name']);
        $lastName = sanitise_input($_POST['last_name']);
        $query = "SELECT * FROM EOI WHERE first_name = '$firstName' OR last_name = '$lastName'";
        $result = mysqli_query($conn, $query);

        // Check if query execution is successful
        if ($result) {
            displayEOIs($result);
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
    } else {
        echo "Both first name and last name are required.";
    }
}

// Function to delete EOIs by Job Reference Number
function deleteEOIsByJobRef($conn) {
    if (isset($_POST['job_reference'])) {
        $jobReference = sanitise_input($_POST['job_reference']);
        $deleteQuery = "DELETE FROM EOI WHERE job_reference_number = '$jobReference'";
        $deleteResult = mysqli_query($conn, $deleteQuery);
        if ($deleteResult) {
            echo "EOIs with job reference number $jobReference deleted successfully.";
        } else {
            echo "Error deleting EOIs with job reference number $jobReference.";
        }
    } else {
        echo "Job reference number is required.";
    }
}

// Function to change EOI Status
function changeEOIStatus($conn) {
    if (isset($_POST['eoi_id']) && isset($_POST['new_status'])) {
        $eoiID = sanitise_input($_POST['eoi_id']);
        $newStatus = sanitise_input($_POST['new_status']);
        $updateQuery = "UPDATE EOI SET status = '$newStatus' WHERE eoi_number = $eoiID";
        $updateResult = mysqli_query($conn, $updateQuery);
        if ($updateResult) {
            echo "EOI status updated successfully.";
        } else {
            echo "Error updating EOI status.";
        }
    } else {
        echo "EOI ID and new status are required.";
    }
}

// Function to display EOIs
function displayEOIs($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>EOI Number</th><th>Job Reference Number</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Street Address</th><th>Suburb/Town</th><th>State</th><th>Postcode</th><th>Email Address</th><th>Phone Number</th><th>HTML Skill</th><th>CSS Skill</th><th>JavaScript Skill</th><th>PHP Skill</th><th>MySQL Skill</th><th>Other Skill</th><th>Other Skill Description</th><th>Status</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['eoi_number']}</td>";
            echo "<td>{$row['job_reference_number']}</td>";
            echo "<td>{$row['first_name']}</td>";
            echo "<td>{$row['last_name']}</td>";
            // echo "<td>{$row['date_of_birth']}</td>";
            echo "<td>{$row['gender']}</td>";
            echo "<td>{$row['street_address']}</td>";
            echo "<td>{$row['suburb_town']}</td>";
            echo "<td>{$row['state']}</td>";
            echo "<td>{$row['postcode']}</td>";
            echo "<td>{$row['email_address']}</td>";
            echo "<td>{$row['phone_number']}</td>";
            echo "<td>{$row['skill_html']}</td>";
            echo "<td>{$row['skill_css']}</td>";
            echo "<td>{$row['skill_javascript']}</td>";
            echo "<td>{$row['skill_php']}</td>";
            echo "<td>{$row['skill_mysql']}</td>";
            echo "<td>{$row['skill_other']}</td>";
            echo "<td>{$row['other_skill']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No EOIs found.";
    }
}
?>




</body>


</html>