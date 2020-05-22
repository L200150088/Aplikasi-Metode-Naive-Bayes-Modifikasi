<div class="content">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title">Dataset Klasifikasi Coba</h5>
            <div class="heading-elements">
                <ul class="fa fa-desktop fa-3x">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 

            <form action="<?php echo $action; ?>" method="post">
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
                                  
                                  <option value="jan"> jan</option>
                                  <option value="feb"> feb</option>
                                  <option value="mar"> mar</option>
                                  <option value="apr"> apr</option>
                                  <option value="may"> may</option>
                                  <option value="jun"> jun</option>
                                  <option value="jul"> jul</option>
                                  <option value="aug"> aug</option>
                                  <option value="sep"> sep</option>
                                  <option value="oct"> oct</option>
                                  <option value="nov"> nov</option>
                                  <option value="dec"> dec</option>
                                  
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

             
               
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <br><br>
                <center>
                    <button type="submit" class="btn btn-sm btn-primary"><?php echo $button ?></button> 
                </center> 
               
            </form>
        
        </div>
    </div>
</div>