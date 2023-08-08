<?php
  require_once("../ses_check.php");
?>
<!DOCTYPE html>
<html>

  <head>
    <title>AMS-Admin</title>
    <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
    <link rel="stylesheet" href="css/index.css">
    <script src="JQuery_File.js"></script>
    <script src="loader.js"></script>
  </head>

  <body>

    <div class="header">
      <img src="../Assist/img/AMS.png" class="logo">
      <h1 class="title">
        <span>Attendance Management System</span>
      </h1>
    </div>

    <!-- Navigation Menue -->
    <div class="sidenav">
      <a href="" class="Home">Home</a>
      <a href="#attendance" class="view_attendance">Attendance</a>
      <a href="#teacher" class="teacher">Teacher</a>
      <a href="#student" class="student">Student</a>
      <a href="#course" class="course">Course</a>
      <a href="#subject" class="subject">Subject</a>
      <a href="#teacher_subject" class="teacher_subject">Subject teacher</a>
      <a href="../ses_clear.php" class="logout">Logout</a>
    </div>

    <!-- Section to load Navigation Menu Tabs -->
    <div id="main">

      <div class="information">
        <a href="#student" class="student" id="infoURL"><div class="info-Student"></div><div class="info-div"><h4 class="info-name">Students</h4></div></a>
        <a href="#teacher" class="teacher" id="infoURL"><div class="info-Teacher"></div><div class="info-div"><h4 class="info-name">Teachers</h4></div></a>
        <a href="#course" class="course" id="infoURL"><div class="info-Course"></div><div class="info-div"><h4 class="info-name">Course</h4></div></a>
      </div>

      <div class="information2">
        <a href="#attendance" class="view_attendance" id="infoURL"><div class="info-Attendance"></div><div class="info-div"><h4 class="info-name">Attendance</h4></div></a>
        <a href="#teacher_subject" class="teacher_subject" id="infoURL"><div class="info-SubTeacher"></div><div class="info-div"><h4 class="info-name">Assign</h4></div></a>
        <a href="#subject" class="subject" id="infoURL"><div class="info-Subject-Books"></div><div class="info-div"><h4 class="info-name">Subject</h4></div></a>
      </div>

    </div>
  </body>
</html>