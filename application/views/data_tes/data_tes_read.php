<?php 
    $ci =& get_instance();
?>

<div class="content">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title">Data Tes Details</h5>
            <div class="heading-elements">
                 <ul class="fa fa-desktop fa-3x">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>
        <div class="panel-body"> 
        
            <table class="table">
            
				<tr>
                    <td>job</td><td><?php echo $job; ?></td>
                </tr>
				
				<tr>
                    <td>education</td><td><?php echo $education; ?></td>
                </tr>
				
				<tr>
                    <td>balance</td><td><?php echo $balance; ?></td>
                </tr>
				<tr>
                    <td>loan</td><td><?php echo $loan; ?></td>
                </tr>
				<tr>
                    <td>month</td><td><?php echo $month; ?></td>
                </tr>
				<tr>
                    <td>campaign</td><td><?php echo $campaign; ?></td>
                </tr>
				<tr>
                    <td>previous</td><td><?php echo $previous; ?></td>
                </tr>
                <tr>
                    <td>y</td><td><?php echo $y; ?></td>
                </tr>
				<tr>
                    <td><a href="<?php echo site_url('data_tes') ?>" class="btn btn-primary">Kembali</a></td><td></td>
                </tr>
			</table>
       
       </div>

    </div>
</div>