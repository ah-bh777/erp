<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Stepper Progress Bar</title>
<style>
  /* Styles for the progress bar */
  .progress-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 60%;
    margin: 50px auto;
  }
  .step {
    border: 2px solid #007bff; /* Blue border for steps */
    border-radius: 20px;
    background-color: transparent;
    padding: 10px 20px;
    font-size: 16px;
    color: #007bff;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  .step.completed {
    background-color: #007bff; /* Blue color for completed steps */
    color: #fff;
  }
  .line {
    flex: 1;
    height: 3px;
    background-color: #ccc;
    margin: 0 10px;
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  .line.active {
    background-color: #007bff; /* Blue color for active progress */
    opacity: 1;
  }
  .step:last-child.completed {
    border-color: #007bff; /* Green border for last completed step */
  }
  .btn-container {
    margin-top: 20px;
    text-align: center;
  }
  .btn {
    padding: 10px 20px;
    border: 2px solid #007bff;
    border-radius: 20px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  .btn:hover {
    background-color: #0056b3; /* Darker blue on hover */
  }
</style>
</head>
<body>
<div class="progress-bar" id="progressBar">
  <button class="step" onclick="onClickStep(1)" disabled>select articles</button>
  <div class="line"></div>
  <button class="step" onclick="onClickStep(2)" disabled>Confirm article</button>
  <div class="line"></div>
  <button class="step" onclick="onClickStep(3)" disabled>make a report</button>
</div>
<div class="btn-container">
  <button class="btn" id="prevBtn" onclick="prevStep()">Previous</button>
  <button class="btn" id="nextBtn" onclick="nextStep()">Next</button>
</div>

<script>
  let currentStep = 1;
  const steps = document.querySelectorAll('.step');
  const lines = document.querySelectorAll('.line');

  function updateProgressBar() {
    steps.forEach((step, index) => {
      if (index < currentStep - 1) {
        step.classList.add('completed');
        step.disabled = false; // Enable completed steps
      } else {
        step.classList.remove('completed');
        if (index !== currentStep - 1) {
          step.disabled = true; // Disable steps that are not reached
        }
      }
    });

    lines.forEach((line, index) => {
      if (index < currentStep - 1) {
        line.classList.add('active');
      } else {
        line.classList.remove('active');
      }
    });

    // Check if the last step is reached
    if (currentStep === steps.length + 1) {
      steps[currentStep - 2].classList.add('completed');
      alert("Congratulations! You have completed all steps.");
    }
  }

  function nextStep() {
    if (currentStep < steps.length + 1) {
      currentStep++;
      updateProgressBar();
    }
  }

  function prevStep() {
    if (currentStep > 1) {
      currentStep--;
      updateProgressBar();
    }
  }

  function onClickStep(step) {
    if (steps[step - 1].classList.contains('completed')) {
      switch (step) {
        case 1:
          alert("Action for 'select articles' button.");
          break;
        case 2:
          alert("Action for 'Confirm article' button.");
          break;
        case 3:
          alert("Action for 'make a report' button.");
          break;
        default:
          break;
      }
    }
  }

  // Initialize progress bar
  updateProgressBar();
</script>
</body>
</html>
