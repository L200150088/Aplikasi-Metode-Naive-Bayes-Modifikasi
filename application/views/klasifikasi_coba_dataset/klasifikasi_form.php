<div class="content">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title">Dataset Klasifikasi Coba</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 

            <form action="<?php echo $action; ?>" method="post">
                 <form action="<?php echo $action; ?>" method="post">
               
                <div class="form-group">
                    <label for="varchar">job <?php echo form_error('job') ?></label>
                    <input type="text" class="form-control" name="job" id="job" placeholder="job" readonly="readonly" value="<?php echo $job; ?>" />
                </div>
              
                <div class="form-group">
                    <label for="varchar">education <?php echo form_error('education') ?></label>
                    <input type="text" class="form-control" name="education" id="education" placeholder="education" readonly="readonly" value="<?php echo $education; ?>" />
                </div>
               
                <div class="form-group">
                    <label for="varchar">balance <?php echo form_error('balance') ?></label>
                    <input type="text" class="form-control" name="balance" id="balance" placeholder="balance" readonly="readonly" value="<?php echo $balance; ?>" />
                </div>
               
                <div class="form-group">
                    <label for="varchar">loan <?php echo form_error('loan') ?></label>
                     <input type="text" class="form-control" name="loan" id="loan" placeholder="loan" readonly="readonly" value="<?php echo $loan; ?>" />
                
                </div>
                
                <div class="form-group">
                    <label for="varchar">month <?php echo form_error('month') ?></label>
                     <input type="text" class="form-control" name="month" id="bmonth" placeholder="month" readonly="readonly" value="<?php echo $month; ?>" />
                
                </div>
               
                <div class="form-group">
                    <label for="varchar">campaign <?php echo form_error('campaign') ?></label>
                    <input type="text" class="form-control" name="campaign" id="campaign" placeholder="campaign" readonly="readonly" value="<?php echo $campaign; ?>" />
                </div>
               
                <div class="form-group">
                    <label for="varchar">previous <?php echo form_error('previous') ?></label>
                      <input type="text" class="form-control" name="previous" id="previous" placeholder="previous" readonly="readonly" value="<?php echo $previous; ?>" />
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