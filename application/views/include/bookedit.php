<h2>Edit Book</h2>
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
            <form action="<?php echo base_url (); ?>BookController/updateBook" method="post">
            <input type="hidden" name="bookid" value="<?php echo $bookbyid->bookid; ?>" />
                <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" name="bookname" value="<?php echo $bookbyid->bookname; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>College</label>
                    <select name="college" class="college">
                    
                      <option value="">Select College </option>
                      <?php 
                        foreach ($coldata as $cdata){
                            if ($bookbyid->college == $cdata->colid) { ?> 
                                <option value="<?php echo $cdata->colid; ?>" selected="selected"><?php echo $cdata->colname; ?></option>
                               <?php } ?>
            
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
                          if ($bookbyid->dep == $ddata->depid) { ?> 
                           <option value="<?php echo $ddata->depid; ?>" selected="selected"><?php echo $ddata->depname; ?></option>
                          <?php } ?>
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
                          if ($bookbyid->author == $adata->autid) { ?> 
                           <option value="<?php echo $adata->autid; ?>" selected="selected"><?php echo $adata->autname; ?></option>
                          <?php } ?>
                    <option value="<?php echo $adata->autid; ?>"><?php echo $adata->autname; ?></option>

                    <?php } ?>
                  </select>
                </div>

				<div class="form-group">
                    <label>Total Book</label>
                    <input type="text" name="totalbook" value="<?php echo $bookbyid->totalbook; ?>" class="form-control span12">
                </div>
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Update"> 
                </div>
                   
            </form>
        </div>		