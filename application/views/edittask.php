
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/demo/assets/css/dashstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title></title>
	<style>
        .centered-form {
            width: 500px; 
            margin: auto; 
            padding: 20px; 
            border: 1px solid #ccc; 
        }
    </style>
</head>
<body>
 
  <div class="container">
    <div class="clear-fix">
   <h3 align="center">Edit Task</h3>
   <div class="centered-form">
   <form method="POST" action="<?php echo base_url();?>dash/update/<?php echo $singlet->id;?>" >
      <div class="form-group">
      <label>Task Name:</label>
      <input type="text" id="task_name" name="task_name" value="<?php echo $singlet->tname; ?>"  >
      </div><br>
      <div class="form-group">
      <label for="start_date">Start Date:</label>
      <input type="date" id="start_date" name="start_date" value="<?php echo $singlet->startD; ?>" >
      </div><br>
      <div class="form-group">
      <label for="end_date">End Date:</label>
      <input type="date" id="end_date" name="end_date" value="<?php echo $singlet->endD; ?>" >
      </div><br>
      <div class="form-group">
      <label for="status">Status:</label>
      <select id="status" name="status">
        <option value="Pending">Pending</option>
        <option value="In-process">In-process</option>
        <option value="Completed">Completed</option>
      </select>
      </div><br>
	  <input type="submit" name="edit" value="update" class="btn btn-info">
      </div>
      </div>
      </form>

	  </div>
    </div>
</div>

<?php if($this->session->flashdata("status")): ?>
  <div align="center" style="color: #FFF" class="bg-success" >
    <?= $this->session->flashdata("status"); ?>
  </div>
<?php endif; ?>
</body>
</html>