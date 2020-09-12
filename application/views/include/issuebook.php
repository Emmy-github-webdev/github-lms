<script>
$(document).ready(function(){
    $("#dept").change(function(){
        var dep = $("#dept").val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url (); ?>ManagerBookController/getBookByIdDept/"+dep,
            success:function(data){
                $("#book").html(data);
            }
        });
    });

});

</script>



<h2>Issue Book</h2>
            <hr/>
          <?php
             $msg = $this->session->flashdata('msg');
             if (isset($msg)){
                 echo $msg;
             }
            ?>

            <style>
            .college{
                border: 1px solid #ddd;
                padding: 5px;
                width: 570px;
            }
            .dep{
                border: 1px solid #ddd;
                padding: 5px;
                width: 570px;
            }
            </style>
			
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url (); ?>ManagerBookController/manageBookForm" method="post">
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" name="studname" class="form-control span12">
                </div>

                <div class="form-group">
                    <label>Reg No</label>
                    <input type="text" name="reg" class="form-control span12">
                </div>

                <div class="form-group">
                    <label>College</label>
                    <select name="college" class="college">
                    
                      <option value="">Select College </option>
                      <?php 
                        foreach ($coldata as $cdata){
                      ?>
                      <option value="<?php echo $cdata->colid; ?>"><?php echo $cdata->colname; ?></option>

                      <?php } ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <select name="dep" id="dept" class="dep">
                    
                      <option value="">Select Department</option>
                      <?php 
                        foreach ($depdata as $ddata){
                      ?>
                      <option value="<?php echo $ddata->depid; ?>"><?php echo $ddata->depname; ?></option>

                      <?php } ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label>Book Name</label>
                    <select name="book" id="book" class="dep"></select>
                </div>

				<div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control span12">
                </div>

                <div class="form-group">
                    <label>Returned?</label>
                    <select name="Returned" class="dep">
                      <option value="">Book Returned?</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                    
                </div>

                <div class="form-group">
                    <label>Issue Date</label>
                    <input type="date" name="date" class="form-control span12">
                </div>

                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Submit"> 
                </div>
                   
            </form>
        </div>		