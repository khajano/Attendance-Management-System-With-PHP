<?php
require_once("../ses_check.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin_Teacher</title>
  <link rel="stylesheet" href="css/teacher-student.css">
  <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
  <script src="JQuery_File.js"></script>

		<style>
			.S-Table{
				font-family: monospace;
   	color:rgb(0, 152, 253);
			}
		</style>

</head>

<body>
 
  <div>
    <h1 class="S-Table">Teacher Table</h1>
    <input type="text" id="search" placeholder="Search Teacher" name="search">
  </div>
  <div id="result"></div>

	<script>
	$(document).ready(
	function(){
		$("#search").keyup(function(){
			var value = $(this).val();
			$.ajax({
				url:"fetch_teacher.php",
				method:"POST",
				data:{search:value},
				dataType:"TEXT",
				success:function(response){
					$("#result").html(response);
				} 
			}) 
		}); 
	}); 
	</script>
</body>
</html>
