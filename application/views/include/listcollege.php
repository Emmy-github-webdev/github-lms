<script>
    $(document).ready( function () {
        $("#table_id").DataTable();
        
    } );

</script>


<h2>College List</h2>
			<hr/>
      <?php
          $msg = $this->session->flashdata('msg');
            if (isset($msg)){
                echo $msg;
          }
      ?>
<table class="display" id="table_id">
  <thead>
    <tr>
      <th>S/N</th>
      <th>College Name</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $i = 0;
      foreach ($coldata as $cdata) {
          $i++;
      ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $cdata->colname; ?></td>
      <td>
          <a href="<?php echo base_url(); ?>CollegeController/editcollege/<?php echo $cdata->colid; ?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you sure to delete the college?')"; href="<?php echo base_url(); ?>CollegeController/deletecollege/<?php echo $cdata->colid; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

