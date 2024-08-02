
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/demo/assets/css/dashstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh/joPqPi4lstA6ZIQpPt6wuOM0NoP0OkeagY" crossorigin="anonymous"></script>
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
          <th>Assigned-By</th>
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
              <td><?php echo $task->Assignby; ?></td>
              <td><?php echo $task->startD;?></td>
              <td><?php echo $task->endD;?></td>
              <td><?php echo $task->Status;?></td>
              <td>

              <button type="button" class="edit-btn btn btn-success" 
                  data-toggle="modal" data-target="#editModal"
                  data-id="<?php echo $task->id; ?>"
                  data-taskname="<?php echo $task->tname; ?>"
                  data-assignby="<?php echo $task->Assignby; ?>"
                  data-startdate="<?php echo $task->startD; ?>"
                  data-enddate="<?php echo $task->endD; ?>"
                  data-status="<?php echo $task->Status; ?>">
            Edit
          </button>
                <a href="<?php echo base_url();?>dash/delete/<?php echo $task->id;?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?')" >Delete</a>
              </td>

            </tr>

            <?php endforeach; ?>
        </tbody>
      </table>
      
      <?php if (!empty($links) && $total_tasks > $config['per_page']):?>
        <?php echo $links; ?>
      <?php endif; ?>
</div>
</div>
</div>
</div>
</div>
    <?php
// Include edit.php to bring in the modal form
include 'edittask.php';
?>
  
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="addTaskForm"  method="POST" action="<?php echo base_url('dash/addtasks')?>">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Tasks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <label>Task Name:</label>
      <input type="text" id="task_name" name="task_name"   >
      <small id="task_name_error" class="text-danger"></small>
      </div><br>
      <div class="form-group">
        <label>Assigned-By</label>
        <input type="email" id="assign" name="assign">
        <small id="assign_error" class="text-danger"></small>
      </div>
      <div class="form-group">
      <label for="start_date">Start Date:</label>
      <input type="date" id="start_date" name="start_date">
      <small id="start_date_error" class="text-danger"></small>
      </div><br>
      <div class="form-group">
      <label for="end_date">End Date:</label>
      <input type="date" id="end_date" name="end_date">
      <small id="end_date_error" class="text-danger"></small>
      </div><br>
      <div class="form-group">
      <label for="status">Status:</label>
      <select id="status" name="status">
        <option value="Pending">Pending</option>
        <option value="In-process">In-process</option>
        <option value="Completed">Completed</option>
      </select>
      <small id="status_error" class="text-danger"></small>
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


<?php if($this->session->flashdata('error')): ?>
  <div align="center" style="color: #FFF" class="bg-danger">
  <?php echo $this->session->flashdata('error'); ?>
  </div>
<?php endif; ?>





<?php if($this->session->flashdata("status")): ?>
  <div align="center" style="color: #FFF" class="bg-success" >
    <?= $this->session->flashdata("status"); ?>
  </div>
<?php endif; ?> 
</body>
</html>