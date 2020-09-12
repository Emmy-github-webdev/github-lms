<script>
    $(document).ready( function () {
        $("#table_id").DataTable();
        
    } );

</script>


<h2>Author List</h2>
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
      <th>Author Name</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $i = 0;
      foreach ($autdata as $adata) {
          $i++;
      ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $adata->autname; ?></td>
      <td>
          <a href="<?php echo base_url(); ?>AuthorController/editauthor/<?php echo $adata->autid; ?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you sure to delete Author?')"; href="<?php echo base_url(); ?>AuthorController/deleteauthor/<?php echo $adata->autid; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

