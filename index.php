<!--for lunux run xampp server - sudo /opt/lampp/manager-linux-x64.run-->

<?php
require_once "includes/config_session.inc.php";
require_once "views/login.view.php"; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="public/css/style.css">
  <link rel="stylesheet" type="text/css" href="public/css/header.css">
  <link rel="stylesheet" type="text/css" href="public/css/footer.css">
  <link rel="stylesheet" type="text/css" href="public/css/body.css">
    <style>
      body, p, h1 {
        font-family: Arial;
      }
    </style>
  <title>UniOps</title>
</head>
<body>
  <header>
    <img class="header_img" src="public/images/UniOps.png" alt="UniOps">
  </header>

  <section class="index_login">
    <div class="login">
      <h3 class="index_login_title">LOGIN</h3>
      <form action="includes/login.inc.php" method="post">
        <p class="index_login_text">Username:</p>
        <input class="index_input" type="text" name="username" placeholder="Username">
        <br>
        <p class="index_login_text">Password:</p>
        <input class="index_input" type="password" name="password" placeholder="Password">
        <br>
        <label>
          <!--TEh ccheck boxes-->
        <input class="mutually-exclusive" type="checkbox" name="CB_administrator" value="true"> Administrator
        </label>
        <br>
        <label>
        <input class="mutually-exclusive" type="checkbox" name="CB_lecturer" value="true"> Lecturer
        </label>
        <br>
        <label>
        <input class="mutually-exclusive" type="checkbox" name="CB_instructor" value="true"> Instructor
        </label>
        <br>
        <label>
        <input class="mutually-exclusive" type="checkbox" name="CB_student" value="true"> Student
        </label>

        <br><br>
        <button class="index_login_button" type="submit"name="submit">LOGIN</button>
      </form>

      <script src="./index.js"></script>

      <?php
      check_login_errors();
      ?>
    </div>
  </section>

  <footer>
    <p>Uniops</p>
  </footer>
</body>
</html>
