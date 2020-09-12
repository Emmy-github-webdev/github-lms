<script>
    $(document).ready( function () {
        $("#table_id").DataTable();
        
    } );

</script>


<h2>Student List</h2>
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
      <th>Student Name</th>
      <th>College</th>
      <th>Department</th>
      <th>Roll No</th>
      <th>Reg No</th>
      <th>Session</th>
      <th>Phone</th>
      <th>Level</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $i = 0;
      foreach ($studentdata as $sdata) {
          $i++;
      ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $sdata->name; ?></td>

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

      <td><?php echo $sdata->roll; ?></td>
      <td><?php echo $sdata->reg ; ?></td>
      <td><?php echo $sdata->session; ?></td>
      <td><?php echo $sdata->phone; ?></td>
      <td><?php echo $sdata->level; ?></td>
      <td>
          <a href="<?php echo base_url(); ?>StudentController/editstudent/<?php echo $sdata->sid; ?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you sure to delete student?')"; href="<?php echo base_url(); ?>StudentController/deletestudent/<?php echo $sdata->sid; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
          <a href="<?php echo base_url(); ?>StudentController/viewstudent/<?php echo $sdata->reg; ?>"></a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
