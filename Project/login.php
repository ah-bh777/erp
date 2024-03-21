<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f5f5f5;
    }
    .login-container {
      max-width: 400px;
      margin: 100px auto;
      padding: 40px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .login-form {
      margin-bottom: 20px;
    }
    .login-form input[type="text"],
    .login-form input[type="password"] {
      border-radius: 0;
    }
    .login-form input[type="submit"] {
      border-radius: 0;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="login-container">
    <h2 class="text-center">Login</h2>
    <div class="login-form">
      <div class="form-group">
        <input type="text" id="email" class="form-control" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="password" id="password" class="form-control" placeholder="Password" required>
      </div>
      <button type="button" id="loginBtn" class="btn btn-primary btn-block">Login</button>
    </div>
    <p class="text-center">Don't have an account? <a href="#">Sign Up</a></p>
  </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function() {
    $('#loginBtn').click(function() {
      var email = $('#email').val();
      var password = $('#password').val();
      $.ajax({
        url: "login_server.php",
        type: "POST",
        data: {
          email: email,
          password: password
        },
        success: function(data) {
          if (data == "nope") {
            alert("There is no such email or password.");
          } else {
            window.location.href = "theOfficial_ajouter_article.php?user=" + email;
          }
        },
        error: function() {
          alert("An error occurred during the login process.");
        }
      });
    });
  });
</script>


</body>
</html>
