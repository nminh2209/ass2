<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage EOIs</title>
  <link rel="stylesheet" href="./styles/styles.css">
</head>

<body class="bodycuaan">

  <?php include 'header.inc'; ?>
  <div class="wcmanagerloginbutton">
    <h1 class="wcmanager">Welcome Manager</h1>
    <button class="loginbutton"><a href="logout.php">Logout</a></button>
  </div>
  <?php
  function generateSortFieldDropdown()
  {
    $columns = [
      'EoiNumber' => 'EOI Number',
      'JobReferenceNumber' => 'Job Reference Number',
      'FirstName ' => 'First Name',
      'LastName' => 'Last Name',
      'Gender' => 'Gender',
      'StreetAddress' => 'Street Address',
      '`Suburb/Town`' => 'Suburb/Town',
      'State' => 'State',
      'PostCode' => 'Postcode',
      'EmailAddress' => 'Email Address',
      'PhoneNumber' => 'Phone Number',
      'Skills' => 'HTML Skill',
      'OtherSkills' => 'Other Skills Description',
      'Status' => 'Status'

    ];

    $options = '<label for="sortfield">Sort By:</label>';
    $options .= '<select name="sortfield" id="sortfield">';
    foreach ($columns as $key => $value) {
      $selected = ($key == 'EoiNumber') ? 'selected' : '';
      $options .= "<option value=\"$key\" $selected>$value</option>";
    }
    $options .= '</select>';
    echo $options;
  }
  ?>

  <div class="minhmanage">
    <div class="EOISdiv">
      <h1>Human Resources Queries</h1>
      <h4>List all EOIs</h4>
      <form action="processManage.php" method="post">
        <input type="hidden" name="action" value="displayAllEOIs">
        <?php generateSortFieldDropdown(); ?>
        <input type="submit" value="List All EOIs">
      </form>

      <h4>List EOIs by Job Reference Number</h4>
      <form action="processManage.php" method="post">
        <input type="hidden" name="action" value="displayEOIsByReferenceNumber">
        <label for="jobreference">Job Reference Number:</label>
        <input placeholder="Job Reference Number:" type="text" id="jobreference" name="jobreference">
        <?php generateSortFieldDropdown(); ?>
        <input type="submit" value="List EOIs">
      </form>

      <h4>List EOIs by Applicant Name</h4>
      <form action="processManage.php" method="post">
        <input type="hidden" name="action" value="displayEOIsByApplicantName">
        <label for="firstname">First Name:</label>
        <input placeholder="First Name:" type="text" id="firstname" name="firstname">
        <label for="lastname">Last Name:</label>
        <input placeholder="Last Name:" type="text" id="lastname" name="lastname">
        <?php generateSortFieldDropdown(); ?>
        <input type="submit" value="List EOIs">
      </form>

      <h4>Delete EOIs by Job Reference Number</h4>
      <form action="processManage.php" method="post">
        <input type="hidden" name="action" value="deleteEOIsByReferenceNumber">
        <label for="jobreferencedelete">Job Reference Number:</label>
        <input placeholder="Job Reference Number:" type="text" id="job_reference_delete" name="jobreferencedelete">
        <input type="submit" value="Delete EOIs">
      </form>

      <h4>Change EOI Status</h4>
      <form action="processManage.php" method="post">
        <input type="hidden" name="action" value="updateEOIStatus">
        <label for="eoiid">EOI ID:</label>
        <input placeholder="EOI ID:" type="text" id="eoiid" name="eoiid">
        <label for="newstatus">New Status:</label>

        <select name="newstatus" id="newstatus">
          <option value="InReview" selected="selected">In Review</option>
          <option value="Accepted">Accepted</option>
          <option value="Rejected">Rejected</option>
        </select>

        <input type="submit" value="Change Status">
      </form>
    </div>
  </div>

  <?php include_once 'footer.inc'; ?>
</body>

</html>