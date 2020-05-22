<?php 
    $ci =& get_instance();;
?>

<div class="content">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h5 class="panel-title">Form <?php echo $button ?> Data_tes</h5>
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
                                  
                                  <option value="unemployed"> unemployed</option>
                                  <option value="services"> services</option>
                                  <option value="management"> management</option>
                                  <option value="blue-collar"> blue-collar</option>
                                  <option value="self-employed"> self-employed</option>
                                  <option value="technician"> technician</option>
                                  <option value="entrepreneur"> entrepreneur</option>
                                  <option value="admin."> admin.</option>
                                  <option value="student"> student</option>
                                  <option value="retired"> retired</option>
                                  
                                  </select>
                              </div>
                </div>
			
				<div class="form-group">
                    <label for="varchar">education <?php echo form_error('education') ?></label>
                    <div class="col-sm-20">
                                  <select class="form-control" name="education" id="education">
                                  
                                  <option value="primary"> primary</option>
                                  <option value="uknmown"> uknmown</option>
                                  <option value="secondary"> secondary</option>
                                  <option value="tertiary"> tertiary</option>
                                  
                                  </select>
                              </div>
                </div>
			
				<div class="form-group">
                    <label for="varchar">balance <?php echo form_error('balance') ?></label>
                    <div class="col-sm-20">
                                  <select class="form-control" name="balance" id="balance">
                                  
                                  <option value="less"> less</option>
                                  <option value="enough"> enough</option>
                                  <option value="middle"> middle</option>
                                  <option value="rich"> rich</option>
                                  
                                  </select>
                              </div>
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
                                  
                                  <option value="jan"> Jan</option>
                                  <option value="feb"> Feb</option>
                                  <option value="mar"> Mar</option>
                                  <option value="apr"> Apr</option>
                                  <option value="may"> May</option>
                                  <option value="jun"> Jun</option>
                                  <option value="jul"> Jul</option>
                                  <option value="ags"> Ags</option>
                                  <option value="sept"> Sept</option>
                                  <option value="oct"> Oct</option>
                                  <option value="nov"> Nov</option>
                                  <option value="dec"> Dec</option>
                                  
                                  </select>
                              </div>

                    </div>
			
				<div class="form-group">
                    <label for="varchar">campaign <?php echo form_error('campaign') ?></label>
                    <div class="col-sm-20">
                                  <select class="form-control" name="campaign" id="campaign">
                                  
                                  <option value="not"> not</option>
                                  <option value="rarely"> rarely</option>
                                  <option value="often"> often</option>
                                  <option value="always"> always</option>
                                  
                                  </select>
                              </div>
                </div>
			
				<div class="form-group">
                    <label for="varchar">previous <?php echo form_error('previous') ?></label>
                    <div class="col-sm-20">
                                  <select class="form-control" name="previous" id="previous">
                                  
                                  <option value="low"> low</option>
                                  <option value="half"> half</option>
                                  <option value="high"> high</option>
                                  
                                  </select>
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