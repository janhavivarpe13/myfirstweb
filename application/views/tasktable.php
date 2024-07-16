<h1>Todo Lists!</h1>

            <table border="1px" cellpedding="2px" cellspacing="2px">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tasks</th>
                    <th>Start-Date</th>
                    <th>End-Date</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($tasks as $Task): ?>
                    <tr>
                      <td><?php echo $Task->id;?></td>
                      <td><?php echo $Task->tname;?></td>
                      <td><?php echo $Task->startD;?></td>
                      <td><?php echo $Task->endD;?></td>
                      <td><?php echo $Task->Status;?></td>
                      <td><a href="<?php echo base_url('dash/edit/'.$Task->id); ?>" class="edit-link" >Edit</a></td>
                      <td><a href="<?php echo base_url('dash/delete/'.$Task->id); ?>" class="delete-link" >Delete</a></td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
            </table>
          