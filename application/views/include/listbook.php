<script>
    $(document).ready( function () {
        $("#table_id").DataTable();
        
    } );

</script>


<h2>Book List</h2>
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
      <th>Book Name</th>
      <th>College</th>
      <th>Department</th>
      <th>Author</th>
      <th>Total Book</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $i = 0;
      foreach ($bookdata as $sdata) {
          $i++;
      ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $sdata->bookname; ?></td>

      <td><?php
       $scolid = $sdata->college; 
       $getcol = $this->CollegeModel->getAllCollege($scolid);
       if (isset($getcol)) {
         echo $getcol->colname;
       }
       ?></td>

      <td><?php
       $sdepid = $sdata->dep; 
       $getdep = $this->DepartmentModel->getAllDepartment($sdepid);
       if (isset($getdep)) {
         echo $getdep->depname;
       }
       ?></td>

       <td><?php
       $sautid = $sdata->author; 
       $getaut = $this->AuthorModel->getAllAuthor($sautid);
       if (isset($getaut)) {
         echo $getaut->autname;
       }
       ?></td>
      <td><?php echo $sdata->totalbook; ?></td>
      <td>
          <a href="<?php echo base_url(); ?>BookController/editbook/<?php echo $sdata->bookid; ?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you sure to delete student?')"; href="<?php echo base_url(); ?>BookController/deletebook/<?php echo $sdata->bookid; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
