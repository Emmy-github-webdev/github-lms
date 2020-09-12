<h2>Add Book</h2>
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
            <form action="<?php echo base_url (); ?>BookController/addBookForm" method="post">
                <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" name="bookname" class="form-control span12">
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
                    <select name="dep" class="dep">
                    
                      <option value="">Select Department</option>
                      <?php 
                        foreach ($depdata as $ddata){
                      ?>
                      <option value="<?php echo $ddata->depid; ?>"><?php echo $ddata->depname; ?></option>

                      <?php } ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <select name="author" class="dep">
                    
                    <option value="">Select Author</option>
                    <?php 
                      foreach ($autdata as $adata){
                    ?>
                    <option value="<?php echo $adata->autid; ?>"><?php echo $adata->autname; ?></option>

                    <?php } ?>
                  </select>
                </div>
				<div class="form-group">
                    <label>Total Book</label>
                    <input type="text" name="totalbook" class="form-control span12">
                </div>
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Submit"> 
                </div>
                   
            </form>
        </div>		