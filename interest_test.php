<!-- Programmer Name: Tan Zu Seng
Program Name: interest_test.php
Description: Interest Test
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="interest_test.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Interest Test</title>
    <link rel="shortcut icon" href="images/EduAdvisor.png">
</head>
<body>
  <h1>Field of Study Interest Test</h1>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected options
    $activities = $_POST['activities'] ?? [];
    $subjects = $_POST['subjects'] ?? [];
    $problems = $_POST['problems'] ?? [];
    $preferences = $_POST['preferences'] ?? [];
    $environment = $_POST['environment'] ?? [];
    $skills = $_POST['skills'] ?? [];
    $impact = $_POST['impact'] ?? [];

    if (empty($activities) || empty($subjects) || empty($problems) ||
    empty($preferences) || empty($environment) || empty($skills) || empty($impact)) {
  echo "<script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
    echo "<script>";
    echo "Swal.fire({";
    echo "  icon: 'error',";
    echo "  title: 'Oops...',";
    echo "  text: 'Please choose at least one option for each question (Max 2).',";
    echo "}).then(() => {";
    echo "  history.back();";
    echo "})";  
    echo "</script>";

} else {

    // Define the fields of study and their weights
    $fieldsOfStudy = array(
      'Accounting & Finance' => 0,
      'Architecture' => 0,
      'Business' => 0,
      'Communication and Media Studies' => 0,
      'Art' => 0,
      'Engineering' => 0,
      'Information Technology' => 0,
      'Law' => 0,
      'Medical Health' => 0
    );

    // Calculate weights based on the selected options
    foreach ($activities as $activity) {
      switch ($activity) {
        case 'math':
          $fieldsOfStudy['Accounting & Finance'] += 2;
          $fieldsOfStudy['Business'] += 1;
          break;
        case 'art':
          $fieldsOfStudy['Architecture'] += 2;
          $fieldsOfStudy['Art'] += 1;
          break;
        case 'engineering':
          $fieldsOfStudy['Engineering'] += 2;
          break;
        case 'programming':
          $fieldsOfStudy['Communication and Media Studies'] += 2;
          $fieldsOfStudy['Information Technology'] += 1;
          break;
      }
    }

    foreach ($subjects as $subject) {
      switch ($subject) {
        case 'science':
          $fieldsOfStudy['Accounting & Finance'] += 1;
          $fieldsOfStudy['Engineering'] += 1;
          break;
        case 'history':
          $fieldsOfStudy['Architecture'] += 1;
          $fieldsOfStudy['Law'] += 1;
          break;
        case 'literature':
          $fieldsOfStudy['Business'] += 1;
          $fieldsOfStudy['Art'] += 1;
          break;
        case 'computer':
          $fieldsOfStudy['Communication and Media Studies'] += 1;
          $fieldsOfStudy['Information Technology'] += 2;
          break;
        case 'medical_health':
          $fieldsOfStudy['Medical Health'] += 1;
          break;
      }
    }

    foreach ($problems as $problem) {
      switch ($problem) {
        case 'logic':
          $fieldsOfStudy['Accounting & Finance'] += 1;
          break;
        case 'puzzles':
          $fieldsOfStudy['Architecture'] += 1;
          $fieldsOfStudy['Art'] += 1;
          break;
        case 'technical':
          $fieldsOfStudy['Business'] += 1;
          $fieldsOfStudy['Information Technology'] += 2;
          break;
        case 'analytical':
          $fieldsOfStudy['Communication and Media Studies'] += 1;
          $fieldsOfStudy['Law'] += 1;
          break;
      }
    }

    foreach ($preferences as $preference) {
      switch ($preference) {
        case 'group':
          $fieldsOfStudy['Accounting & Finance'] += 1;
          $fieldsOfStudy['Business'] += 2;
          $fieldsOfStudy['Communication and Media Studies'] += 1;
          $fieldsOfStudy['Law'] += 1;
          break;
        case 'individual':
          $fieldsOfStudy['Architecture'] += 1;
          $fieldsOfStudy['Art'] += 1;
          $fieldsOfStudy['Engineering'] += 1;
          $fieldsOfStudy['Information Technology'] += 1;
          break;
        case 'both':
          $fieldsOfStudy['Accounting & Finance'] += 1;
          $fieldsOfStudy['Business'] += 1;
          $fieldsOfStudy['Communication and Media Studies'] += 1;
          $fieldsOfStudy['Law'] += 1;
          break;
      }
    }

    // Calculate weights based on the selected options
foreach ($environment as $env) {
  switch ($env) {
    case 'office':
      $fieldsOfStudy['Business'] += 1;
      $fieldsOfStudy['Accounting & Finance'] += 1;
      break;
    case 'outdoor':
      $fieldsOfStudy['Architecture'] += 1;
      break;
    case 'laboratory':
      $fieldsOfStudy['Engineering'] += 1;
      $fieldsOfStudy['Medical Health'] += 1;
      break;
    case 'clinical':
      $fieldsOfStudy['Medical Health'] += 2;
      break;
  }
}

foreach ($skills as $skill) {
  switch ($skill) {
    case 'analytical':
      $fieldsOfStudy['Accounting & Finance'] += 1;
      $fieldsOfStudy['Engineering'] += 1;
      break;
    case 'creative':
      $fieldsOfStudy['Art'] += 1;
      $fieldsOfStudy['Architecture'] += 1;
      break;
    case 'problem_solving':
      $fieldsOfStudy['Engineering'] += 1;
      $fieldsOfStudy['Information Technology'] += 1;
      break;
    case 'leadership':
      $fieldsOfStudy['Business'] += 1;
      break;
  }
}

foreach ($impact as $impactType) {
  switch ($impactType) {
    case 'financial':
      $fieldsOfStudy['Accounting & Finance'] += 1;
      $fieldsOfStudy['Business'] += 1;
      break;
    case 'social':
      $fieldsOfStudy['Communication and Media Studies'] += 1;
      $fieldsOfStudy['Medical Health'] += 1;
      break;
    case 'environmental':
      $fieldsOfStudy['Architecture'] += 1;
      break;
    case 'innovation':
      $fieldsOfStudy['Engineering'] += 1;
      $fieldsOfStudy['Information Technology'] += 1;
      break;
  }
}


    // Find the field of study with the highest weight
    $mostInterestedField = '';
    $highestWeight = 0;
    foreach ($fieldsOfStudy as $field => $weight) {
      if ($weight > $highestWeight) {
        $mostInterestedField = $field;
        $highestWeight = $weight;
      }
    }

    // Display the result
    echo "<script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
    echo "<script>";
    echo "Swal.fire({";
    echo "  title: 'Your most probable field of study:',";
    echo "  text: '$mostInterestedField',";
    echo "  icon: 'success',";
    echo "  showCancelButton: true,";
    echo "  confirmButtonText: 'Take the test again',";
    echo "  cancelButtonText: 'Back'";
    echo "}).then((result) => {";
    echo "  if (result.isConfirmed) {";
    echo "    location.href = 'interest_test.php';";
    echo "  } else {";
    echo "    location.href = 'interest_test_Main.php';";
    echo "  }";
    echo "});";
    echo "</script>";
  } }else {
    // Display the interest test form
    ?>

<script>
  //Limit checkboxes options to 2
function limitCheckboxSelection(groupName) {
  var checkboxes = document.getElementsByName(groupName);
  var selectedCount = 0;

  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      selectedCount++;
    }

    if (selectedCount > 2) {
      checkboxes[i].checked = false;
    }
  }
}
</script>



<div class="wrapper-container" style="width:70%;margin:180px;margin-top:60px;">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <div class="title" style="width:80%;margin-left:125px;">
  <h2 style="text-align:center;margin:20px;padding:10px">Which field(s) of study are you interested in?</h2>
  <p>Please answer all the question below probably based on your thought and interest.</p> 
  <p>By providing these guidelines, it can help you approach the questions in a thoughtful and honest manner, 
    maximizing the accuracy of your results and ensuring a more meaningful outcome.</p><br>
  <ul style="margin-left:15px;line-height:30px;">
    <li>Be True to Yourself</li>
    <li>Reflect on Personal Experiences</li>
    <li>Consider Long-Term Engagement</li>
    <li>Avoid Overthinking</li>
    <li>Keep an Open Mind</li>
  </ul>
  </div>

  
  <div class="question">
  <h3>Question 1: What type of activities do you enjoy? *</h3>
  <input type="checkbox" name="activities[]" value="math" onclick="limitCheckboxSelection('activities[]')">
  <label for="activities[]">Math</label><br>
  <input type="checkbox" name="activities[]" value="art" onclick="limitCheckboxSelection('activities[]')">
  <label for="activities[]">Art</label><br>
  <input type="checkbox" name="activities[]" value="sports" onclick="limitCheckboxSelection('activities[]')">
  <label for="activities[]">Sports</label><br>
  <input type="checkbox" name="activities[]" value="programming" onclick="limitCheckboxSelection('activities[]')">
  <label for="activities[]">Programming</label><br>
  
  <h3>Question 2: Which subjects do you find most interesting? *</h3>
  <input type="checkbox" name="subjects[]" value="science" onclick="limitCheckboxSelection('subjects[]')">
  <label for="subjects[]">Science</label><br>
  <input type="checkbox" name="subjects[]" value="history" onclick="limitCheckboxSelection('subjects[]')">
  <label for="subjects[]">History</label><br>
  <input type="checkbox" name="subjects[]" value="literature" onclick="limitCheckboxSelection('subjects[]')">
  <label for="subjects[]">Literature</label><br>
  <input type="checkbox" name="subjects[]" value="computer" onclick="limitCheckboxSelection('subjects[]')">
  <label for="subjects[]">Computer Science</label><br>
  
  <h3>Question 3: What kind of problems do you enjoy solving? *</h3>
  <input type="checkbox" name="problems[]" value="logic" onclick="limitCheckboxSelection('problems[]')">
  <label for="problems[]">Logic</label><br>
  <input type="checkbox" name="problems[]" value="puzzles" onclick="limitCheckboxSelection('problems[]')">
  <label for="problems[]">Puzzles</label><br>
  <input type="checkbox" name="problems[]" value="technical" onclick="limitCheckboxSelection('problems[]')">
  <label for="problems[]">Technical</label><br>
  <input type="checkbox" name="problems[]" value="analytical" onclick="limitCheckboxSelection('problems[]')">
  <label for="problems[]">Analytical</label><br>
  
  <h3>Question 4: Which activities do you prefer? *</h3>
  <input type="checkbox" name="preferences[]" value="group" onclick="limitCheckboxSelection('preferences[]')">
  <label for="preferences[]">Group activities</label><br>
  <input type="checkbox" name="preferences[]" value="individual" onclick="limitCheckboxSelection('preferences[]')">
  <label for="preferences[]">Individual activities</label><br>
  <input type="checkbox" name="preferences[]" value="both" onclick="limitCheckboxSelection('preferences[]')">
  <label for="preferences[]">Both</label><br>

  <!-- Question 5: What type of work environment do you prefer? -->
<h3>Question 5: What type of work environment do you prefer? *</h3>
<input type="checkbox" name="environment[]" value="office" onclick="limitCheckboxSelection('environment[]')">
<label for="environment[]">Office</label><br>
<input type="checkbox" name="environment[]" value="outdoor" onclick="limitCheckboxSelection('environment[]')">
<label for="environment[]">Outdoor</label><br>
<input type="checkbox" name="environment[]" value="laboratory" onclick="limitCheckboxSelection('environment[]')">
<label for="environment[]">Laboratory</label><br>
<input type="checkbox" name="environment[]" value="clinical" onclick="limitCheckboxSelection('environment[]')">
<label for="environment[]">Clinical settings</label><br>

<!-- Question 6: What type of skills do you enjoy developing? -->
<h3>Question 6: What type of skills do you enjoy developing? *</h3>
<input type="checkbox" name="skills[]" value="analytical" onclick="limitCheckboxSelection('skills[]')">
<label for="skills[]">Analytical skills</label><br>
<input type="checkbox" name="skills[]" value="creative" onclick="limitCheckboxSelection('skills[]')">
<label for="skills[]">Creative skills</label><br>
<input type="checkbox" name="skills[]" value="problem_solving" onclick="limitCheckboxSelection('skills[]')">
<label for="skills[]">Problem-solving skills</label><br>
<input type="checkbox" name="skills[]" value="leadership" onclick="limitCheckboxSelection('skills[]')">
<label for="skills[]">Leadership skills</label><br>

<!-- Question 7: What type of impact do you want to make in your career? -->
<h3>Question 7: What type of impact do you want to make in your career? *</h3>
<input type="checkbox" name="impact[]" value="financial" onclick="limitCheckboxSelection('impact[]')">
<label for="impact[]">Financial impact</label><br>
<input type="checkbox" name="impact[]" value="social" onclick="limitCheckboxSelection('impact[]')">
<label for="impact[]">Social impact</label><br>
<input type="checkbox" name="impact[]" value="environmental" onclick="limitCheckboxSelection('impact[]')">
<label for="impact[]">Environmental impact</label><br>
<input type="checkbox" name="impact[]" value="innovation" onclick="limitCheckboxSelection('impact[]')">
<label for="impact[]">Innovation and technological advancement</label><br>
</div>

<div class="progress-bar-container">
      <div class="progress-bar" id="progress-bar"></div>
      <div class="progress-label" id="progress-label">Progress: 0%</div>
    </div>
    
<div class="submit-btn">
  <input type="submit" value="Submit">
</div>

</form>
</div>


<script>
      // Function to calculate the progress and display it
      function updateProgressBar() {
        const questions = 7; // Total number of questions

        const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        const answeredQuestions = checkboxes.length;
        const progress = (answeredQuestions / questions) * 100;

        const progressBar = document.getElementById('progress-bar');
        progressBar.style.width = `${progress}%`;

        const progressLabel = document.getElementById('progress-label');
        progressLabel.innerText = `Progress: ${Math.round(progress)}%`;
      }

      // Attach the event listeners to the checkboxes to update the progress and display it
      const checkboxes = document.querySelectorAll('input[type="checkbox"]');
      checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', updateProgressBar);
      });
    </script>

    <?php
  }
  ?>

</body>
<?php
  include "footer.php";
?>
</html>
