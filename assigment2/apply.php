<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Homepage for I.T job recruitment website" />
  <meta name="keywords" content="job, I.T, recruitment, recruit" />
  <meta name="author" content="Le Gia Hoang An" />
  <link rel="stylesheet" href="styles/styles.css" />

  <title>Applying for position</title>
</head>

<body class="bodycuaan">
  <?php include 'header.inc'; ?>

  <div class="container">
    <div class="center yellow form-box">
      <div class="box">
        <h1>AMT Technologies Application Form</h1>
        <form class="pad10" action="processEOI.php" method="post">
          <fieldset class="pad30">
            <label for="job_reference_number">Job Reference Number</label>
            <p>Please fill in your Job Reference Number :</p>
            <input type="text" name="job_reference_number" id="job_reference_number" required="required" pattern="[0-9]{5}" />
          </fieldset>
          <fieldset class="pad30">
            <legend>Applicant's Details</legend>
            <label for="fname">First Name</label>
            <input name="fname" id="fname" type="text" pattern="[A-Za-z]{0,20}" required />

            <label for="lname">Last Name</label>
            <input name="lname" id="lname" type="text" pattern="[A-Za-z]{0,20}" required />
            <br /><br />

            <label for="dob">Date of Birth</label>
            <input name="dob" id="dob" type="text" pattern="^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$" placeholder="dd/mm/yyyy" required /><br /><br />

            <fieldset class="pad30">
              <legend>Gender:</legend>
              <input name="gender" id="gender" value="male" type="radio" required />
              <label for="gender1">Male</label>
              <input name="gender" id="gender" value="female" type="radio" />
              <label for="gender2">Female</label>
            </fieldset>

            <fieldset class="pad30">
              <legend>Residency:</legend>
              <label for="address">Street Address</label>
              <input id="address" name="address" type="text" pattern="[A-Za-z]{0,40}" required />

              <label for="suburb">Suburb/Town</label>
              <input id="suburb" name="suburb" type="text" pattern="[A-Za-z]{0,40}" required /><br /><br />

              <label for="state">State</label>
              <select id="state" name="state" required>
                <option value="">Please Select</option>
                <option value="VIC">Victoria</option>
                <option value="NSW">New South Wales</option>
                <option value="QLD">Queensland</option>
                <option value="NT">Northern Territory</option>
                <option value="WA">Western Australia</option>
                <option value="SA">South Australia</option>
                <option value="TAS">Tasmania</option>
                <option value="ACT">Australian Capital Territory</option>
              </select>

              <label for="postcode">Postcode</label>
              <input id="postcode" name="postcode" required pattern="[0-9]{4}" />
            </fieldset>

            <fieldset class="pad30">
              <legend>Contacts:</legend>
              <label for="email">Email</label>
              <input id="email" name="email" type="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required />
              <label for="phone">Phone Number</label>
              <input type="text" name="phone" id="phone" required pattern="[0-9]{8,12}" />
            </fieldset>

            <fieldset class="pad30">
              <legend>Skills:</legend>
              <input id="html" type="checkbox" name="skills[]" value="html" required />
              <label for="html">HTML</label>
              <input id="css" type="checkbox" name="skills[]" value="css" />
              <label for="css">CSS</label>
              <input id="js" type="checkbox" name="skills[]" value="js" />
              <label for="js">JavaScript</label>
              <input id="php" type="checkbox" name="skills[]" value="php" />
              <label for="php">PHP</label>
              <input id="mysql" type="checkbox" name="skills[]" value="mysql" />
              <label for="mysql">MySQL</label>
              <input id="java" type="checkbox" name="skills[]" value="java" />
              <label for="java">Java</label>
              <input id="python" type="checkbox" name="skills[]" value="python" />
              <label for="python">Python</label>
              <input id="cpp" type="checkbox" name="skills[]" value="cpp" />
              <label for="cpp">C++</label>
              <input class="pad10" id="otherskills" type="checkbox" name="skills[]" value="other" />
              <label for="otherdesc">Other skills...</label> <br /><br />
              <textarea class="width100" id="otherdesc" name="otherdesc" rows="5" cols="82" required placeholder="Please enter other skills that are not on the list above"></textarea>
            </fieldset>

            <fieldset class="pad30">
              <legend>Apply For:</legend>
              <label for="job">Selected Field:</label>
              <select id="job" name="job" required>
                <option value="">Please Select</option>
                <option value="ABC123">Database Engineer</option>
                <option value="LMN456">Fullstack Developer</option>
                <option value="XYZ789">HR Director</option>
              </select>
            </fieldset>
          </fieldset>

          <div class="button-container">
            <button class="pad10" type="submit">Submit Application</button>
            <button class="pad10" type="reset">Reset Form</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- <?php include 'footer.inc'; ?> -->
</body>

</html>