<H2>Student Details</h2>
            <hr/>

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
           
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" readonly="" value="<?php echo $stuByreg->name; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>College</label>
                                    <?php
                    $scolid = $stuByreg->college; 
                    $getcol = $this->CollegeModel->getAllCollege($scolid);
                    if (isset($getcol)) { ?>
                         <input type="text" readonly="" value="<?php echo $getcol->colname; ?>" class="form-control span12">
                        
                    <?php } ?>
                   
                </div>
                <div class="form-group">
                    <label>Department</label>

                    <?php
                    $sdepid = $stuByreg->dep; 
                    $getdep = $this->DepartmentModel->getAllDepartment($sdepid);
                    if (isset($getdep)) {  ?>

                     <input type="text" readonly="" value="<?php echo $getdep->depname; ?>" class="form-control span12">  
  
                    <?php  } ?>

                    
                </div>
                <div class="form-group">
                    <label>Roll No.</label>
                    <input type="text" readonly="" value="<?php echo $stuByreg->roll; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Reg. No.</label>
                    <input type="text" readonly="" value="<?php echo $stuByreg->reg; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Session</label>
                    <input type="text" readonly="" value="<?php echo $stuByreg->session; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" readonly="" value="<?php echo $stuByreg->phone; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>level</label>
                    <input type="text" readonly="" value="<?php echo $stuByreg->level; ?>" class="form-control span12">
                </div>                  
            
        </div>      

