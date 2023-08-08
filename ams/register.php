<?php
  function drop_course(){include("connection.php"); // Using database connection file here
    $records = mysqli_query($conn, "SELECT * From course where delete_stats=0");  // Use select query here

    while($data = mysqli_fetch_array($records))
    {
        echo "<option value='". $data['cid'] ."'>" .$data['course'] ."</option>";  // displaying data in option menu
    }
    mysqli_close($conn);  // close connection
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta>
    <title>User_Register</title>
    <link rel="icon" type="image/png" href="Assist/img/AMS.png"/>
    <link rel="stylesheet" href="Assist/css/register.css">
  </head>
  <body>
    <h1 class="h_option">Choose form type</h1>
    <div id="prag2">
      <label class="container">Teacher
        <input type="radio" name="alt_btn" value="" onclick="changeme('1');" required>
        <span class="checkmark"></span>
      </label>

      <label class="container">Student
          <input type="radio" name="alt_btn" value="" onclick="changeme('2');" id="_radio">
          <span class="checkmark"></span>
        </label>
      </div>
    <div id="prag1" ></div>
  </body>

  <script type="text/javascript">
    function changeme(a) {
    if (a == 1) {
      document.getElementById('prag1').innerHTML = `
    <div id="teacher_form">
    <caption>Teacher registration form</caption>
    <form action="reg_teacher.php" method="post">
      <input type="text" name="First_Name" placeholder="Enter first name" required>
      <input type="text" name="Last_Name" placeholder="Enter last name" required>
      <input type="text" name="user_name" placeholder="@user" required>
      <input type="text" name="contact_number" placeholder="Enter contact number" maxlength="10" pattern="[1-9]{1}[0-9]{9}" title="Please enter exactly 10 digits" required>
      <input type="email" name="email" placeholder="Your email" required>
      <input type="password" name="password" placeholder="Enter Password" required>
      <input type="password" name="confirm_password" placeholder="Conform Password" required>
      <input type="submit"name="regd_btn" class="btn" value="Register">
    </form>
    </div>
    `;
    } else {
      document.getElementById('prag1').innerHTML = `
    <div id="student_form">
    <caption>Student registration form</caption>
    <form class="" action="reg_student.php" method="post">
      <input type="text" name="First_Name" placeholder="Enter first name" required>
      <input type="text" name="Last_Name" placeholder="Enter last name" required>
      <input type="text" name="year" class="batch" placeholder="Input Batch" maxlength="4" pattern="[2]{1}[0]{1}[0-9]{2}" title="Please enter valid Year" required>

      <select name="course" required>
        <option value="" disabled selected>Course</option>
        <?php
        drop_course();
        ?>
      </select>

      <input type="text" name="roll_no" placeholder="Roll no." required>

      <select name="sem" required>
        <option value="" disabled selected>Semester</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
      </select>

      <input type="text" name="contact_number" placeholder="Enter contact number" maxlength="10" pattern="[1-9]{1}[0-9]{9}" title="Please enter exactly 10 digits" required>
      <input type="email" name="email" placeholder="Your email" required>
      <input type="text" name="user_name" placeholder="@user name" required>
      <input type="password" name="password" placeholder="Enter Password" required>
      <input type="password" name="confirm_password" placeholder="Conform Password" required>
      <input type="submit"name="regd_btn" class="btn" value="Register">
    </form>
    </div>
    `;
    }
    }
  </script>
</html>
