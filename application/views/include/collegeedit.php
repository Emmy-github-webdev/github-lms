<h2>Edit College</h2>
            <hr/>
            <?php
             $msg = $this->session->flashdata('msg');
             if (isset($msg)){
                 echo $msg;
             }
            ?>    
			
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url(); ?>CollegeController/updateCollege" method="post">
             <input type="hidden" name="colid" value="<?php echo $colById->colid; ?>">
                <div class="form-group">
                    <label>College Name</label>
                    <input type="text" name="colname" value="<?php echo $colById->colname; ?>" class="form-control span12">
                </div>
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Update"> 
                </div>
                   
            </form>
        </div>		