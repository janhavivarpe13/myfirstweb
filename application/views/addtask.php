<?php
	include('templates/header.php');
	include('templates/sidebar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Task</title>
<style>
*{
    font-family: sans-serif;
    box-sizing: border-box;
}
body{
    
    justify-content: center;
    align-items: center;
    height: 100vh;
    
    
}
.container{
    position: absolute;
    top: 50%;
    left: 45%;
    transform: translate(-50%, -50%);
    padding: 28px;
    margin: 0 28px;
    border-radius: 10px;
    overflow:hidden;
    background: rgb(0,0,0,0.2);
    box-shadow: 0 15px 20px rgba(0,0,0,0.6);
}
.content{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 20px 0;
}
.input-box{
   
    flex-wrap: wrap;
    width: 50%;
    padding-bottom: 15px;
}

.input-box input{
    height: 40px;
    width: 50%;
    padding: 0 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
}
.input-box input:is(:focus,:valid){
    box-shadow: 0 3px 6px rgba(0,0,0,0.2);
}
	</style>
</head>
<body>
	<div class="container">
	<?php echo form_open('dash/addtask'); ?>
	<div class="content">
		<div class="input-box">
		<label>Task Name:</label>
		<input type="text" id="task_name" name="task_name" >
		</div>
		<div class="input-box">
		<label for="start_date">Start Date:</label>
		<input type="date" id="start_date" name="start_date">
		</div>
		<div class="input-box">
		<label for="end_date">End Date:</label>
		<input type="date" id="end_date" name="end_date">
		</div>
		<div class="input-box">
		<label for="status">Status:</label>
		<select id="status" name="status">
			<option value="pending">Pending</option>
			<option value="in_progress">In Progress</option>
			<option value="completed">Completed</option>
		</select>
		</div>
	</div>

	<input type="submit" value="Add Task">
	<?php echo form_close(); ?>

	</div>
    
</body>
</html>
<?php 
include('templates/footer.php');
?>