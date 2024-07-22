
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/demo/assets/css/dashstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>Dashboard</title>
</head>
<body>

  <div class="container">
    <div class="row" >
      <div class="col-md-12 mt-4" >
        <div class="card" >
          <div class="card-header" >
            <h5>
              Todo List!
              <a href="#" class="btn btn-primary" style="float: right" data-toggle="modal" data-target="#exampleModal">Add Task</a>
            </h5>
          </div>
          <div class="card-body" >
          <table class="table table-bordered" >
      <thead>
      <tr>
       <th>ID</th>
          <th>Tasks</th>
          <th>Start-Date</th>
          <th>End-Date</th>
          <th>Status</th>
          <th>Actions</th>
          
      </tr>
      </thead>
        <tbody>
          <?php foreach($tasks_data as $task): ?>
            <tr>
              <td><?php echo $task->sequential;?></td>
              <td><?php echo $task->tname;?></td>
              <td><?php echo $task->startD;?></td>
              <td><?php echo $task->endD;?></td>
              <td><?php echo $task->Status;?></td>
              <td>
                <a href="<?php echo base_url();?>dash/edit/<?php echo $task->id; ?>" class="btn btn-success"  >Edit</a>
                <a href="<?php echo base_url();?>dash/delete/<?php echo $task->id;?>" class="btn btn-danger" >Delete</a>
              </td>

            </tr>

            <?php endforeach; ?>
        </tbody>
      </table>

          </div>

        </div>

      </div>

    </div>
    </div>
   
  
   
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="<?php echo base_url('dash/addtasks')?>">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <label>Task Name:</label>
      <input type="text" id="task_name" name="task_name" >
      </div><br>
      <div class="form-group">
      <label for="start_date">Start Date:</label>
      <input type="date" id="start_date" name="start_date">
      </div><br>
      <div class="form-group">
      <label for="end_date">End Date:</label>
      <input type="date" id="end_date" name="end_date">
      </div><br>
      <div class="form-group">
      <label for="status">Status:</label>
      <select id="status" name="status">
        <option value="Pending">Pending</option>
        <option value="In-process">In-process</option>
        <option value="Completed">Completed</option>
      </select>
      </div><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="insert" value="AddTask" class="btn btn-info">
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