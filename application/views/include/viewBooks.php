<H2>View Book Details</h2>
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
                    <label>Book Name</label>
                    <input type="text" readonly="" value="<?php echo $bookById->bookname; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>College</label>
                                    <?php
                    $scolid = $bookById->college; 
                    $getcol = $this->CollegeModel->getAllCollege($scolid);
                    if (isset($getcol)) { ?>
                         <input type="text" readonly="" value="<?php echo $getcol->college; ?>" class="form-control span12">
                        
                    <?php } ?>
                   
                </div>
                <div class="form-group">
                    <label>Department</label>

                    <?php
                    $sdepid = $bookById->dep; 
                    $getdep = $this->DepartmentModel->getAllDepartment($sdepid);
                    if (isset($getdep)) {  ?>

                     <input type="text" readonly="" value="<?php echo $getdep->dep; ?>" class="form-control span12">  
  
                    <?php  } ?>

                    
                </div>
                <div class="form-group">
                    <label>Author Name</label>
                    <?php
                    $sautid = $sdata->author; 
                    $getaut = $this->AuthorModel->getAllAuthor($sautid);
                    if (isset($getaut)) { ?>
                        <input type="text" readonly="" value="<?php echo $getaut->autname; ?>" class="form-control span12">
                        
                    <?php } ?>

                </div>


                <div class="form-group">
                    <label>Total Book</label>
                    <input type="text" readonly="" value="<?php echo $bookById->totalbook; ?>" class="form-control span12">
                </div>             
            
        </div>      

