
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/demo/assets/css/dashstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    

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
 
  <!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form id="editForm" method="POST" action="<?php echo base_url('dash/update');?> ">
      <input type="hidden" id="update_id" name="update_id"  >
        <div class="form-group">
        <label>Task Name:</label>
        <input type="text" id="task_name" name="task_name"  >
        </div><br>
        <div class="form-group">
        <label>AssignedBy:</label>
        <input type="email" id="assign" name="assign"  >
        </div><br>
        <div class="form-group">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date"  >
        </div><br>
        <div class="form-group">
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date"  >
        </div><br>
        <div class="form-group">
        <label for="status">Status:</label>
        <select id="status" name="status"  >
          <option value="Pending">Pending</option>
          <option value="In-process">In-process</option>
          <option value="Completed">Completed</option>
        </select>
        </div><br>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit"  name="edit" value="update" class="btn btn-primary">update</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
     
  
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
        $(document).ready(function() {
            // Triggered when edit button is clicked
            $('.edit-btn').click(function() {
                // Fetch data attributes from the clicked button
                var id = $(this).data('id');
                var taskname = $(this).data('taskname');
                var assignby = $(this).data('assignby');
                var startdate = $(this).data('startdate');
                var enddate = $(this).data('enddate');
                var status = $(this).data('status');

                // Set values to modal form fields
                $('#update_id').val(id);
                $('#task_name').val(taskname);
                $('#assign').val(assignby);
                $('#start_date').val(startdate);
                $('#end_date').val(enddate);
                $('#status').val(status);

                // Show the edit modal
                $('#editModal').modal('show');
            });

            $('#editModal').on('hidden.bs.modal', function () {
        $('.modal-backdrop').remove();
      });
      
        });
    </script>


</body>
</html>



     
      
