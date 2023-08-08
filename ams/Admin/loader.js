// load for Homepage

$(document).ready(function(){
    $(".Home").click(function(){
        $("#main");
    });
});


// External load for Attendance

$(document).ready(function(){
    $(".view_attendance").click(function(){
        $("#main").load("attendance.php");
    });
});


//External load for teacher

$(document).ready(function(){
    $(".teacher").click(function(){
        $("#main").load("teacher.php");
    });
});


// External load for student 

$(document).ready(function(){
    $(".student").click(function(){
        $("#main").load("student.php");
    });
});


//  External load for course 

$(document).ready(function(){
    $(".course").click(function(){
        $("#main").load("course.php");
    });
});


// External load for subject 

$(document).ready(function(){
    $(".subject").click(function(){
        $("#main").load("subject.php");
    });
});


// External load for Subject_teacher

$(document).ready(function(){
    $(".teacher_subject").click(function(){
        $("#main").load("teacher_subject.php");
    });
});