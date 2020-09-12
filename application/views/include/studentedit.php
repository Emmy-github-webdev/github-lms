<H2>Edit Student</h2>
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
            <form action="<?php echo base_url(); ?>StudentController/updateStudent" method="post">
             <input type="hidden" name="sid" value="<?php echo $stuById->sid; ?>">
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" name="name" value="<?php echo $stuById->name; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>College</label>
                    <select name="college" class="college">
                    
                      <option value="">Select College </option>
                      <?php 
                        foreach ($colldata as $cdata){
                            if ($stuById->college == $cdata->colid) { ?> 
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
                      foreach ($deptdata as $ddata){
                          if ($stuById->dep == $ddata->depid) { ?> 
                           <option value="<?php echo $ddata->depid; ?>" selected="selected"><?php echo $ddata->depname; ?></option>
                          <?php } ?>
                    <option value="<?php echo $ddata->depid; ?>"><?php echo $ddata->depname; ?></option>

                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                    <label>Roll No.</label>
                    <input type="text" name="roll" value="<?php echo $stuById->roll; ?>" class="form-control span12">
                </div>
				<div class="form-group">
                    <label>Reg. No.</label>
                    <input type="text" name="reg" value="<?php echo $stuById->reg; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Session</label>
                    <input type="text" name="session" value="<?php echo $stuById->session; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" value="<?php echo $stuById->phone; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>level</label>
                    <input type="text" name="level" value="<?php echo $stuById->level; ?>" class="form-control span12">
                </div>
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Update"> 
                </div>
                   
            </form>
        </div>		