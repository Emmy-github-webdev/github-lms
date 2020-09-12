<script>
    $(document).ready( function () {
        $("#table_id").DataTable();
        
    } );

</script>


<h2>List of Issued Book</h2>
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
      <th>Reg No</th>
      <th>College</th>
      <th>Department</th>
      <th>Book Name</th>
      <th>Phone</th>
      <th>Issue Date</th>
      <th></th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $i = 0;
      foreach ($issuedata as $idata) {
          $i++;
      ?>
     
    <tr>
      
     <td><?php echo $i; ?></td>
     <td><?php echo $idata->studname; ?></td>
     <td><?php echo $idata->reg; ?></td>

     <td><?php
       $scolid = $idata->college; 
       $getcol = $this->CollegeModel->getAllCollege($scolid);
       if (isset($getcol)) {
         echo $getcol->colname;
       }
       ?></td>

<td><?php
       $sdepid = $idata->dep; 
       $getdep = $this->DepartmentModel->getAllDepartment($sdepid);
       if (isset($getdep)) {
         echo $getdep->depname;
       }
       ?></td>

<td><?php
       $bookid = $idata->book; 
       $getbook = $this->BookModel->getAllBook($bookid);
       if (isset($getbook)) { ?>
       <a href="<?php echo base_url(); ?>ManagerBookController/viewBooks/<?php echo $bookid; ?>" target="_blank"><?php echo $getbook->bookname; ?></a>
         
       <?php } ?>
       </td>

     <td><?php echo $idata->phone; ?></td>
    <!--  <td><?php echo $idata->Returned; ?></td> -->
     
     <td><?php echo date("d/m/Y h:ia", strtotime($idata->date)); ?></td>
     <td>
     
     <td>
          <a href="<?php echo base_url(); ?>ManagerBookController/editIssuedBook/<?php echo $idata->mbkid; ?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you sure to delete Issued Record?')"; href="<?php echo base_url(); ?>ManagerBookController/deleteIssuedBook/<?php echo $idata->mbkid; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
          ||<a target="_blank" href="<?php echo base_url(); ?>ManagerBookController/viewstudent/<?php echo $idata->reg;  ?>"><i class="fa fa-eye"></i></a>
      </td>
      <?php } ?>
  </tbody>
</table>



