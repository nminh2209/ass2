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
                case 'displayAllEOIs':
                    displayAllEOIs($conn);
                    break;
                case 'displayEOIsByReferenceNumber':
                    displayEOIsByReferenceNumber($conn);
                    break;
                case 'displayEOIsByApplicantName':
                    displayEOIsByApplicantName($conn);
                    break;
                case 'deleteEOIsByReferenceNumber':
                    deleteEOIsByReferenceNumber($conn);
                    break;
                case 'updateEOIStatus':
                    updateEOIStatus($conn);
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
    function displayAllEOIs($conn)
    {
        $query = "SELECT * FROM eoi";
        $result = mysqli_query($conn, $query);

        // Check if query execution is successful
        if ($result) {
            displayEOIs($result);
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
    }

    // Function to list EOIs by Job Reference Number
    function displayEOIsByReferenceNumber($conn)
    {
        if (isset($_POST['jobreference'])) {
            $jobReference = sanitise_input($_POST['jobreference']);
            $query = "SELECT * FROM eoi WHERE JobReferenceNumber = '$jobReference'";
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
    function displayEOIsByApplicantName($conn)
    {
        if (isset($_POST['firstname']) && isset($_POST['lastname'])) {
            $firstName = sanitise_input($_POST['firstname']);
            $lastName = sanitise_input($_POST['lastname']);
            $query = "SELECT * FROM eoi WHERE FirstName = '$firstName' OR LastName = '$lastName'";
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
    function deleteEOIsByReferenceNumber($conn)
    {
        if (isset($_POST['jobreferencedelete'])) {
            $jobReference = sanitise_input($_POST['jobreferencedelete']);
            $deleteQuery = "DELETE FROM eoi WHERE JobReferenceNumber = '$jobReference'";
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
    function updateEOIStatus($conn)
    {
        if (isset($_POST['eoiid']) && isset($_POST['newstatus'])) {
            $eoiID = sanitise_input($_POST['eoiid']);
            $newStatus = sanitise_input($_POST['newstatus']);
            $updateQuery = "UPDATE eoi SET status = '$newStatus' WHERE EOINumber = $eoiID";
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
    function displayEOIs($result)
    {
        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1'>";
            echo "<tr>
                        <th>EOI Number</th>
                        <th>Job Reference Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date Of Birth</th>
                        <th>Gender</th>
                        <th>Street Address</th>
                        <th>Suburb/Town</th>
                        <th>State</th>
                        <th>Postcode</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Skills</th>
                        <th>Other Skill Description</th>
                        <th>Status</th>
                    </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['EOINumber']}</td>";
                echo "<td>{$row['JobReferenceNumber']}</td>";
                echo "<td>{$row['FirstName']}</td>";
                echo "<td>{$row['LastName']}</td>";
                echo "<td>{$row['DateOfBirth']}</td>";
                echo "<td>{$row['Gender']}</td>";
                echo "<td>{$row['StreetAddress']}</td>";
                echo "<td>{$row['Suburb/Town']}</td>";
                echo "<td>{$row['State']}</td>";
                echo "<td>{$row['PostCode']}</td>";
                echo "<td>{$row['EmailAddress']}</td>";
                echo "<td>{$row['PhoneNumber']}</td>";
                echo "<td>{$row['Skills']}</td>";
                echo "<td>{$row['OtherSkills']}</td>";
                echo "<td>{$row['Status']}</td>";
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