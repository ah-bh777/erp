<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Progress Bar</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
  #container {
    max-width: 90%;  
  }

  .step-container {
    position: relative;
    text-align: center;
    transform: translateY(-43%);
  }

  .step-button {
    width: auto; /* Adjusted width to fit the text */
    height: auto; /* Adjusted height to fit the text */
    padding: 10px 20px; /* Added padding for better appearance */
    border-radius: 25px; /* Adjusted border radius for button shape */
    background-color: #fff;
    border: 2px solid #007bff;
    font-weight: bold;
    font-size: 14px; /* Reduced font size */
    margin-bottom: 10px;
    cursor: pointer; /* Added cursor pointer */
  }

  .step-line {
    position: absolute;
    top: 26px;
    left: 25px;
    width: calc(100% - 50px);
    height: 2px;
    background-color: #007bff;
    z-index: -1;
  }

  #multi-step-form {
    overflow-x: hidden;
  }

  .reached {
    background-color: #007bff; /* Blue color */
    color: #fff; /* White text color */
  }
  
</style>
</head>
<body>

<div id="container" class="container mt-5">
  <div class="progress px-1" style="height: 3px;">
    <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
  <div class="step-container d-flex justify-content-between">
    <button class="btn btn-outline-primary step-button active" onclick="displayStep(1)">select articles</button>
    <button class="btn btn-outline-primary step-button" onclick="if($(this).hasClass('reached')){ window.location.href = 'client_request.php?user=user1' } else { displayStep(2); }">confirm articles</button>
   <button class="btn btn-outline-primary step-button" onclick="displayStep(3)">make a report</button>
  </div>
  <div class="btn-container">
    <button class="btn btn-primary" onclick="nextStep()">Next Step</button>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
var currentStep = 1;
var totalSteps = 3;

function updateProgressBar() {
  var progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100; // Adjusted calculation
  $(".progress-bar").css("width", progressPercentage + "%");

  // Check if the progress has reached the third button
  if (currentStep === totalSteps) {
    $(".step-button").addClass("reached");
  } else {
    $(".step-button").removeClass("reached");
    for (var i = 1; i <= currentStep; i++) {
      $(".step-button:nth-child(" + i + ")").addClass("reached");
    }
  }
}

function displayStep(stepNumber) {
  if (stepNumber >= 1 && stepNumber <= totalSteps && stepNumber <= currentStep) {
    if (stepNumber > 1 && !$(".step-button").hasClass("reached")) {
      currentStep = stepNumber;
      updateProgressBar();
    }
    alert("Step " + stepNumber);
  }
}

function nextStep() {
  if (currentStep < totalSteps) {
    currentStep++;
    updateProgressBar();
  }
}
</script>

</body>
</html>
