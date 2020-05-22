<?php 
    $ci =& get_instance();;
?>

<div class="content">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h5 class="panel-title">Form <?php echo $button ?> Coba_Dataset</h5>
            <div class="heading-elements">
                <ul class="fa fa-desktop fa-3x">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 

            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="varchar">job <?php echo form_error('job') ?></label>
                     <div class="col-sm-20">
                                  <select class="form-control" name="job" id="job">
                                  
                                  <option value="Unemployed"> Unemployed</option>
                                  <option value="Services"> Services</option>
                                  <option value="Management"> Management</option>
                                  <option value="Blue-collar"> Blue-collar</option>
                                  <option value="Self-employed"> Self-employed</option>
                                  <option value="Technician"> Technician</option>
                                  <option value="entrepreneur"> entrepreneur</option>
                                  <option value="admin."> admin.</option>
                                  <option value="Student"> Student</option>
                                  <option value="Retired"> Retired</option>
                                  
                                  </select>
                              </div>
                </div>
			
				<div class="form-group">
                    <label for="varchar">education <?php echo form_error('education') ?></label>
                    <div class="col-sm-20">
                                  <select class="form-control" name="education" id="education">
                                  
                                  <option value="Primary"> Primary</option>
                                  <option value="Uknmown"> Uknmown</option>
                                  <option value="Secondary"> Secondary</option>
                                  <option value="Tertiary"> Tertiary</option>
                                  
                                  </select>
                              </div>
                </div>
			
				<div class="form-group">
                    <label for="varchar">balance <?php echo form_error('balance') ?></label>
                    <input type="text" class="form-control" name="balance" id="balance" placeholder="balance" value="<?php echo $balance; ?>" />
                </div>
			
				<div class="form-group">
                    <label for="varchar">loan <?php echo form_error('loan') ?></label>
                     <div class="col-sm-20">
                                  <select class="form-control" name="loan" id="loan">
                                  
                                  <option value="no"> no</option>
                                  <option value="yes"> yes</option>
                                  </select>
                              </div>
                </div>
			
				<div class="form-group">
                    <label for="varchar">month <?php echo form_error('month') ?></label>
                    <div class="col-sm-20">
                                  <select class="form-control" name="month" id="month">
                                  
                                  <option value="Jan"> Jan</option>
                                  <option value="Feb"> Feb</option>
                                  <option value="Mar"> Mar</option>
                                  <option value="Apr"> Apr</option>
                                  <option value="Mei"> May</option>
                                  <option value="Jun"> Jun</option>
                                  <option value="Jul"> Jul</option>
                                  <option value="Ags"> Ags</option>
                                  <option value="Sept"> Sept</option>
                                  <option value="Oct"> Oct</option>
                                  <option value="Nov"> Nov</option>
                                  <option value="Dec"> Dec</option>
                                  
                                  </select>
                              </div>

                    </div>
			
				<div class="form-group">
                    <label for="varchar">campaign <?php echo form_error('campaign') ?></label>
                    <input type="text" class="form-control" name="campaign" id="campaign" placeholder="campaign" value="<?php echo $campaign; ?>" />
                </div>
			
				<div class="form-group">
                    <label for="varchar">previous <?php echo form_error('previous') ?></label>
                    <input type="text" class="form-control" name="previous" id="previous" placeholder="previous" value="<?php echo $previous; ?>" />
                </div>

      
				<div class="form-group">
                    <label for="varchar">y <?php echo form_error('y') ?></label>
                     <div class="col-sm-20">
                                  <select class="form-control" name="y" id="y">
                                  
                                  <option value="no"> no</option>
                                  <option value="yes"> yes</option>
                                  </select>
                              </div>
                </div>

			<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
				<button type="submit" class="btn btn-success"><?php echo $button ?></button> 
				<a href="<?php echo site_url('data_set') ?>" class="btn btn-default">Cancel</a>
			</form>
        
        </div>
    </div>
</div>